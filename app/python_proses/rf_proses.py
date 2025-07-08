# 📌 Import library yang diperlukan
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score
from sklearn.preprocessing import LabelEncoder

# 📌 1. Membaca dataset dari file CSV
file_path = "example data.csv"  # Sesuaikan dengan lokasi file
df = pd.read_csv(file_path)

# 📌 2. Melihat 5 data pertama
print("Data Awal:")
print(df.head())

# 📌 3. Cek informasi dataset
print("\nInformasi dataset:")
print(df.info())

# Pastikan ada kolom target dalam dataset
target_column = df.columns[-1]

# 📌 4. Pisahkan fitur (X) dan target (y)
X = df.drop(columns=[target_column])  # Fitur (semua kolom kecuali target)
y = df[target_column]  # Target atau label

# 📌 5. Mengubah data kategorikal menjadi angka
for column in X.columns:
    if X[column].dtype == 'object':  # Jika kolom adalah tipe string (object)
        le = LabelEncoder()
        X[column] = le.fit_transform(X[column])

# Cek apakah target (y) juga berupa string
if y.dtype == 'object':
    le = LabelEncoder()
    y = le.fit_transform(y)

# 📌 6. Membagi data menjadi data latih dan data uji (80% latih, 20% uji)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# 📌 7. Membuat model Random Forest
model = RandomForestClassifier(n_estimators=100, max_depth=5, random_state=42)

# 📌 8. Melatih model dengan data latih
model.fit(X_train, y_train)

# 📌 9. Memprediksi data uji
y_pred = model.predict(X_test)

# 📌 10. Evaluasi model
accuracy = accuracy_score(y_test, y_pred)
print(f"\nAkurasi Model Random Forest: {accuracy:.2f}")

# 📌 11. Memprediksi data baru (jika ada)
sample_data = X_test.iloc[0].values.reshape(1, -1)
sample_prediction = model.predict(sample_data)
print(f"\nPrediksi untuk contoh data baru: {sample_prediction[0]}")
