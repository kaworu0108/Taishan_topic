<?php
include("sql.php");
// 阻擋直接進來admin.php
session_start();
if (!$_SESSION['acc']) echo '<script>document.location.href="index.html"</script>';
//讀取現在特展1內容
$sqlnow = "SELECT * FROM `showlist` WHERE `showyear`='now'";
$rows = $db->query($sqlnow)->fetchAll();
// 刪除
// if ($_POST) {
//   $sqldel = "DELETE FROM `s1080217` WHERE id=" . $_POST['id'];
//   $db->query($sqldel);
// }

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
    <a class="navbar-brand" href="admin.php"">海生館後台管理</a>
    <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="admin_show.php">特展管理 <span class="sr-only">(current)</span></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="admin_user.php">使用者管理</a>
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
          <a href="#" class="list-group-item list-group-item-action">
            現在特展
          </a>
          <a href="admin_showH.php" class="list-group-item list-group-item-action">歷史特展</a>
        </div>
      </div>
      <!-- menu end -->
      <!-- content -->
      <div class="col-11 vh-100 float-right mx-auto" id="content">
        <div class="row mt-5 flex-column mx-2">
          <div class="col mx-auto p-0 d-flex justify-content-between align-items-center">
            <span class="h4 m-0" style="vertical-align:middle">現在特展</span>
            <div class="btn btn-primary" onclick="javascript:location.href='admin_showAdd.php'">新增特展</div>
          </div>
          <form method="POST"></form>
          <table class="table table-bordered mt-3 mx-auto">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">特展名稱</th>
                <th scope="col">展出日期</th>
                <th scope="col">展出地點</th>
                <th scope="col">相關連結</th>
                <th scope="col">圖片名稱</th>
                <th scope="col">功能</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($rows as $row) {
                ?>
                <tr>
                  <th scope="row"><?= $row['id'] ?></th>
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['date_front'] ?>~<?= $row['date_back'] ?></td>
                  <td><?= $row['place'] ?></td>
                  <td><?= $row['link'] ?></td>
                  <td><?= $row['img'] ?></td>
                  <td>
                    <input class="btn btn-primary " type="submit" value="編輯" name="edit" id="mdy" onclick="edit(<?= $row['id'] ?>)">
                    <input class="btn btn-secondary" type="submit" value="刪除" name="del" id="del" onclick="del(this)">
                  </td>
                </tr>
              <?php
              } ?>
            </tbody>
          </table>
          </form>
        </div>
      </div>
    </div>
  </div>
  <p></p>
  <script>
    // 請求後端資料
    // $.post("api.php?do=select", function(re) {
    //   // 後端給我的結果用Re接住
    //   console.log(re);
    //   $('p').html(re); //在甚麼地方塞入來自api.php使用ajax方式呼叫的資料
    //   $('#mdy').click(chginput);

    // });


    // del
    function del(who) {
      let id = $(who).parent().siblings().eq(0).text();
      // console.log(id);
      $.post("api.php?do=del", {
        id
      }, function(re) {
        if (re == "delete finished")
          $(who).parents('tr').remove();
        // 要確認位置用consloe.log(位置)
      });
    }

    function edit(who) {
      var number = who;
      document.location.href = 'admin_showedit.php?id=' + number;
      
    }
  </script>
</body>

</html>