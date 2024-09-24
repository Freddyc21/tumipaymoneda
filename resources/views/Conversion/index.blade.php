@extends('/Inc.menu')

@section('formulario')

<div class="ui container">
    <form method="POST" action="{{ route('Conversion.store') }}" class="ui form">
        @csrf
        <br><br>
        <div class="ui middle aligned center aligned grid">
            <div class="column">
                <h2 class="ui teal image header">
                    <img src="{{ asset('img/conversionlogo_formpri.jpg') }}" class="image">
                    <div class="content">
                        Realizar Conversion de Moneda
                    </div>
                </h2>
                <div class="ui stacked segment">
                    <div class="four fields">
                        <div class="field">
                            <label for="">Moneda Origen</label>
                            <select class="ui fluid dropdown" name="Moneda_Origen">
                            @for ($i = 0; $i < count($nombresdecambio); $i++)
                                <option value="{{ $valorescambio[$i] }}">{{ $nombresdecambio[$i] }}</option>
                            @endfor
                            </select>
                        </div>
                        <div class="field">
                            <label for="">Valor a Convertir</label>
                            <input type="number" name="Monto_Original">
                        </div>
                        <div class="field">
                            <label for="">Moneda Destino</label>
                            <select class="ui fluid dropdown" name="Moneda_Destino">
                            @for ($i = 0; $i < count($nombresdecambio); $i++)
                                <option value="{{ $valorescambio[$i] }}">{{ $nombresdecambio[$i] }}</option>
                            @endfor
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="ui fluid large teal submit button">Calcular</button>
                </div>
    </form>
    </div>
    </div>
</div>

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


@endsection