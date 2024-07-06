<?php 
 include '../includes/header.php';
 include '../functions/authcode.php';

 if(isset($_SESSION['auth']))
 {
    redirect('index.php', 'You are already logged in');
    // $_SESSION['message'] = "You are already logged in";
    // header('Location: index.php');
    // exit();
 }
 ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php 
                if(isset($_SESSION['message']))
                { 
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>HEY!</strong> <?= $_SESSION['message']; ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                        unset($_SESSION['message']);   
                } 
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4> Register Form </h4>
                    </div>
                    <div class="card-body">
                        <form action="../functions/authcode.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Your name">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="number" name="phone" class="form-control" id="phone"
                                    placeholder="Enter Your Phone Number">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Your Email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Enter Your password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                                <input type="password" name="Cpassword" class="form-control" id="exampleInputPassword2"
                                    placeholder="Confirm Your password">
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I'm not a robot </label>
                            </div>
                            <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '../includes/footer.php'?>