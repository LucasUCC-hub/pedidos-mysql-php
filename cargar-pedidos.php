<?php
require 'config.php';

$columnas = ['id', 'titular', 'dni', 'mesa', 'estado'];
$tabla = 'pedidos';

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;

$where = '';

if ($campo != null) {
    $where .= "WHERE (";

    $contador = count($columnas);

    for ($i = 0; $i < $contador; $i++) {
        $where .= $columnas[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr($where, 0, -4);
    $where .= ")";
}

$consulta = "SELECT " . implode(", ", $columnas) . " FROM $tabla $where";

$resultado = $conn->query($consulta);

$html = '';

if ($resultado && $resultado->num_rows > 0) {
    while ($datos = $resultado->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $datos['id'] . '</td>';
        $html .= '<td>' . $datos['titular'] . '</td>';
        $html .= '<td>' . $datos['dni'] . '</td>';
        $html .= '<td>' . $datos['mesa'] . '</td>';
        $html .= '<td>' . $datos['estado'] . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr><td colspan="5" class="error">No se encontraron resultados</td></tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);

$conn->close();
?>
