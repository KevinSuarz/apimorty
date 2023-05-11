<!DOCTYPE html>
<html>
    <head>
    <title>Guardar nombre en MySQL</title>
    </head>
    <body>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre">
        <button onclick="guardarNombre()">Enviar</button>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>   
        <script src="guardarNombre.js"></script>
        <table class="tabla">
        </table>
    </body>
</html>