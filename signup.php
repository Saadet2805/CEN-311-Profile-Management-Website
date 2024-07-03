<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <script>
    function validateForm(event) {
      var form = document.forms["signupForm"];
      var email = form["email"].value;
      var password = form["password"].value;
      var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

      if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        return false;
      }

      if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
      }

      return true; 
    }
  </script>
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Sign Up Form</span></div>
      <form name="signupForm" action="manage_signup.php" method="POST" onsubmit="return validateForm(event)">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="name" placeholder="Name" required>
        </div>
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="surname" placeholder="Surname" required>
        </div>
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="number" name="age" placeholder="Age" required>
        </div>
        <div class="row">
          <i class="fas fa-venus-mars"></i>
          <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Female">Female</option>
            <option value="Male">Male</option>
            <option value="Do not want to specify">Do not want to specify</option>
          </select>
        </div>
        <div class="row">
          <i class="fas fa-at"></i>
          <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="row button">
          <input type="submit" value="Sign Up">
        </div>
        <div class="login-link">Already a member? <a href="login.php">Login</a></div>
      </form>
    </div>
  </div>
</body>
</html>
