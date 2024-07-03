<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    // Check if a new password is provided
    if (!empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);

        $salt = "31L#6#N3Z0$^*";
        $password .= $salt;
        $password = md5($password);

        $sql = "UPDATE user SET name=?, surname=?, age=?, gender=?, email=?, password=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssi", $name, $surname, $age, $gender, $email, $password, $id);
    } else {
        $sql = "UPDATE user SET name=?, surname=?, age=?, gender=?, email=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissi", $name, $surname, $age, $gender, $email, $id);
    }

    if ($stmt->execute()) {
        header("Location: edit_user.php?id=$id&success=true");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
