<?php
include 'connect.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    echo "<script>alert('Please log in first.'); window.location.href='1st.html';</script>";
    exit();
}

// Initialize variables
$user_id = $username = $user_email = $user_password = "";

// Retrieve user info based on the session email
$email = $_SESSION['email'];
$query = "SELECT * FROM `user` WHERE user_email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password']; // Only for demo purposes
} else {
    echo "<script>alert('User not found.'); window.location.href='1st.html';</script>";
    exit();
}
if (isset($_POST['delete_account'])) {
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Check if passwords match
  if ($password !== $confirm_password) {
      echo "<script>alert('Passwords do not match.'); window.location.href='profile.php';</script>";
      exit();
  }

  // Verify password
  if (password_verify($password, $user_password)) {
      // Delete user
      $deleteQuery = "DELETE FROM `user` WHERE user_id = ?";
      $stmt = $conn->prepare($deleteQuery);
      $stmt->bind_param("i", $user_id);

      if ($stmt->execute()) {
          // Destroy session and redirect
          session_destroy();
          echo "<script>alert('Account successfully deleted.'); window.location.href='1st.html';</script>";
          exit();
      } else {
          echo "<script>alert('Error deleting account.'); window.location.href='profile.php';</script>";
      }
  } else {
      echo "<script>alert('Incorrect password.'); window.location.href='profile.php';</script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="stylesheet3.css">
    
<style>
    thead th {
        letter-spacing: 1px;
        font-family: 'Russo One', sans-serif;
    }
    .order-row:hover {
    background-color: #555;
    cursor: pointer;
}

</style>

</head>
<body>
        <div class="ma2">
            <a href="2nd.html"><button class="btn" id="Home">HOME</button></a>
        <h1 id="mnwr">OPIUM</h1> 
         
    <div class="button-container">
      <a href="logout.php"><button class="button" onclick="clearCartFromOtherPage()">
        <svg
          class="icon"
          stroke="currentColor"
          fill="currentColor"
          stroke-width="0"
          viewBox="0 0 512 512"
          height="1em"
          width="1em"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"
          ></path>
        </svg>
      </button></a>
    <button class="button1">
        <svg
          class="icon"
          stroke="currentColor"
          fill="currentColor"
          stroke-width="0"
          viewBox="0 0 24 24"
          height="1em"
          width="1em"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M12 2.5a5.5 5.5 0 0 1 3.096 10.047 9.005 9.005 0 0 1 5.9 8.181.75.75 0 1 1-1.499.044 7.5 7.5 0 0 0-14.993 0 .75.75 0 0 1-1.5-.045 9.005 9.005 0 0 1 5.9-8.18A5.5 5.5 0 0 1 12 2.5ZM8 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0Z"
          ></path>
        </svg>
      </button>
    
      <a href="CART.html"><button class="button1">
        <svg
          class="icon"
          stroke="currentColor"
          fill="none"
          stroke-width="2"
          viewBox="0 0 24 24"
          stroke-linecap="round"
          stroke-linejoin="round"
          height="1em"
          width="1em"
          xmlns="http://www.w3.org/2000/svg"
        >
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
          <path
            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"
          ></path>
        </svg>
      </button></a>
    </div>
    
        </div>
    <div class="div1">
        <h1 id="Profile">PROFILE</h1>
    </div>
    <div class="main">
    <div class="vl">
        <br>
        <button id="pers">Personal Info</button>
        <br>
        <button id="sett">Settings</button>
        <br>
        <button id="trans">Transactions</button>
        <br>
        <button id="del">Delete Your Account</button>
    </div>
    <div id="personal_info">
        <label style="font-family: 'Russo One', sans-serif;" for="user_id">User ID:</label>
        <br>
        <input id="user_id" class="input-style" type="text" value="<?php echo htmlspecialchars($user_id); ?>" readonly> 
        <br><br><br><br>
        
        <label style="font-family: 'Russo One', sans-serif;" for="name">NAME:</label>
        <br>
        <input id="name" class="input-style" type="text" value="<?php echo htmlspecialchars($username); ?>" readonly>
        <br><br><br><br><br>
        
        <label style="font-family: 'Russo One', sans-serif;" for="email">E-MAIL:</label>
        <br>
        <input id="email" class="input-style" type="email" value="<?php echo htmlspecialchars($user_email); ?>" readonly>
        <br><br><br><br>
        
        <label style="font-family: 'Russo One', sans-serif;" for="password">PASSWORD:</label>
        <br>
        <input id="password" class="input-style" type="password" value="<?php echo htmlspecialchars($user_password); ?>" readonly>
    </div>
    <div id="Settings" hidden>
    <h1 style="font-family: 'Russo One', sans-serif;">Change Your Password</h1>
    <form method="POST" action="change_password.php">
        <label style="font-family: 'Russo One', sans-serif;" for="passch">Enter Your Current Password:</label>
        <br>
        <input id="passch" name="current_password" class="input-style" type="password" required>
        <br><br><br><br><br>
        
        <label style="font-family: 'Russo One', sans-serif;" for="passch2">Enter Your New Password:</label>
        <br>
        <input id="passch2" name="new_password" class="input-style" type="password" required>
        <br><br><br><br><br>
        
        <label style="font-family: 'Russo One', sans-serif;" for="passch3">Confirm Your New Password:</label>
        <br>
        <input id="passch3" name="confirm_password" class="input-style" type="password" required>
        <br><br><br><br><br>
        
        <button id="conbutt" type="submit">Confirm</button>
    </form>
</div>

<div id="transactions" hidden>
    <h1 style="color: #fff; text-align: center; margin-bottom: 20px;">Order History</h1>
    <table style="width: 100%; border-collapse: collapse; color: white; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <thead>
            <tr style="background-color: #2b2b2b; color: #f5f5f5;">
                <th style="padding: 15px; border-bottom: 2px solid #444;">Order ID</th>
                <th style="padding: 15px; border-bottom: 2px solid #444;">Order Date</th>
                <th style="padding: 15px; border-bottom: 2px solid #444;">Order Address</th>
                <th style="padding: 15px; border-bottom: 2px solid #444;">Payment Method</th>
                <th style="padding: 15px; border-bottom: 2px solid #444;">Order Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch orders specific to the logged-in user
            $orderQuery = "SELECT * FROM `order` WHERE user_id = ?";
            $stmt = $conn->prepare($orderQuery);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $orders = $stmt->get_result();

            if ($orders->num_rows > 0) {
                while ($order = $orders->fetch_assoc()) {
                    echo "<tr class='order-row'>";
                    echo "<td style='padding: 15px; border-bottom: 1px solid #555;'>" . htmlspecialchars($order['order_id']) . "</td>";
                    echo "<td style='padding: 15px; border-bottom: 1px solid #555;'>" . htmlspecialchars($order['order_date']) . "</td>";
                    echo "<td style='padding: 15px; border-bottom: 1px solid #555;'>" . htmlspecialchars($order['order_address']) . "</td>";
                    echo "<td style='padding: 15px; border-bottom: 1px solid #555;'>" . htmlspecialchars($order['payment_method']) . "</td>";
                    echo "<td style='padding: 15px; border-bottom: 1px solid #555; font-weight: bold; color: #0fbcf9;'>" . htmlspecialchars($order['order_price']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr style='background-color: #1a1a1a;'><td colspan='5' style='padding: 20px; text-align: center; color: #bbb;'>No orders found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

        <div id="deletion" hidden>
            <h1 style=" font-family: 'Russo One', sans-serif; color: #7e1919;">Account Deletion</h1>
            <br>
            <label style=" font-family: 'Russo One', sans-serif;" for="passdel">Enter Your Password :</label>
            <br>
            <input id="passdel" class="input-style" type="password" >
            <br>
            <br>
            <br>
            <br>
            <br>
            <label style=" font-family: 'Russo One', sans-serif;" for="passdel2">Confirm Your Password :</label>
            <br>
            <input id="passdel2" class="input-style" type="password" >
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
        <div class="form-container" id="del-form">
            <span class="close-btn" onclick="closeForm()">×</span>
            <form method="post" action="">
    <h1 style="text-align: center; font-family: 'Russo One', sans-serif; color: #7e1919;"> Are you sure that you want to delete your account? </h1>
    <input type="password" name="password" class="input" placeholder="Enter your Password!" required>
    <input type="password" name="confirm_password" class="input" placeholder="Confirm your password!" required>
    <button type="submit" name="delete_account">DELETE</button>
</form>

        </div>
    </div>
    <script>
        document.getElementById('del').addEventListener('click', () => {
            document.getElementById('del-form').style.display = 'block'
            pers.style.display = 'none';
            sett.style.display = 'none';
            trans.style.display = 'none';;
        });
        const persbtn= document.getElementById("pers");
        const settbtn= document.getElementById("sett");
        const transbtn=document.getElementById("trans");
        const trans=document.getElementById("transactions");
        const pers= document.getElementById("personal_info");
        const sett= document.getElementById("Settings");
        persbtn.addEventListener("click", event => {
        pers.style.display = 'block';
        sett.style.display = 'none';
        trans.style.display = 'none';
     });
     settbtn.addEventListener("click", event => {
        pers.style.display = 'none';
        sett.style.display = 'block';
        trans.style.display = 'none';
     });
     transbtn.addEventListener("click", event =>{
        pers.style.display = 'none';
        sett.style.display = 'none';
        trans.style.display = 'block';
     })
     function closeForm() {
            document.getElementById('del-form').style.display = 'none';
        }
        function clearCartFromOtherPage() {
            localStorage.removeItem('cart');
        }
    </script>
</body>
</html>