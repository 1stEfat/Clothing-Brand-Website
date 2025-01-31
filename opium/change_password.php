<?php
include 'connect.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    echo "<script>alert('Please log in first.'); window.location.href='1st.html';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Retrieve the hashed password from the database
    $query = "SELECT user_password FROM `user` WHERE user_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['user_password'];

        // Verify the current password
        if (password_verify($current_password, $hashed_password)) {
            // Check if new password and confirmation match
            if ($new_password === $confirm_password) {
                // Hash the new password
                $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

                // Update the password in the database
                $update_query = "UPDATE `user` SET user_password = ? WHERE user_email = ?";
                $update_stmt = $conn->prepare($update_query);
                $update_stmt->bind_param("ss", $new_hashed_password, $email);

                if ($update_stmt->execute()) {
                    echo "<script>alert('Password changed successfully!'); window.location.href='profile.php';</script>";
                } else {
                    echo "<script>alert('Failed to update password. Please try again.'); window.location.href='profile.php';</script>";
                }
            } else {
                echo "<script>alert('New password and confirmation do not match.'); window.location.href='profile.php';</script>";
            }
        } else {
            echo "<script>alert('Incorrect current password.'); window.location.href='profile.php';</script>";
        }
    } else {
        echo "<script>alert('User not found.'); window.location.href='1st.html';</script>";
    }
}
?>
