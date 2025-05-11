let chart;

async function fetchData(range) {
    try {
        const response = await fetch(`get_data.php?periodo=${range}`);
        const data = await response.json();

        let labels = data.labels;
        const temperaturas = data.temperaturas;
        const humedades = data.humedades;

        // Si el rango es menor a 24h, solo mostramos la hora
        if (range === '1h' || range === '24h' || range === '6h' || range === '12h') {
            labels = labels.map(label => {
                const date = new Date(label);
                return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            });
        }else{
            labels = labels.map(label => {
                const date = new Date(label);
                return date.toLocaleString([], {
                    year: '2-digit',
                    month: '2-digit',
                    day: '2-digit',
                    hour: '2-digit'
                }) + ":00"; // añade minutos ":00"
            });
        }

        renderChart(labels, temperaturas, humedades);
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

