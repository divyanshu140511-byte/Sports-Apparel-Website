<?php
// Start the session
session_start();

$connect = true;

/******************************************************
----------------Required Configuration----------------
Please edit the variables below so the 
member area can function properly.
******************************************************/

// Connect to the database
$fileconf = "app/app.config";
if (file_exists($fileconf)) {
    $env = json_decode(file_get_contents($fileconf)); 
    $base = mysqli_connect($env->host, $env->root, $env->pass, $env->db);
} else {
    $connect = false;
}

/* Check the connection */
if (mysqli_connect_errno()) {
    $connect = false;
}

if ($connect == false) {
    header('location:mysql.php');
}

// Root URL of the site
$url_root = 'http://localhost/myweb/';

/******************************************************
----------------Optional Configuration----------------
******************************************************/

// Homepage filename
$url_home = 'index.php';

// Design/theme name
$design = 'default';

// Logout handler
if (isset($_GET['logout']) && ($_GET["logout"] == true)) {
    session_unset();
    session_destroy();
}
?>