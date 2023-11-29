<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik</title>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div id="wrapperChart">
        <canvas id="myChart"></canvas>
    </div>

    <script src="resources/views/chart.js"></script>

    <style>
        #wrapperChart {
            width: 500px;
            margin: auto;
        }
    </style>

    <script>
        // Chart.js code
        const ctx = document.getElementById('myChart').getContext('2d');

        $.ajax({
            url: 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getAllProducts',
            type: 'GET',
            success: function (res) {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['buah', 'sayur'],
                        datasets: [{
                            label: 'Jumlah Produk',
                            data: [res.filter(checkbuah).length, res.filter(checksayur).length],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            },
            error: function (err) {
                console.log(err);
            }
        });

        function checkbuah(data) {
            return data.kategori == 'buah';
        }

        function checksayur(data) {
            return data.kategori == 'sayur';
        }
    </script>
    <a href="/admin" class="btn btn-primary">Kembali</a>
</body>
</html>
