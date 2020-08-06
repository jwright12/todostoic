<?php

require 'database.php';

$message = '';

if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);

    if ($stmt->execute()) {
        header('Location: login.php');
    } else {
        $message = 'Sorry there must have been an issue creating your account';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <div class="to-do-list">
      <?php require 'partials/header.php' ?>

      <?php if(!empty($message)): ?>
          <p> <?= $message ?></p>
      <?php endif; ?>
      <div class="to-do-header">
        <h1>SignUp or <a id="orSignup" href="login.php">Login</a></h1>
      </div>
      <div class="to-do-body" id="task_body">
        <form action="signup.php" method="POST">
            <input id="input_form" name="username" type="text" placeholder="Enter your username">
            <input id="input_form" name="email" type="text" placeholder="Enter your email">
            <input id="input_form" name="password" type="password" placeholder="Enter your Password">
            <input id="input_form" type="submit" value="Submit">
        </form>
      </div>
    </div>
  </body>
</html>