<?php
if (isset($_POST["Signin"])) {
header("Location: Signin.php");  // ログイン画面へ遷移
exit();  // 処理終了
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Welcome</title>
  <!-- Font -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- CSS -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <!-- Start your project here-->
  <div style="height: 100vh">
      <div class="flex-center flex-column">
          <form class="border border-light p-5" id="SigninForm" name="SigninForm" action="" method="POST">
              <p class="h4 mb-4 text-center">Welcome!</p>
              <div class="text-center">
                  <p>You’ve successfully registered</p>              
              </div>
              <button class="btn btn-info btn-block my-4" type="submit" id="Signin" name="Signin">Sign In</button>
          </form>
      </div>
    </div>
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap JavaScript -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- Material Design Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>