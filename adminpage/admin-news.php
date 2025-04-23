<?php
// Include authentication check
require_once "auth_check.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNORSSGO News Admin</title>
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
        <a href="admin-dashboard.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">
            <i class="fa fa-dashboard fa-fw w3-margin-right"></i>DASHBOARD
        </a>
        <a href="admin-news.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-blue">
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
        <h1>News Management</h1>
        <p>Add, edit, and delete news items for your website</p>
        <p>Logged in as: <?php echo htmlspecialchars($_SESSION["fullname"]); ?></p>
    </div>

    <div class="admin-container">
        <div class="admin-tabs">
            <button class="tab-btn active" onclick="openTab('newsList')">News List</button>
            <button class="tab-btn" onclick="openTab('addNews')">Add News</button>
        </div>

        <div id="newsList" class="tab-content active">
            <h2>Manage News Items</h2>
            <div class="news-table-container">
                <table class="news-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="newsTableBody">
                        <!-- News items will be loaded here dynamically -->
                    </tbody>
                </table>
            </div>
        </div>

        <div id="addNews" class="tab-content">
            <h2 id="formTitle">Add New News Item</h2>
            <form id="newsForm" action="add_news.php" method="post">
                <input type="hidden" id="newsId" name="id">
                
                <div class="form-group">
                    <label for="newsTitle">Title</label>
                    <input type="text" id="newsTitle" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="newsSubtitle">Subtitle</label>
                    <input type="text" id="newsSubtitle" name="subtitle" required>
                </div>
                
                <div class="form-group">
                    <label for="newsDate">Date</label>
                    <input type="date" id="newsDate" name="date" required>
                </div>
                
                <div class="form-group">
                    <label for="newsDescription">Description</label>
                    <textarea id="newsDescription" name="description" rows="4" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="newsImage">Image URL</label>
                    <input type="text" id="newsImage" name="image_url" placeholder="Enter image URL or upload placeholder" required>
                    <small>Use placeholder by entering: /api/placeholder/400/320</small>
                </div>
                
                <div class="form-buttons">
                    <button type="button" onclick="clearForm()" class="btn btn-secondary">Clear</button>
                    <button type="submit" class="btn btn-primary">Save News</button>
                </div>
            </form>
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