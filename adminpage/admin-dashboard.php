<?php
// Include authentication check
require_once "auth_check.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNORSSGO Admin Dashboard</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="admin.css">
    
</head>
<body class="w3-light-grey">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse sidebar" id="mySidebar">
    <div class="w3-container">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding" title="close menu">
            <i class="fa fa-remove"></i>
        </a>
        <div class="logo-container">
            <img src="home_logo.png" class="logo w3-round" style="width:30%;">
            <h4 class="editable-title"><b>UNORSSGO</b></h4>
        </div>
    </div>
    <div class="w3-bar-block">
        <a href="admin-dashboard.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-blue">
            <i class="fa fa-dashboard fa-fw w3-margin-right"></i>DASHBOARD
        </a>
        <a href="admin-news.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">
            <i class="fa fa-newspaper-o fa-fw w3-margin-right"></i>MANAGE NEWS
        </a>
        <a href="news.html" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">
            <i class="fa fa-eye fa-fw w3-margin-right"></i>VIEW NEWS PAGE
        </a>
        <a href="logout.php" class="w3-bar-item w3-button w3-padding">
            <i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT
        </a>
    </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content area -->
<div class="w3-main" style="margin-left:300px; padding: 20px;">
    <!-- Sidebar toggle button at the top -->
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()">
        <i class="fa fa-bars"></i>
    </span>

    <div class="admin-header">
        <h1>Admin Dashboard</h1>
        <p>Welcome to the UNORSSGO News Management System</p>
        <p>Logged in as: <?php echo htmlspecialchars($_SESSION["fullname"]); ?></p>
    </div>

    <div class="admin-container">
        <div class="dashboard-summary">
            <div class="summary-card">
                <i class="fa fa-newspaper-o"></i>
                <h3>Total News Items</h3>
                <div class="count" id="totalNewsCount">0</div>
            </div>
            
            <div class="summary-card">
                <i class="fa fa-calendar"></i>
                <h3>Recent News</h3>
                <div class="count" id="recentNewsCount">0</div>
            </div>
            
            <div class="summary-card">
                <i class="fa fa-eye"></i>
                <h3>Active News Items</h3>
                <div class="count" id="activeNewsCount">0</div>
            </div>
        </div>
        
        <h2>Recent News</h2>
        <div class="news-table-container">
            <table class="news-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="dashboardNewsTable">
                    <!-- Recent news items will be loaded here dynamically -->
                </tbody>
            </table>
        </div>
        
        <div class="admin-actions" style="margin-top: 30px; text-align: right;">
            <a href="admin-news.php" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New News
            </a>
        </div>
    </div>
</div>

<script src="admin.js"></script>
<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
    
    // Load news items when page loads
    document.addEventListener('DOMContentLoaded', function() {
        loadNewsItems();
    });
</script>

</body>
</html>