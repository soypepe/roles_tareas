const ctx = document.getElementById('miGraficoTareas').getContext('2d');
const ctx2 = document.getElementById('miGraficoActivos').getContext('2d');
let datosTareas= $("input#graficoTareas").val()
let datosActivos= $("input#graficoActivos").val()
datosTareas=JSON.parse(datosTareas)
datosActivos=JSON.parse(datosActivos)
// datos=datos.split(',')
console.log(datosActivos)
const graficoTareas = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Tareas Terminadas', 'Tareas Pendientes'],
        datasets: [{
            label: '# de Tareas',
            data: datosTareas,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
            ],
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

const graficoActivos = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Usuarios Activos', 'Usuarios Inactivos'],
        datasets: [{
            label: '# de Usuarios Activos/Inactivos',
            data: datosActivos,
            backgroundColor: [
                'rgba(255, 206, 86, 0.2)',
                'rgba(13, 255, 0, 0.2)',
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
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