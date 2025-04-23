<?php
// Database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'unorssgo_db');

// Connect to database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}

// Check if admins table exists
$result = mysqli_query($conn, "SHOW TABLES LIKE 'admins'");
if(mysqli_num_rows($result) == 0) {
    echo "The admins table doesn't exist!";
    exit;
}

// Check admin records
$result = mysqli_query($conn, "SELECT * FROM admins");
echo "Found " . mysqli_num_rows($result) . " admin records.<br>";

// List admin usernames (for debugging)
while($row = mysqli_fetch_assoc($result)) {
    echo "Admin: " . $row['username'] . "<br>";
}

// Create a new admin with properly hashed password
$username = "newadmin";
$password = "admin123";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$fullname = "New Administrator";
$email = "newadmin@unorssgo.edu";

$sql = "INSERT INTO admins (username, password, fullname, email) VALUES (?, ?, ?, ?)";
if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "ssss", $username, $hashed_password, $fullname, $email);
    
    if(mysqli_stmt_execute($stmt)){
        echo "<br>Successfully created new admin account:<br>";
        echo "Username: newadmin<br>";
        echo "Password: admin123<br>";
    } else {
        echo "<br>Error creating admin: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>