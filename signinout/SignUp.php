<?php
// セッション開始
session_start();

$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "admin";  // ユーザー名
$db['pass'] = "hogehoge";  // ユーザー名のパスワード
$db['dbname'] = "usermanagement";  // データベース名

// エラーメッセージ、登録完了メッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {
    // 未入力チェック
    if (empty($_POST["email"])) {  // 値が空のとき
        $errorMessage = 'Eメールが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    } else if (empty($_POST["password2"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    if (!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] === $_POST["password2"]) {
        // 入力したEメールとパスワードを変数に格納
        $email = $_POST["email"];
        $password = $_POST["password"];

        // DBへのアクセス用の値を変数に格納
        $dbs = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        // 3. エラー処理
        try {
            $pdo = new PDO($dbs, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            $stmt = $pdo->prepare("INSERT INTO useraccount(email, password) VALUES (?, ?)");

            $stmt->execute(array($email, password_hash($password, PASSWORD_DEFAULT)));  // パスワードのハッシュ化を行う
            $userid = $pdo->lastinsertid();  // 登録した(DB側でauto_incrementした)IDを$useridに入れる

            header("Location: Welcome.php");  // メイン画面へ遷移
            exit();  // 処理終了
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
        }
    } else if($_POST["password"] != $_POST["password2"]) {
        $errorMessage = 'パスワードに誤りがあります。';
    }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sign Up</title>
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
          <form class="border border-light p-5"  id="SignInForm" name="SignInForm" action="" method="POST">
              <p class="h4 mb-4 text-center">Sign Up</p>
              <div class="md-form">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="email" id="inputValidationEx" class="form-control validate" id="email" name="email" value="<?php if (!empty($_POST["email"])) {echo htmlspecialchars($_POST["email"], ENT_QUOTES);} ?>" required="required">
                    <label for="inputValidationEx" data-error="wrong" data-success="right">Type your email</label>
              </div>
              <div class="md-form">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="inputValidationEx2" class="form-control validate" id="password" name="password" value="" required="required">
                    <label for="inputValidationEx2" data-error="wrong" data-success="right">Type your password</label>
              </div>
              <div class="md-form">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="materialFormCardConfirmEx" class="form-control validate" id="password2" name="password2" value="" required="required">
                    <label for="materialFormCardConfirmEx" class="font-weight-light">Confirm your password</label>
              </div>
              <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
              <button class="btn btn-info btn-block my-4" type="submit" id="signUp" name="signUp" >Register</button>
              <div class="text-center">
                  <p>Already member?
                      <a href="SignIn.php">Sign In</a>
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