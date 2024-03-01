<?php
// Verifica si hay datos enviados con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge y almacena el valor enviado desde el formulario
    $cadena1 = $_POST['Cadena1'];

    // Muestra el valor recibido
    echo "El valor recibido es: " . htmlspecialchars($cadena1) . "<br>";

    // Prepara el comando a ejecutar
    $comando = escapeshellcmd("python led2.py " . escapeshellarg($cadena1));

    // Ejecuta el comando
    exec($comando, $output, $return_var);

    // Muestra la salida del comando
    echo "Resultado del comando: <br>";
    foreach ($output as $line) {
        echo htmlspecialchars($line) . "<br>";
    }

    // Muestra si el comando fue ejecutado exitosamente
    if ($return_var === 0) {
        echo "Comando ejecutado exitosamente.";
    } else {
        echo "Error al ejecutar el comando.";
    }
} else {
    // Si no se accede a la página mediante el método POST, muestra un mensaje.
    echo "No se han recibido datos del formulario.";
}
?>
