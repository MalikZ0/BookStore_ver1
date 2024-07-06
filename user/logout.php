<?php
    include '../functions/authcode.php';

    if(isset($_SESSION['auth']))
    {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        redirect('index.php', 'logged out successfully');

        // $_SESSION['message'] = "logged out successfully";
    }

    // header("Location: index.php");
?>