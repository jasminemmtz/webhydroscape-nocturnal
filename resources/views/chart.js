const ctx = document.getElementById('myChart');

$.ajax({
    url: 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/getAllProducts',
    type: 'GET',
    success: function (res) {
        // console.log(res);
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

function checkbuah(data){
    return data.kategori == 'buah';
}

function checksayur(data){
    return data.kategori == 'sayur';
}