<?php
session_start(); // Start the session

require_once('db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Salt for hashing
    $salt = "31L#6#N3Z0$^*";
    $hashed_password = md5($password . $salt);

    $stmt = $conn->prepare("SELECT id, email FROM user WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $hashed_password);
    $stmt->execute();
    $stmt->store_result();
    //check if user is db
    if ($stmt->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email; 

        // Redirect to index.php
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid email or password. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Login Form</span></div>
      <form action="manage_login.php" method="POST">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="email" placeholder="Email" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <?php if (isset($error)) : ?>
        <div class="row error">
          <?php echo $error; ?>
        </div>
        <?php endif; ?>
        <div class="row button">
          <input type="submit" value="Login">
        </div>
        <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>
      </form>
    </div>
  </div>
</body>
</html>
