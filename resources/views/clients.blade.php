<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Clientes</h1>

    <!-- Tabla de clientes -->
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Ciudad</th>
                <th>Salario</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($clients))
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client['name'] }}</td>
                        <td>{{ $client['age'] }}</td>
                        <td>{{ $client['city'] }}</td>
                        <td>{{ $client['salary'] }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No se encontraron clientes.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- Gráfico de barras: Edad vs. Salario -->
    <div>
        <h2>Gráfico de barras: Edad vs. Salario</h2>
        <canvas id="ageSalaryChart"></canvas>
    </div>
    
    <!-- Gráfico circular: Cantidad de personas por ciudad -->
    <div>
        <h2>Gráfico circular: Cantidad de personas por ciudad</h2>
        <canvas id="cityChart"></canvas>
    </div>

    <script>
        // Datos de los clientes
        const clients = @json($clients);

        // Datos para el gráfico de barras (Edad vs Salario)
        const ages = clients.map(client => client.age);
        const salaries = clients.map(client => client.salary);

        const ctxBar = document.getElementById('ageSalaryChart').getContext('2d');
        const ageSalaryChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ages,
                datasets: [{
                    label: 'Salario',
                    data: salaries,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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

        // Datos para el gráfico circular (Cantidad de personas por ciudad)
        const cityCounts = {};
        clients.forEach(client => {
            cityCounts[client.city] = (cityCounts[client.city] || 0) + 1;
        });

        const cityLabels = Object.keys(cityCounts);
        const cityData = Object.values(cityCounts);

        const ctxPie = document.getElementById('cityChart').getContext('2d');
        const cityChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: cityLabels,
                datasets: [{
                    label: 'Cantidad de Personas por Ciudad',
                    data: cityData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>
</html>
