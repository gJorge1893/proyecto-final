import Chart from 'chart.js';

// let ctx = document.getElementById('myChart').getContext('2d');
// let chart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: {!! json_encode($tableData) !!}, // Asume que tienes los nombres de las tablas
//         datasets: [{
//             label: '# de registros',
//             data: {!! json_encode($tableData) !!},
//             backgroundColor: 'rgba(75, 192, 192, 0.2)', // Puedes personalizar el color de las barras aquí
//             borderColor: 'rgba(75, 192, 192, 1)',
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     }
// });