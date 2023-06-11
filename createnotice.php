
<head><link rel="stylesheet" href="try.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    form {
        margin: 0 auto;
        width: 800px;
    }
</style>
</head>


<header>
  <img src="KUKL.jpg" width="500" height="120" class="center">
</header>
<?php
   session_start();
  if (!isset($_SESSION['adminid'])) {
    $_SESSION['message'] = "You must be logged in to access this page";
    header("Location: adminloginpage.php");
    exit();
  }

  ?>
  <?php
include("adminnav.php")
?>
<form method="post" action="insert_notice.php" class="needs-validation" novalidate  >
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" name="title" required>
    <div class="invalid-feedback">Please enter a title.</div>
  </div>
  <div class="form-group">
    <label for="content">Content:</label>
    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
    <div class="invalid-feedback">Please enter the notice content.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
</body>
</html>
