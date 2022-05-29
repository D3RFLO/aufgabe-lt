<?php
require($_SERVER['DOCUMENT_ROOT'] . '/includes/config/dbConfig.php');

$host = DB_HOST;
$user = DB_USER;
$pass = DB_PASS;
$db = DB_NAME;
$port = DB_PORT;


try {
    $conn = new PDO("mysql:host=$host;dbname=$db;port=$port", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function saveUserDB($salutation, $firstname, $lastname, $email, $haircolor, $birthyear, $password, $message)
{
    global $conn;

    $sql = 'INSERT INTO registration (salutation, firstname, lastname, email, haircolor, birthyear, password, message) VALUES (?,?,?,?,?,?,?,?)';
    try {
        $conn->prepare($sql)->execute([$salutation, $firstname, $lastname, $email, $haircolor, $birthyear, $password, $message]);

        return true;

    } catch (PDOException $e) {
        return $e->getMessage();
    }


}
