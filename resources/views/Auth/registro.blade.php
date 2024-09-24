
@extends('/Inc.menulogin')

@section('formulario')

<div class="ui container">
    <form method="POST" action="{{ route('register') }}" class="ui form">
            @csrf
            <br><br>
            <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
            <img src="{{ asset('img/conversionlogo_formpri.jpg') }}" class="image">
            <div class="content">
                Registrarse al sistema de Conversión de Moneda
            </div>
            </h2>
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="name" placeholder="Nombre Completo">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="email" placeholder="Correo Electronico">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Contraseña">
                    </div>
                </div>
                <button type="submit" class="ui fluid large teal submit button">Ingresar</button>
            </div>

            <div class="ui error message"></div>
        </div>
        </div>
    </form>
</div>

@endsection

