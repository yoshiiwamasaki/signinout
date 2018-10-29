<?php
session_start();

if (isset($_SESSION["NAME"])) {
    $errorMessage = "ログアウトしました。";
} else {
    $errorMessage = "セッションがタイムアウトしました。";
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();

if (isset($_POST["SignIn"])) {
    header("Location: SignIn.php");  // ログイン画面へ遷移
    exit();  // 処理終了
    }

?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sign in</title>
  <!-- Font -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- CSS -->
  <link href="css/style.css" rel="stylesheet">
</head>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Out</title>
    </head>
    <body>
  <!-- Start your project here-->
  <div style="height: 100vh">
      <div class="flex-center flex-column">
          <form class="border border-light p-5" id="SignInForm" name="SignInForm" action="" method="POST">
              <p class="h4 mb-4 text-center">Sign Out</p>
              <div class="text-center">
                  <p><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></p>              
              </div>
              <button class="btn btn-info btn-block my-4" type="submit" id="SignIn" name="SignIn">Sign In</button>
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