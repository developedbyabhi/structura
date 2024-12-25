<!DOCTYPE html>
<html>
<head>
    <title>Organizational Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Organizational Chart</h1>
    <form action="{{ route('organizationalchart.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Employee Name" required>
        <select name="reports_to">
            <option value="">No Manager</option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
        <button type="submit">Add Employee</button>
    </form>

    <h2>Chart</h2>
    <canvas id="orgChart"></canvas>

    <script>
        var ctx = document.getElementById('orgChart').getContext('2d');

        // Prepare the chart data for the hierarchy
        var chartData = {!! json_encode($chartData) !!};

        // Convert the hierarchical data into Chart.js-compatible format
        var labels = [];
        var datasets = [];

        // Logic to transform the data into a suitable format for Chart.js
        var processHierarchy = function(hierarchy, parentLabel = 'Root') {
            Object.keys(hierarchy).forEach(function(key) {
                if (key === 'root') {
                    hierarchy[key].forEach(function(employeeName) {
                        labels.push(employeeName);
                        datasets.push({
                            label: parentLabel + " > " + employeeName,
                            data: [1],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        });
                    });
                } else {
                    hierarchy[key].forEach(function(employeeName) {
                        labels.push(employeeName);
                        datasets.push({
                            label: parentLabel + " > " + employeeName,
                            data: [1],
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 1
                        });
                    });
                    processHierarchy(hierarchy[key], parentLabel);
                }
            });
        };

        processHierarchy(chartData);

        var myChart = new Chart(ctx, {
            type: 'bar',  // You can experiment with 'line', 'bar', or 'radar' etc.
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
