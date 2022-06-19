<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <title>Laravel</title>
</head>

<body>
    @if (sizeof($anuncios) > 0)
        <div class="bloco_tabela">
            <table class="tabela">
                <thead>
                    <tr class="tabela_cabecalho">
                        <th>Posição</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Usuário</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anuncios as $index => $item)
                        <tr class="corpo_tabela">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->titulo }}</td>
                            <td>{{ $item->descricao }}</td>
                            <td>{{ $item->nome }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</body>

</html>
