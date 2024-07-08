<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark shadow">
  <div class="container">
    <a class="navbar-brand" href="../user/index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- Main Navigation Links -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../user/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">Collections</a>
        </li>
        <?php 
          if (isset($_SESSION['auth'])) {
            ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $_SESSION['auth_user']['name']; ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="cartView.php">My Cart</a></li>
                  <li><a class="dropdown-item" href="#">My Wishlist</a></li>
                  <li><a class="dropdown-item" href="../user/logout.php">Logout</a></li>
                </ul>
              </li>
            <?php
          }
          else
          {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="../user/register.php">Register Form</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../user/login.php">Login Form</a>
            </li>
            <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
