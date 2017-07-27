<div id="modal_logout" class="modal fade" role="dialog">
  <div class="modal-dialog">



    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: black">Konfirmasi LogOut</h4>
      </div>

      <div class="modal-body">
   
   <h3 style="color: black">Apakah Anda Yakin Ingin Keluar ?</h3>
 

     </div>

      <div class="modal-footer">
        <a href="logout.php"> <button class="btn btn-warning" ><i class="fa  fa-check "></i> Ya </button></a>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa  fa-close "></i> Batal</button>
      </div>
    </div>

  </div>
</div>



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
        <li><a class="nav-link" data-toggle="modal" data-target="#modal_logout" id="loguot"><span class="hidden-sm-down">LogOut</span></a></li>
      </li>
      <?php endif ?>
      <?php if (!isset($_SESSION['username'])): ?>
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php endif ?>

    </ul>
  </div>
</nav>