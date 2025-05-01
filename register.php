<?php
session_start();
include 'config/koneksi.php'; // include database connection

if (isset($_POST['register'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

    // Check if user exists
    $check_user = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $check_user);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists";
    } else {
        // Insert user into database
        $query = "INSERT INTO users (id, username, password) VALUES ('$id', '$username', '$password')";
        if (mysqli_query($conn, $query)) {
            echo "Registration successful";
            header("Location: ../admin/loginregister.php"); // Redirect after registration
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: ../index.php"); // Redirect to a welcome page
    } else {
        echo "Invalid login credentials";
    }
}

?>
