<?php
    include '../functions/functions.php';

    if (isset($_SESSION['auth'])) {
        if($_SESSION['role_as'] != 1)
        {
            redirect('../user/index.php', 'You are not authorized');
        }
    }
    else
    {
        redirect('../user/login.php', 'Login to continue');
    }
?>