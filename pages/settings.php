<?php
session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include_once '../include/header.php';
include_once '../include/config.php';

// Get the user's ID from the session
$userID = $_SESSION['user_id'];

// Query to fetch user information from your members table
$query_user_info = "SELECT * FROM users WHERE id = :user_id";
$user_info_stmt = $pdo->prepare($query_user_info);
$user_info_stmt->bindParam(':user_id', $userID, PDO::PARAM_INT);
$user_info_stmt->execute();
$user_data = $user_info_stmt->fetch(PDO::FETCH_ASSOC);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newName = $_POST['new_name'];
    $newEmail = $_POST['new_email'];
    $newPassword = $_POST['new_password'];

    // Update the user's name in the appropriate table
    $updateNameQuery = "UPDATE users SET name = :new_name WHERE id = :user_id";
    $updateNameStmt = $pdo->prepare($updateNameQuery);
    $updateNameStmt->bindParam(':new_name', $newName, PDO::PARAM_STR);
    $updateNameStmt->bindParam(':user_id', $userID, PDO::PARAM_INT);
    $updateNameStmt->execute();

    // Update the user's email in the appropriate table
    $updateEmailQuery = "UPDATE users SET email = :new_email WHERE id = :user_id";
    $updateEmailStmt = $pdo->prepare($updateEmailQuery);
    $updateEmailStmt->bindParam(':new_email', $newEmail, PDO::PARAM_STR);
    $updateEmailStmt->bindParam(':user_id', $userID, PDO::PARAM_INT);
    $updateEmailStmt->execute();

    // Update the user's password in the appropriate table
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $updatePasswordQuery = "UPDATE users SET password = :hashed_password WHERE id = :user_id";
    $updatePasswordStmt = $pdo->prepare($updatePasswordQuery);
    $updatePasswordStmt->bindParam(':hashed_password', $hashedPassword, PDO::PARAM_STR);
    $updatePasswordStmt->bindParam(':user_id', $userID, PDO::PARAM_INT);
    $updatePasswordStmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings</title>
    <link rel="stylesheet" type="text/css" href="../css/settings.css">

</head>

<body>

<div class="container">
    <h2>User Settings</h2>
    <div class="user-info">
        <h3>User Information</h3>
        <div class="info-item">
            <label for="name">Name:</label>
            <span><?php echo $user_data['name']; ?></span>
        </div>
        <div class="info-item">
            <label for="email">Email:</label>
            <span><?php echo $user_data['email']; ?></span>
        </div>
    </div>
</div>


        <div class="container">
            <div class="form-container">
                <h3>Update Information</h3>
                <p>Please fill out all fields</p>
                <form method="post">
                    <label for="new_name">New Name:</label>
                    <input type="text" id="new_name" name="new_name" required>
                    <br>
                    <label for="new_email">New Email:</label>
                    <input type="email" id="new_email" name="new_email" required>
                    <br>
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>
                    <br>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>





</body>

</html>
<?php
include_once '../include/footer.php';
?>