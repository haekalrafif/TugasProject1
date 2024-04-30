<?php
$conn = mysqli_connect("localhost", "root", "rahasia", "pemweb");

function registrasi($data)
{
    global $conn;
    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];

    mysqli_query($conn, "INSERT INTO USER VALUES ('', '$email', '$username', '$password')");
    return mysqli_affected_rows($conn);
}