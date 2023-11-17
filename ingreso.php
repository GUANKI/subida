<?php

include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        header("Location: inicio.php");
        exit();
    } else {
        echo "Datos incorrectos o inexistentes";
    }

    $stmt->close();
    $result->close();
}
?>

