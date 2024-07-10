cargarPedidos();

document.getElementById('campo').addEventListener('keyup', cargarPedidos);

function cargarPedidos() {
    let entrada = document.getElementById('campo');
    let contenido = document.getElementById('contenido');
    let url = "cargar-pedidos.php";
    let buscarDatos = new FormData();
    buscarDatos.append('campo', entrada.value);

    fetch(url, {
        method: "POST",
        body: buscarDatos
    }).then(res => res.json())
    .then(datos => {
        contenido.innerHTML = datos;
    }).catch(err => console.log(err));
}