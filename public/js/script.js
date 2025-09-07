// var BASEURL = "http://localhost/rf.kelulusan/public/";

document.addEventListener('DOMContentLoaded', function () {
    const gunakanModelLink = document.getElementById('gunakanModelLink');
    const fullPageLoader = document.getElementById('fullPageLoader');
    const statusMessage = document.getElementById('statusMessage'); // Opsional, untuk pesan

    // Tambahkan event listener untuk klik pada link
    gunakanModelLink.addEventListener('click', function (event) {
        // Mencegah navigasi langsung (jika ada proses AJAX)
        // Jika link ini hanya untuk navigasi ke halaman lain, kamu bisa hapus event.preventDefault()
        // dan loading akan muncul sebentar sebelum redirect.
        // event.preventDefault(); // Uncomment ini jika kamu melakukan AJAX di halaman yang sama

        // Tampilkan animasi loading
        fullPageLoader.classList.remove('hidden');
        statusMessage.textContent = 'Memuat model dan memproses data...';
        statusMessage.style.color = '#007bff';

        // Opsional: Nonaktifkan link agar tidak bisa diklik lagi saat loading
        gunakanModelLink.style.pointerEvents = 'none';
        gunakanModelLink.style.opacity = '0.7';

        // --- Simulasi Proses Asynchronous (Contoh) ---
        // Jika link ini sebenarnya memicu permintaan AJAX ke PHP:
        // Misalnya:
        /*
        fetch('<?= BASEURL ?>klasifikasi/prediksi', {
            method: 'POST', // atau 'GET'
            body: JSON.stringify({ /* data yang dikirim * / }),
            headers: { 'Content-Type': 'application/json' }
        })
        .then(response => response.json())
        .then(data => {
            // Proses data yang diterima
            statusMessage.textContent = 'Prediksi berhasil: ' + data.prediction;
            statusMessage.style.color = 'green';
        })
        .catch(error => {
            console.error('Error:', error);
            statusMessage.textContent = 'Terjadi kesalahan saat memproses.';
            statusMessage.style.color = 'red';
        })
        .finally(() => {
            // Sembunyikan animasi loading setelah proses selesai (baik sukses maupun error)
            fullPageLoader.classList.add('hidden');
            // Aktifkan kembali link
            gunakanModelLink.style.pointerEvents = 'auto';
            gunakanModelLink.style.opacity = '1';
        });
        */

        // Jika kamu hanya mengalihkan halaman (tanpa AJAX di halaman ini),
        // maka kamu tidak perlu menyembunyikan loader di sini.
        // Loader akan hilang otomatis saat halaman baru dimuat.
        // Namun, jika kamu menggunakan event.preventDefault(),
        // kamu harus secara manual mengalihkan halaman setelah prosesmu selesai, misal:
        // window.location.href = gunakanModelLink.href;
    });
});

// $.ajax({
//     url: BASEURL + 'dashboard/getMhs',

//     method: 'post',
//     dataType: 'json',
//     success: function (data) {
//         $('#totalmhs').append(data.totalmhs);
//     }
// });



// console.log('testing')

// $.ajax({
//     url: BASEURL + 'dashboard/getTotalMhsByTahun',
//     method: 'post',
//     dataType: 'json',
//     success: function (data) {

//         // chart 1
//         console.log(data)
//         console.log('test')
//         const ctx = document.getElementById('myChart').getContext('2d');
//         const data = {
//             labels: [
//                 'Sudah mengisi kuisioner/instrumen',
//                 'Belum mengisi kuisioner/instrumen'
//             ],
//             datasets: [{
//                 label: 'My First Dataset',
//                 data: [data[0].total, data[0].total],
//                 backgroundColor: [
//                     'rgb(75, 192, 192)',
//                     'rgb(255, 205, 86)'
//                 ],
//                 hoverOffset: 4
//             }]
//         };
//         const config = {
//             type: 'doughnut',
//             data: data,
//             options: {}
//         };
//         const myChart = new Chart(
//             document.getElementById('myChart'),
//             config
//         );

//     }
// });


$.ajax({
    url: BASEURL + 'dashboard/getInstrumen',
    method: 'post',
    dataType: 'json',
    success: function (dataRek) {

        // chart 1
        console.log(dataRek)
        const ctx = document.getElementById('myChart').getContext('2d');
        const data = {
            labels: [
                'Sudah mengisi kuisioner/instrumen',
                'Belum mengisi kuisioner/instrumen'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [dataRek.totalsudah, dataRek.totalbelum],
                backgroundColor: [
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };
        const config = {
            type: 'doughnut',
            data: data,
            options: {}
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    }
});

