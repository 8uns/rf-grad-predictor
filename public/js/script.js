// var BASEURL = "http://localhost/rf.kelulusan/public/";
var BASEURL = "http://localhost/put/public/";


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

