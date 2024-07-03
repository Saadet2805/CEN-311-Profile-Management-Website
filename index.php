<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<?php include 'sidebar.php'; ?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Number of Users</div>
                <?php
                include 'db.php';
                $sql = "SELECT COUNT(*) as user_count FROM user";
                $result = $conn->query($sql);
                $user_count = 0;
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $user_count = $row['user_count'];
                }
                $conn->close();
                ?>
                <div class="number"><?php echo $user_count; ?></div>
            </div>
            <i class='bx bxs-edit'></i>
        </div>
    </div>

    <?php
    if ($user_count > 0) {
        $results_per_page = 6; // Number of users per page
        $number_of_pages = ceil($user_count / $results_per_page);

        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($current_page < 1) $current_page = 1;
        if ($current_page > $number_of_pages) $current_page = $number_of_pages;

        $start_from = ($current_page - 1) * $results_per_page;

        include 'db.php';
        $sql = "SELECT id, name, surname, email, age FROM user ORDER BY name DESC LIMIT $start_from, $results_per_page";
        $result = $conn->query($sql);
        ?>

        <div class="user-boxes">
            <div class="posted-users box">
                <div class="topic">Users</div>
                <div class="user-details">
                    <?php
                    if ($result->num_rows > 0) {
                        echo '<ul class="details">';
                        echo '<li class="topic">Name</li>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<li class="user-item"><a href="display_user.php?id=' . $row["id"] . '">' . $row["name"] . '</a></li>';
                        }
                        echo '</ul>';
                        $result->data_seek(0);
                        echo '<ul class="details">';
                        echo '<li class="topic">Surname</li>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<li class="user-item"><a href="display_user.php?id=' . $row["id"] . '">' . $row["surname"] . '</a></li>';
                        }
                        echo '</ul>';
                        $result->data_seek(0);
                        echo '<ul class="details">';
                        echo '<li class="topic">Email</li>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<li class="user-item"><a href="display_user.php?id=' . $row["id"] . '">' . $row["email"] . '</a></li>';
                        }
                        echo '</ul>';
                        $result->data_seek(0);
                        echo '<ul class="details">';
                        echo '<li class="topic">Operations</li>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<li class="user-item">';
                            echo '<button type="button" class="btn btn-warning"><a href="edit_user.php?id=' . $row["id"] . '">Edit</a></button>';
                            echo '<button type="button" class="btn btn-danger" onclick="confirmDelete(' . $row["id"] . ')">Delete</button>';
                            echo '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>No users found.</p>';
                    }
                    $conn->close();
                    ?>
                </div>

                <!-- Pagination Controls -->
                <div class="pagination" style="text-align: center; margin-top: 20px;">
                    <?php
                    if ($current_page > 1) {
                        echo '<a href="index.php?page=' . ($current_page - 1) . '" class="btn btn-primary">Previous</a> ';
                    }
                    for ($page = 1; $page <= $number_of_pages; $page++) {
                        echo '<a href="index.php?page=' . $page . '" class="btn btn-primary">' . $page . '</a> ';
                    }
                    if ($current_page < $number_of_pages) {
                        echo '<a href="index.php?page=' . ($current_page + 1) . '" class="btn btn-primary">Next</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include 'footer.php'; ?>

<script>
    function confirmDelete(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = "delete_user.php?id=" + userId;
        }
    }
</script>
