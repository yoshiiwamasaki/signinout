<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["SESSION"])) {
    header("Location: SignOut.php");
    exit;
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Main</title>
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
  <div style="height: 100vh">
      <div class="flex-center flex-column">
          <form class="border border-light p-5" id="SignInForm" name="SignInForm" action="" method="POST">
          <p>Welcome Home <u><?php echo htmlspecialchars($_SESSION["SESSION"], ENT_QUOTES); ?></u> !</p>  <!-- Eメールをechoで表示 -->
                  <p>
                      <a href="SignOut.php">Sign Out</a>
                  </p>
              </div>
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