# Import library yang diperlukan
import sys
import json
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score
from sklearn.preprocessing import LabelEncoder
from sklearn.metrics import confusion_matrix
from sklearn.metrics import classification_report
import joblib
import time
import re 
import matplotlib.pyplot as plt
from sklearn.tree import plot_tree

start_total_time = time.perf_counter()

# path file
pathFiles = '/var/www/html/rf-grad-predictor/public/file/'


# print('RF_model.py')
# tempFile = 'C:/xampp/htdocs/rf.kelulusan/public/file/data.json'
if len(sys.argv) < 2:
    print("Error: No file argument provided <br>")
    sys.exit(1)

# Baca data dari file JSON
file_path = sys.argv[1]
# print(file_path)
with open(file_path, 'r', encoding='utf-8') as file:
    data = json.load(file)

# print(data)
# print("Data diterima, jumlah entri:", len(data))
# print("Data diterima, jumlah entri:")



# ################## RANDOM FORREST
dataReturn = dict()

# 1. Membaca dataset dari file JSON
file_path = pathFiles+'data.json'  
with open(file_path, 'r', encoding='utf-8') as file:
    data = json.load(file)

# Konversi data JSON ke DataFrame Pandas
df = pd.DataFrame(data)


# 2. Melihat 5 data pertama
# print("Data Awal:")
# print(df.head())
# dataReturn['head'] = df.head()

# Membersihkan spasi ekstra dari kolom 'lama_studi'
if 'lama_studi' in df.columns:
    df['lama_studi'] = df['lama_studi'].str.strip() # <<< Pastikan baris ini aktif dan berjalan!

    # --- START: Penambahan kode untuk mengkonversi 'lama_studi' ke total bulan ---
    def convert_lama_studi_to_months(lama_studi_str):
        # Tangani nilai NaN atau string kosong
        if pd.isna(lama_studi_str) or str(lama_studi_str).strip() == '':
            return 0 # Atau None, tergantung bagaimana Anda ingin menangani data hilang

        lama_studi_str = str(lama_studi_str).strip() # Pastikan ini string

        tahun = 0
        bulan = 0

        # Cari pola "X Tahun"
        match_tahun = re.search(r'(\d+)\s*Tahun', lama_studi_str, re.IGNORECASE)
        if match_tahun:
            tahun = int(match_tahun.group(1))

        # Cari pola "Y Bulan"
        match_bulan = re.search(r'(\d+)\s*Bulan', lama_studi_str, re.IGNORECASE)
        if match_bulan:
            bulan = int(match_bulan.group(1))

        return (tahun * 12) + bulan

    df['lama_studi'] = df['lama_studi'].apply(convert_lama_studi_to_months)
    # --- END: Penambahan kode untuk mengkonversi 'lama_studi' ke total bulan ---


# 3. Cek informasi dataset
# print("\nInformasi dataset:")
# print(df.info())
# print('<br> <br>')

# dataReturn['info'] = df.info()

# Pastikan ada kolom target dalam dataset
target_column = "predikat"  # Sesuaikan dengan nama kolom target


# 4. Pisahkan fitur (X) dan target (y)
X = df.drop(columns=[target_column])  # Fitur (semua kolom kecuali target)
y = df[target_column]  # Target atau label

# print(y)
# print('<br> <br>')


# 5. Mengubah data kategorikal menjadi angka
label_encoders = {} # Kita akan menyimpan semua LabelEncoder di sini
for column in X.columns:
    # Hanya lakukan Label Encoding untuk kolom bertipe 'object' (string)
    # Kolom 'lama_studi' sekarang sudah menjadi int/float, jadi tidak akan masuk sini
    if X[column].dtype == 'object':
        le = LabelEncoder()
        # Fit LabelEncoder ke SELURUH data kolom (tidak hanya X_train)
        # Ini penting agar encoder mengetahui semua kategori yang mungkin
        X[column] = le.fit_transform(X[column])
        label_encoders[column] = le # Simpan encoder untuk kolom ini

# Cek apakah target (y) juga berupa string
if y.dtype == 'object':
    le_target = LabelEncoder() # Buat LabelEncoder terpisah untuk target
    y = le_target.fit_transform(y)
    label_encoders['target'] = le_target # Simpan encoder target
    # label_mappings ini akan berisi mapping dari angka ke label asli target
    dataReturn['y_labels'] = {index: label for index, label in enumerate(le_target.classes_)}
else:
    dataReturn['y_labels'] = "Target is numeric, no mapping needed."


