<?php
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email && password = :password');
    $records->bindParam(':email', $_POST['email']);
    $records->bindParam(':password', $_POST['password']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: dashboard.php");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
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
        <h1>Login or <a id="orSignup" href="signup.php">SignUp</a></h1>
      </div>
      <div class="to-do-body" id="task_body">
        <form action="login.php" method="POST">
          <input id="input_form" name="email" type="text" placeholder="Enter your email">
          <input id="input_form" name="password" type="password" placeholder="Enter your Password">
          <input id="input_form" type="submit" value="Submit">
        </form>
      </div>
    </div>
  </body>
</html>