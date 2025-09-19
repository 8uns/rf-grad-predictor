import sys
import json
import pandas as pd
import joblib # Untuk memuat model dan encoders
import re # Tambahkan import ini untuk regular expression

# --- KONFIGURASI PATH ---
MODEL_PATH = 'C:/xampp/htdocs/rf.kelulusan/public/file/random_forest_model.pkl'
ENCODERS_PATH = 'C:/xampp/htdocs/rf.kelulusan/public/file/label_encoders.pkl'

# --- Fungsi Pembantu untuk Konversi Lama Studi ---
# Fungsi ini harus sama persis dengan yang digunakan saat melatih model
def convert_lama_studi_to_months(lama_studi_str):
    if pd.isna(lama_studi_str) or str(lama_studi_str).strip() == '':
        return 0 # Atau sesuai dengan penanganan data hilang saat pelatihan

    lama_studi_str = str(lama_studi_str).strip()

    tahun = 0
    bulan = 0

    match_tahun = re.search(r'(\d+)\s*Tahun', lama_studi_str, re.IGNORECASE)
    if match_tahun:
        tahun = int(match_tahun.group(1))

    match_bulan = re.search(r'(\d+)\s*Bulan', lama_studi_str, re.IGNORECASE)
    if match_bulan:
        bulan = int(match_bulan.group(1))

    return (tahun * 12) + bulan
# --- Akhir Fungsi Pembantu ---


def predict_single_data(input_data_dict):
    """
    Memuat model dan encoders, lalu memprediksi data tunggal.

    Args:
        input_data_dict (dict): Dictionary berisi fitur-fitur data baru yang akan diprediksi.
                                Kunci dictionary harus sama persis dengan nama kolom fitur
                                yang digunakan saat model dilatih (misalnya: 'prodi', 'jk', 'ip_s1', 'lama_studi').

    Returns:
        dict: Dictionary yang berisi hasil prediksi ('prediction') atau pesan error ('error').
    """
    try:
        # 1. Muat Model Random Forest yang sudah dilatih
        model = joblib.load(MODEL_PATH)

        # 2. Muat Label Encoders yang sudah disimpan
        label_encoders = joblib.load(ENCODERS_PATH)

        # --- PENTING: Pra-pemrosesan input_data_dict agar sesuai dengan pelatihan ---
        # Ini adalah langkah KRUSIAL untuk memastikan data baru diubah sama persis dengan data pelatihan.
        processed_input_data = input_data_dict.copy()

        # Konversi 'lama_studi' menjadi total bulan terlebih dahulu
        if 'lama_studi' in processed_input_data:
            processed_input_data['lama_studi'] = convert_lama_studi_to_months(processed_input_data['lama_studi'])
        else:
            # Jika 'lama_studi' tidak ada di input, pertimbangkan nilai default atau penanganan error
            # Untuk konsistensi dengan pelatihan, bisa diisi 0 jika diasumsikan belum ada lama studi
            processed_input_data['lama_studi'] = 0 # Sesuaikan ini jika ada penanganan lain saat pelatihan


        # Mengubah kolom IPK menjadi numerik dan mengisi string kosong ("") dengan 0.0
        ipk_columns = [f'ip_s{i}' for i in range(1, 14)] # ip_s1 sampai ip_s13
        for col in ipk_columns:
            if col in processed_input_data:
                try:
                    # Coba konversi ke float. Jika gagal (misal karena string kosong), gunakan 0.0.
                    val = float(processed_input_data[col])
                except (ValueError, TypeError):
                    val = 0.0 # Mengisi dengan 0.0 jika tidak bisa diubah ke float
                processed_input_data[col] = val
        # --- AKHIR PRA-PEMROSESAN ---

        # 3. Konversi input_data_dict yang sudah diproses ke DataFrame Pandas
        # Kunci dictionary harus match dengan kolom yang diharapkan model.
        # Pastikan urutan kolom sesuai dengan saat model dilatih!
        # Ambil daftar kolom dari model (atau dari X_train saat pelatihan)
        model_features = model.feature_names_in_ # Ini adalah cara yang lebih baik untuk mendapatkan urutan kolom
        input_df = pd.DataFrame([processed_input_data])
        # Reindex DataFrame untuk memastikan urutan kolom sama dengan model yang dilatih
        input_df = input_df.reindex(columns=model_features, fill_value=0) # Gunakan fill_value jika ada kolom yang hilang


        # 4. Pra-proses Data Baru menggunakan Label Encoders yang Dimuat
        # Hanya encode kolom yang bertipe 'object' (string) dan ada di LabelEncoders
        for column in input_df.columns:
            # Periksa apakah ada LabelEncoder untuk kolom ini (dan bukan untuk target, karena target adalah output)
            # Dan pastikan kolom tersebut bertipe 'object' (string)
            if column in label_encoders and column != 'target' and input_df[column].dtype == 'object':
                le = label_encoders[column] # Ambil LabelEncoder yang sesuai

                try:
                    # Transformasi nilai kategorikal menjadi numerik
                    input_df[column] = le.transform(input_df[column])
                except ValueError as e:
                    # Ini terjadi jika ada kategori yang belum pernah dilihat oleh LabelEncoder saat pelatihan.
                    return {"error": f"Nilai tidak dikenal untuk kolom kategorikal '{column}': '{processed_input_data[column]}'. Detail: {e}"}
            # Kolom numerik (termasuk 'lama_studi' dan IPK) tidak perlu di-encode lagi.

        # 5. Prediksi Menggunakan Model yang Sudah Dimuat
        prediction_encoded = model.predict(input_df)

        # 6. Dekode Hasil Prediksi ke Label Asli
        predicted_label = None
        if 'target' in label_encoders:
            le_target = label_encoders['target']
            predicted_label = le_target.inverse_transform(prediction_encoded)[0]
        else:
            predicted_label = prediction_encoded[0] # Jika target sudah numerik

        return {"prediction": predicted_label}

    except FileNotFoundError:
        return {"error": f"Model atau Label Encoders tidak ditemukan. Pastikan file ada di {MODEL_PATH} dan {ENCODERS_PATH}"}
    except Exception as e:
        return {"error": f"Terjadi kesalahan saat prediksi: {str(e)}"}

# --- BAGIAN EKSEKUSI UTAMA SAAT SKRIP DIJALANKAN ---
if __name__ == "__main__":
    if len(sys.argv) < 2:
        print(json.dumps({"error": "Tidak ada argumen jalur file input yang diberikan."}))
        sys.exit(1)

    json_file_path = sys.argv[1] # Dapatkan jalur file dari argumen baris perintah

    try:
        # Baca konten JSON dari file
        with open(json_file_path, 'r') as f:
            input_json_str = f.read()

        input_data = json.loads(input_json_str) # Sekarang coba muat string JSON dari file

        result = predict_single_data(input_data)

        print(json.dumps(result))

    except FileNotFoundError:
        print(json.dumps({"error": f"File JSON tidak ditemukan di jalur: {json_file_path}"}))
        sys.exit(1)
    except json.JSONDecodeError:
        print(json.dumps({"error": f"Format JSON tidak valid di file: {json_file_path}. Pastikan konten JSON valid."}))
        sys.exit(1)
    except Exception as e:
        print(json.dumps({"error": f"Kesalahan umum dalam skrip: {str(e)}"}))
        sys.exit(1)