# print('\n\nData menjadi angka')
# print(X)
# dataReturn['X'] = X
dataReturn['X'] = X.to_dict(orient='records')

# print('\n\n')
# print('<br> <br>')
# Ini adalah mapping label encoder untuk setiap kolom fitur
# dataReturn['feature_label_mappings'] = {col: list(le.classes_) for col, le in label_encoders.items() if col != 'target'}
# dataReturn['target_label_mapping'] = {idx: label for idx, label in enumerate(label_encoders['target'].classes_)}


# 6. Membagi data menjadi data latih dan data uji (80% latih, 20% uji)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# print('total Xtrain: ')
# print(len(X_train))
# print('<br>')

# print('total Xtest: ')
# print(len(X_test))
# # print(X_train)
# print('<br> <br>')


dataReturn['lenXtrain'] = len(X_train)
dataReturn['lenXtest'] = len(X_test)


# 7. Membuat model Random Forest
model = RandomForestClassifier(n_estimators=100, max_depth=5, random_state=42)

# 8. Melatih model dengan data latih
model.fit(X_train, y_train)

# --- KODE UNTUK MENYIMPAN VISUALISASI POHON ---
try:
    # Ambil nama fitur dari kolom X
    feature_names = X.columns.tolist()
    # Ambil nama target/kelas dari label encoder
    target_names = label_encoders['target'].classes_.tolist()

    # Siapkan area plot
    fig, axes = plt.subplots(nrows=1, ncols=1, figsize=(20,10), dpi=300)

    # Gambar pohon pertama (model.estimators_[0])
    plot_tree(model.estimators_[0],
              feature_names=feature_names,
              class_names=target_names,
              filled=True,
              rounded=True,
              fontsize=8) # Ukuran font bisa disesuaikan

    # Tentukan path dan nama file untuk menyimpan gambar
    # Pastikan folder 'file' dapat ditulisi oleh server Anda
    image_save_path = pathFiles + 'visualisasi_pohon.png'

    # Simpan gambar ke file, bukan menampilkannya
    plt.savefig(image_save_path, bbox_inches='tight')
    plt.close(fig) # Penting untuk melepaskan memori setelah menyimpan

    # Beri pesan konfirmasi (opsional, bisa dilihat di log error PHP jika ada)
    print("<br>Visualisasi pohon berhasil disimpan.<br>")

    # 🖼️ Tambahkan path gambar ke dictionary dataReturn untuk diakses oleh PHP
    # Kita gunakan path relatif yang bisa diakses dari web
    web_accessible_path = 'file/visualisasi_pohon.png'
    dataReturn['tree_visualization_url'] = web_accessible_path

except Exception as e:
    dataReturn['tree_visualization_url'] = None
    print(f"<br>Gagal membuat visualisasi pohon: {e}<br>")



# 9. Menyimpan model Random Forest dan LabelEncoders
model_save_path = pathFiles + 'random_forest_model.pkl'
encoders_save_path = pathFiles + 'label_encoders.pkl'

try:
    joblib.dump(model, model_save_path)
    joblib.dump(label_encoders, encoders_save_path)
    print(f"<br>Model Random Forest berhasil disimpan di: {model_save_path}")
    print(f"Label Encoders berhasil disimpan di: {encoders_save_path}<br>")
    dataReturn['modelinfo'] = True
except Exception as e:
    print(f"<br>Gagal menyimpan model atau encoders: {e}<br>")
    dataReturn['modelinfo'] = False



# 10. Memprediksi data uji
y_pred = model.predict(X_test)


# 11. akurasi skore
accuracy = accuracy_score(y_test, y_pred)
# print(f"\nAkurasi Model Random Forest: {accuracy:.2f}")
dataReturn['accuracy'] = accuracy


# 12. Jumlah prediksi benar dan salah
cm = confusion_matrix(y_test, y_pred)
# print("\nConfusion Matrix:")
# print('confusion matrix')
# print(cm)
dataReturn['cm'] = cm.tolist()


# 13. Classification Report
report = classification_report(y_test, y_pred)
# print("\nClassification Report:")
# print(report)
dataReturn['report'] = report
# print('clasification report')
# print(dataReturn['cm'])

end_total_time = time.perf_counter()
dataReturn['execution_time'] = round(end_total_time - start_total_time, 4)


# Simpan ke file JSON
with open(pathFiles+"dataReturn.json", "w", encoding="utf-8") as file:
    json.dump(dataReturn, file, indent=4, default=str)