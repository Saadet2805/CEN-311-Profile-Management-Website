<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Edit User Details</span></div>
            <form name="editUserForm" action="update_user.php" method="POST" onsubmit="return validateForm()">
                <?php
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $user_id = $_GET['id'];
                    
                    include 'db.php'; 
                    $sql = "SELECT id, name, surname, email, age, gender FROM user WHERE id = $user_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>" required>
                        </div>
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <input type="text" name="surname" placeholder="Surname" value="<?php echo $row['surname']; ?>" required>
                        </div>
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <input type="number" name="age" placeholder="Age" value="<?php echo $row['age']; ?>" required>
                        </div>
                        <div class="row">
                            <i class="fas fa-venus-mars"></i>
                            <select name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                <option value="Do not want to specify" <?php if ($row['gender'] == 'Do not want to specify') echo 'selected'; ?>>Do not want to specify</option>
                            </select>
                        </div>
                        <div class="row">
                            <i class="fas fa-at"></i>
                            <input type="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="row">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="New Password">
                        </div>

                        <div class="row button">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" value="Update">
                        </div>
                        <?php
                    } else {
                        echo "User not found.";
                    }

                    $conn->close();
                } else {
                    echo "Invalid user ID.";
                }
                ?>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            var form = document.forms["editUserForm"];
            var email = form["email"].value;
            var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            if (!email.match(emailPattern)) {
                alert("Please enter a valid email address.");
                return false;
            }

            return true; 
        }

        <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
            alert("User details updated successfully.");
            window.location.href = "index.php";
        <?php endif; ?>
    </script>
</body>
</html>