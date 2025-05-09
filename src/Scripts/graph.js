let chart;

async function fetchData(range) {
    try {
        const response = await fetch(`get_data.php?periodo=${range}`);
        const data = await response.json();

        const labels = data.labels;
        const temperaturas = data.temperaturas; // Asegúrate de obtener la variable correcta
        const humedades = data.humedades; // Obtener también la humedad

        renderChart(labels, temperaturas, humedades); // Pasamos las 3 variables
    } catch (error) {
        console.error("Error al obtener datos:", error);
    }
}

function renderChart(labels, temperaturas, humedades) {
    const ctx = document.getElementById('myChart').getContext('2d');

    if (chart) {
        chart.destroy();
    }

    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Temperatura (°C)',
                    data: temperaturas,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: false,
                    tension: 0.1
                },
                {
                    label: 'Humedad (%)',
                    data: humedades,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: false,
                    tension: 0.1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Hora'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Valor'
                    }
                }
            }
        }
    });
}

// Cargar datos por defecto al iniciar
document.addEventListener("DOMContentLoaded", () => {
    fetchData('24h'); // o '1h', '7d', 'all' según lo que desees mostrar por defecto
});

window.onload = function() {
    fetchData('24h'); // o '1h', '7d', 'all' según lo que desees mostrar por defecto
}

