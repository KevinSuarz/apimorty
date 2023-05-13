window.addEventListener("load", () => {
  console.log("La página ha terminado de cargarse!!");
  obtenerNombres();
});

function obtenerNombres() {
  axios
    .post("obtener_nombres.php")
    .then((response) => {
      const nombres = response.data;
      nombres.forEach((nombre) => {
        agregarFilaTabla(nombre);
      });
    })
    .catch((error) => {
      console.error(error);
    });
}

function guardarNombre() {
  const nombre = document.getElementById("nombre").value;
  axios
    .post("guardar_bd.php", { nombre: nombre })
    .then((response) => {
      const nuevoNombre = response.data;
      agregarFilaTabla(nuevoNombre);
    })
    .catch((error) => {
      console.error(error);
    });
}

function agregarFilaTabla(nombre) {
  let tabla = document.querySelector(".tabla");

  let cuadro = document.createElement("tr");
  let texto = document.createElement("td");
  texto.innerHTML = nombre;
  cuadro.append(texto);

  tabla.append(cuadro);
}