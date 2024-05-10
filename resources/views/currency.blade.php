<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Rates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">En Ucuz Döviz Kurları</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Döviz</th>
            <th scope="col">En Düşük Kur</th>
        </tr>
        </thead>
        <tbody>
        @if(!count($cheapestList))
            <tr>
                <td colspan="2">Veri bulunamadı.</td>
            </tr>
        @endif

        @foreach($cheapestList as $list)
            <tr>
                <td>{{ $list['name'] }}</td>
                <td>{{ $list['rate'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
