<?php
    session_start();
    session_destroy();
    $_SESSION['message'] = "You are now logged out";
    header("location: login.html")
?>