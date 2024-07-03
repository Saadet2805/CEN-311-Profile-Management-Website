<?php include 'sidebar.php'; ?>

<div class="home-content">
    <div class="container">
        <div class="user-content">
            <?php
            include 'db.php';
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {

                $title_id = intval($_GET['id']);
                $sql = "SELECT * FROM user WHERE id = ?";
                $stmt = $conn->prepare($sql);
                
                $stmt->bind_param("i", $title_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<div class="user-box">';
                    echo '<h1>' . htmlspecialchars($row['name']) . '</h1>';
                    echo '<p><strong>Email: </strong> ' . htmlspecialchars($row['email']) . '</p>';
                    echo '<p><strong>Age:</strong> ' . htmlspecialchars($row['age']) . '</p>';
                    echo '<p><strong>Gender:</strong> ' . htmlspecialchars($row['gender']) . '</p>';
                    
                    echo '</div>';
                } else {
                    echo '<p>User not found.</p>';
                }

                $stmt->close();
            } else {
                echo '<p>Invalid User ID.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>