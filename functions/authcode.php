<?php 
include 'functions.php';

    if(isset($_POST['register_btn']))
    {
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $phone = mysqli_real_escape_string($con,$_POST['phone']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $Cpassword = mysqli_real_escape_string($con,$_POST['Cpassword']);

        // check the email already registered
        $check_email_query = "SELECT email FROM users WHERE email='$email'";
        $check_email_query_run = mysqli_query($con, $check_email_query);

        if (mysqli_num_rows($check_email_query_run) > 0) {
            redirect('../user/register.php', 'Email already registered');
            // $_SESSION['message'] = "Email already registered";
            // header('Location: ../register.php');
        }
        else
        {          
            // check whether the password matching
            if($password == $Cpassword)
            {
                // insert data to db
                $insert_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name','$email',$phone,'$password')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if($insert_query_run)
                {
                    redirect('../user/login.php', 'Registered Successfully ');
                    // $_SESSION['message'] = "Registered Successfully ";
                    // header('Location: ../login.php');
                }
                else
                {
                    redirect('../user/register.php', 'Something went wrong');
                    // $_SESSION['message'] = "Something went wrong ";
                    // header('Location: ../register.php');
                }
            } 
            else
            {
                redirect('../user/register.php', 'passwords do not match');
                // $_SESSION['message'] = "passwords do not match";
                // header('Location: ../register.php');
            }
        }
        
    }
    else if(isset($_POST['login_btn']))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
        $login_query_run = mysqli_query($con, $login_query);

        if (mysqli_num_rows($login_query_run) > 0)
        {
            $_SESSION['auth'] = true;
            $userdata = mysqli_fetch_array($login_query_run);
            $username = $userdata['name'];
            $useremail = $userdata['email'];
            $role_as = $userdata['role_as'];


            $_SESSION['auth_user'] = [
                'name' => $username,
                'email' => $useremail
            ];
            $_SESSION['role_as'] = $role_as;

            if($role_as == 1)
            {
                redirect('../admin/index.php', 'Welcome to dashboard');
                // $_SESSION['message'] = "Welcome to dashboard";
                // header('Location: ../admin/index.php');
            }
            else
            {
                redirect('../user/index.php', 'Logged in successfully');
                // $_SESSION['message'] = "Logged in successfully";
                // header('Location: ../index.php');
            }

            
        }
        else
        {
            redirect('../user/login.php', 'Invalid Credentials');
            // $_SESSION['message'] = "Invalid Credentials";
            // header('Location: ../login.php');
        }
    }
?>