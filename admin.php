<?php
// 阻擋直接進來admin.php
session_start();
if (!$_SESSION['acc']) echo '<script>document.location.href="index.html"</script>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- google font 中文-->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- ico -->
  <link rel="icon" href="img/LOGOico.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="img/LOGOico.ico" type="image/x-icon" />
  <!-- font Awswesome css-->
  <link rel="stylesheet" href="css/all.css">
  <!-- backcss -->
  <link rel="stylesheet" href="css/back.css">
  <title>後台管理</title>
</head>

<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="admin.php">海生館後台管理</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="admin_show.php">特展管理 <span class="sr-only">(current)</span></a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">使用者管理</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.html"">回首頁</a>
        </li>
        <form action="api.php?do=logout" method="POST">
        <input type="submit" class=" btn btn-light ml-5" value="登出"></form>
      </ul>
    </div>

  </nav>
  <!-- header end -->
  <!-- menu left -->
  <div class="container-fluid vh-100 bg2">
    <div class="row h-100 d-flex align-items-center justify-content-center" name="view_frame">
      <div class="col-6 bgf h-25 d-flex align-items-center rounded">
        <p class="mx-auto"> 歡迎來到海生館後台管理，請至所需功能分頁進行操作，若操作有疑問請來信至tinac0108@gmail.com，謝謝。</p>
      </div>
    </div>
  </div>
  <!-- menu end -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    function outback() {
      document.location.href = "api.php?do=logout";
    }
  </script>
</body>

</html>