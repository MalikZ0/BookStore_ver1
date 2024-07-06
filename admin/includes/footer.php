    <footer class="footer py-4  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        To the <i class="fa fa-star"></i> by
                        <a href="#" class="font-weight-bold" target="_blank">Malik Kumara</a>
                        for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-muted" target="_blank">Malik Kumara</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-muted" target="_blank">About Me</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-muted" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link pe-0 text-muted" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    </main>
    <!-- jquery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>

    <!-- bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/smooth-scrollbar.min.js"></script>
    <!-- alertify js -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <!-- custom js -->
    <script src="assets/js/custom.js"></script>
   
    <script>
        <?php
        if (isset($_SESSION['message'])) {
        ?>
            // Display a success notification using SweetAlert2
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?= $_SESSION['message'] ?>', // Echo the session message
                position: 'top', // Customize notification position
                showConfirmButton: false, // Hide the "OK" button
                timer: 3000 // Auto-close after 3 seconds
            });
            // window.alert('include session message here'); 
            <?php
            unset($_SESSION['message']);
        }
        ?>
    </script>
    </body>

    </html>