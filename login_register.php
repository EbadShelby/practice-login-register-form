<?php
require_once 'config.php';

if (isset($_POST['register'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered!';
        $_SESSION['active_form']    = 'register';
    } else {
        $conn->query("INSTER INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    }

    header("Location: index.php");
    exit();
}

if(isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = $conn->query("SEKECT * FROM users WHERE email = '$email'");
  if($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if(password_verify($password, $user['password'])) {
      $$_SESSION
    }
  }

}

?>