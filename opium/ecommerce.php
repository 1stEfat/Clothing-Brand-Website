<?php
include 'connect.php';

$error = ""; // Variable to store error messages

// Signup Authentication
if (isset($_POST['signup-form'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmpass = trim($_POST['confirmpass']);

    if (empty($name) || empty($email) || empty($password) || empty($confirmpass)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid Email Address!";
    } elseif ($password !== $confirmpass) {
        $error = "Passwords do not match!";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters!";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT); // Secure hashing
        $checkEmail = $conn->prepare("SELECT * FROM user WHERE user_email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $result = $checkEmail->get_result();

        if ($result->num_rows > 0) {
            $error = "Email Address Already Exists!";
        } else {
            $insertQuery = $conn->prepare("INSERT INTO user (username, user_email, user_password) VALUES (?, ?, ?)");
            $insertQuery->bind_param("sss", $name, $email, $password);
            if ($insertQuery->execute()) {
                header("Location: 1st.html");
                exit();
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
}

// Login Authentication
if (isset($_POST['login-form'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM user WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['user_password'])) {
            session_start();
            $_SESSION['email'] = $row['user_email'];
            header("Location: 2nd.html");
            exit();
        } else {
            $error = "Incorrect Email or Password";
        }
    } else {
        $error = "Not Found, Incorrect Email or Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup/Login</title>
    <style>
        .error-message {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: red;
            color: white;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
        <!-- Display Error Message -->
        <?php if (!empty($error)): ?>
            <div class="error-message">
                <span><?php echo $error; ?></span>
                <button class="close-btn" onclick="this.parentElement.style.display='none'">×</button>
            </div>
        <?php endif; ?>
    </div>