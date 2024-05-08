<?php

session_start();
include('includes/dbconnection.php');


if (isset($_SESSION['bpmsaid'])) {
    header('location:index.php');
    exit;
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT id FROM `tbladmin` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
      
        $_SESSION['bpmsaid'] = mysqli_fetch_assoc($result)['id'];
        header('location:index.php');
        exit;
    } else {
     
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - Hamro Salon</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="container">
      <div class="login-form">
         <h2>Admin Login</h2>
         <?php if (isset($error)) { ?>
            <div class="alert"><?php echo $error; ?></div>
         <?php } ?>
         <form method="post">
            <div class="form-group">
               <label for="username">Username:</label>
               <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
               <label for="password">Password:</label>
               <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit">Login</button>
         </form>
      </div>
   </div>
</body>
</html>
