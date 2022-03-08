<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PerchPeek Laravel Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Tickets Statistics</h2>

    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table-success">
            <td>Number of Tickets</td>
            <td>Number of Un-processed Tickets</td>
            <td>User submitted max Tickets</td>
            <td>Last Process Ticket Time</td>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $stats['totalCount'] }}</td>
                <td>{{ $stats['unprocessedCount'] }}</td>
                <td>{{ $stats['userName'] }}</td>
                <td>{{ $stats['lastProcessTime'] }}</td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>
