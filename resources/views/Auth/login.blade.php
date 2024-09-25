
@extends('/Inc.menulogin')

@section('formulario')

<div class="ui container">
    <form action="" class="ui form">
            <br><br>
            <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
            <img src="{{ asset('img/conversionlogo_formpri.jpg') }}" class="image">
            <div class="content">
                Ingresa al sistem de Conversión de Moneda
            </div>
            </h2>
            <div class="ui stacked segment">
                <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="email" id="email" placeholder="Correo Electronico">
                </div>
                </div>
                <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" id="password" placeholder="Contraseña">
                </div>
                </div>
                <button type="button" onclick="ConsumoApiLogin()" class="ui fluid large teal submit button">Ingresar</button>
            </div>

            <div class="ui error message"></div>

            <div class="ui message">
            Para registrarse <a href="{{ route('registrarse') }}">¡Click Aqui!</a>
            </div>
        </div>
</div></form>
</div>

<script>
async function ConsumoApiLogin() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    const response = await fetch('http://127.0.0.1:8000/api/auth/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email, password })
    });

    const data = await response.json();
    console.log(data)
    if (response.ok) {
        // Almacenar el token en localStorage
        localStorage.setItem('token', data.access_token);
        console.log('Login successful, token:', data.access_token);
        location.href = "http://127.0.0.1:8000/conversion"
    } else {
        console.error('Login failed:', data.error);
    }
}


</script>

@endsection

