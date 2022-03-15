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
    <h2>Tickets List</h2>

    @if (count($ticketsData['items']) === 0)
        <p> No data found</p>
    @else
        <table class="table table-bordered mb-5">
            <thead>
            <tr class="table-success">
                <th scope="col">Ticket Id</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Ticket Subject</th>
                <th scope="col">Ticket Creation Time</th>
            </tr>
            </thead>
            <tbody>
                @foreach($ticketsData['items'] as $data)
                    <tr>
                        <th scope="row">{{ $data['id'] }}</th>
                        <td>{{ $data['user_name'] }}</td>
                        <td>{{ $data['email'] }}</td>
                        <td>{{ $data['subject'] }}</td>
                        <td>{{ $data['created_at'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        @if ($ticketsData['prevPageUrl'] !== null)
            <a class="page-link" href="{{ $ticketsData['prevPageUrl'] }}" style='margin-right:16px'>Previous</a>
        @endif

        @if ($ticketsData['nextPageUrl'] !== null)
            <a class="page-link" href="{{ $ticketsData['nextPageUrl'] }}">Next</a>
        @endif
    </div>
</div>
</body>
</html>
