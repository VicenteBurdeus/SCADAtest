let chart;

document.addEventListener('DOMContentLoaded', function () {
    // Inicializar la gráfica vacía
    const ctx = document.getElementById('myChart').getContext('2d');
    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Datos',
                data: [],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true
        }
    });

    // Cargar los datos iniciales
    fetchData('24h');
});

function fetchData(periodo) {
    fetch(`get_data.php?periodo=${periodo}`)
    .then(response => response.json())
    .then(data => {
        chart.data.labels = data.labels;
        chart.data.datasets[0].data = data.values;
        chart.update();
    })
    .catch(error => {
        console.error('Error al obtener datos:', error);
    });
}
