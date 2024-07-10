<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titular = $conn->real_escape_string($_POST['titular']);
    $dni = $conn->real_escape_string($_POST['dni']);
    $mesa = $conn->real_escape_string($_POST['mesa']);
    $estado = $conn->real_escape_string($_POST['estado']);

    $sql = "INSERT INTO pedidos (titular, dni, mesa, estado) VALUES ('$titular', '$dni', '$mesa', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Pedido creado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Método no permitido";
}
?>
