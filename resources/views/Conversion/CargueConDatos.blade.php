
<script>

console.log("entrando a cargue con datos");
async function ResultadoDelLogin() {
    const token = localStorage.getItem('token');
    console.log(token);
    const response = await fetch('http://127.0.0.1:8000/api/auth/conversion', {
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    })
    .then(response => response.text())
    .then(html => {
        document.body.innerHTML = html;
    })
    .catch(error => 
    console.error('Error:', error));
    // setTimeout(6000);
    // location.href = "http://127.0.0.1:8000/api/auth/logueo";
    

}

ResultadoDelLogin();

 function AsignarValores() {
            var select_moneda_origen = document.getElementById('Moneda_Origen');
            var texto = select_moneda_origen.options[select_moneda_origen.selectedIndex].text;
            document.getElementById('Moneda_Origen_Texto').value = texto;

            var select_moneda_destino = document.getElementById('Moneda_Destino');
            var texto = select_moneda_destino.options[select_moneda_destino.selectedIndex].text;
            document.getElementById('Moneda_Destino_Texto').value = texto;
 }

  function logout() {
    document.logoutform.submit();
    localStorage.clear();
  }
    </script>

