<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laravel</title>
</head>

<body>
    @if (sizeof($anuncios) > 0)
        <table>
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Título</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            @foreach ($anuncios as $index => $item)
                <tbody>
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->titulo }}</td>
                        <td>{{ $item->descricao }}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</body>

</html>
