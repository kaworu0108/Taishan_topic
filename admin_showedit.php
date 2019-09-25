  <?php
  include("sql.php");
  // 阻擋直接進來admin.php
  session_start();
  if (!$_SESSION['acc']) echo '<script>document.location.href="index.html"</script>';
  // select edit list
  $sqledit = "SELECT * FROM `showlist` WHERE id=" . $_GET['id'];
  $result = $db->query($sqledit)->fetchAll();
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
    <!-- JQ -->
    <script src="js/jquery-3.4.1.min.js"></script>
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
        <div class=" btn btn-light ml-5">登出
      </div>
      </ul>
      </div>

    </nav>
    <!-- header end -->
    <!-- menu left -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-1 p-0 vh-100" id="menuleft">
          <div class="list-group">
            <a href="admin_show.php" class="list-group-item list-group-item-action">
              現在特展
            </a>
            <a href="admin_showH.php" class="list-group-item list-group-item-action">歷史特展</a>
          </div>
        </div>
        <!-- menu end -->
        <!-- content -->

        <div class="col-10 vh-100  float-right">
          <div class="w-75 mx-auto">
            <!-- 名稱 -->
            <form method="POST" action="api.php?do=update&id=<?=$_GET['id']?>">
              <div class="form-row">
                <div class="form-group mt-5 col-md-12">
                  <label for="showname">特展名稱</label>
                  <input type="text"" class=" form-control" id="showname" aria-describedby="emailHelp" name="name" value="<?= $result[0][1] ?>">

                </div>
                <!-- 日期 -->
                <div class="form-group col-md-6">
                  <label for="date_front">展出起始日期</label>
                  <input type="date"" class=" form-control" id="date_front" value="<?= $result[0][2] ?>" name="date_front">
                </div>
                <div class="form-group col-md-6">
                  <label for="date_back">展出結束日期</label>
                  <input type="date"" class=" form-control" id="date_back" value="<?= $result[0][3] ?>" name="date_back">
                </div>
                <!-- 地點-->
                <div class="form-group col-md-12">
                  <label for="place">特展地點</label>
                  <input type="text" class="form-control" id="place" value="<?= $result[0][4] ?>" name="place">
                </div>
                <!-- 內容 -->
                <div class="form-group col-md-12">
                  <label for="content">特展內容</label>
                  <textarea class="form-control" id="content_show" name="content" rows="8"><?= $result[0][5] ?></textarea>
                </div>
                <!-- 連結 -->
                <div class="form-group col-md-12">
                  <label for="link">特展連結</label>
                  <input type="text"" class=" form-control" id="showlink" value="<?= $result[0][6] ?>" name="link">

                </div>
              </div>
              <!-- 上傳特展照片 -->

              <div class="form-group">
                <label for="exampleFormControlFile1">上傳特展照片</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
                <img src="<?= $result[0][7] ?>" alt="">
              </div>
              <!-- 特展類型 -->
              <select name="showyear" class="my-4 form-control">
                　<option value="now">現在特展</option>
                　<option value="history">歷史特展</option>
              </select>
              <br>
              <!-- btn -->
              <input type="submit" class="btn btn-primary" value="儲存">
            </form>
          </div>
        </div>
      </div>
    </div>




  </body>

  </html>