<?php
$usuario = $_POST['usuario'];
$contrasena = $_POST['contraseña'];

$serverName = "tcp:cafeteriahn.database.windows.net,1433";
$connectionOptions = [
    "Database" => "cafeteria",
    "Uid" => "josuejorge@cafeteriahn",
    "PWD" => "Barcelona25"
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

$sql = "SELECT * FROM Usuarios WHERE usuario = ? AND contrasena = ?";
$params = array($usuario, $contrasena);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt && sqlsrv_has_rows($stmt)) {
    echo "Login exitoso";
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>

