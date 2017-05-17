<?php 
include 'header.php';
include 'navbar.php';
include 'android/db.php';
 ?>


<div class="container">
<?php if (isset($_SESSION['error'])): ?>
	<p style="color:red"><b><?php echo $_SESSION['error'] ?></b></p>
<?php endif ?>
	<form action="proses_login.php" method="post">
  <div class="form-group">
    <label for="nik">Username / Nik:</label>
    <input type="nik" class="form-control" id="nik" name="nik">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" id="pwd">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

 <?php include 'footer.php'; ?>