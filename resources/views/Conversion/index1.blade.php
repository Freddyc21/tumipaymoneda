@extends('/Inc.menu')

@section('formulario')

<div class="ui container">

<h1>llegando</h1>

{{ $conversion }}

<div class="ui container">
    <table class="ui olive table">
        <thead>
            <tr>
                <th>Moneda Origen</th>
                <th>Monto a Cambiar</th>
                <th>Modena Destino</th>
                <th>Valor</th>
                <th>Fecha de la Conversion</th>
            </tr>

        </thead>
        <tbody>
        @foreach ($conversion as $c)
        <tr>
                <td>{{ $c->Moneda_Origen }}</td>
                <td>{{ $c->Monto_Original }}</td>
                <td>{{ $c->Moneda_Destino }}</td>
                <td>{{ $c->Monto_Destino }}</td>
                <td>{{ $c->created_at }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>



@endsection