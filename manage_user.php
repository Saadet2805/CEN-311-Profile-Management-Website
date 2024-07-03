<?php
include ('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']); 

    if (!empty($name) && !empty($surname) && !empty($age) && !empty($gender) && !empty($password) && !empty($email)) {

        $stmt = $conn->prepare("INSERT INTO user (name, surname, age, gender, password, email) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $surname, $age, $gender, $password, $email);

        if ($stmt->execute()) {
            echo "New user added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill in <b>ALL</b> fields.";
    }
}
?>
