<!-- Optional JavaScript; choose one of the two! -->

<script src="../assets/js/jquery-3.7.1.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="../assets/js/bootstrap.bundle.min.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
-->
<!-- custom.js -->
<script src="../assets/js/custom.js"></script>

<!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<script>
    <?php
    if (isset($_SESSION['message'])) {
    ?>
        // Display a success notification using SweetAlert2
        Swal.fire({
            // icon: 'success',
            // title: 'Success!',
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