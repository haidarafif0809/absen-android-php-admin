<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Presensi</a>
    </div>
    <ul class="nav navbar-nav">

    <?php if (isset($_SESSION['username'])): ?>
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="rekap_presensi.php">Rekap Presensi</a></li>
    <?php endif ?>


    </ul>

       <ul class="nav navbar-nav navbar-right">
      <?php if (isset($_SESSION['username'])): ?>
         <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username'] ?></a></li>
      <?php endif ?>
      <?php if (!isset($_SESSION['username'])): ?>
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

      <?php endif ?>
    </ul>
  </div>
</nav>