function guardarNombre() {
    const nombre = document.getElementById('nombre').value;
    axios.post('guardar_bd.php', { "nombre": nombre })
    .then(
        response => {
            const nombres = response.data;
            const ultimoNombre = nombres[nombres.length - 1];
            tablita(ultimoNombre);
            // nombres.forEach(element => 
            //     {
            //         tablita(element);
            //     }
            // );
            
        }
    )
    .catch(
        error => {
            console.error(error);
        }
    );
}

function tablita(nombre){
    let tabla = document.querySelector('.tabla');
    
    let cuadro = document.createElement("tr");
    let texto = document.createElement("td");
    texto.innerHTML = nombre;
    cuadro.append(texto);

    tabla.append(cuadro);
};

