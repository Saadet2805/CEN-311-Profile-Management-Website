<?php
require_once ('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long";
        exit;
    }

    $salt = "31L#6#N3Z0$^*";
    $password .= $salt;
    $password = md5($password);

    // Check if the email already exists in the db
    $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo '<script>alert("This email already exists!");';
        echo 'window.location.href = "signup.php";</script>';
        $stmt->close();
        exit;
    }
    $stmt->close();

    if (!empty($name) && !empty($surname) && !empty($age) && !empty($gender) && !empty($email) && !empty($password)) {
        // Using prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO user (name, surname, age, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $surname, $age, $gender, $email, $password);

        if ($stmt->execute()) {
            
            echo '<script>alert("New user added successfully!");';
            echo 'window.location.href = "index.php";</script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill in <b>ALL</b> fields.";
    }
}
?>
