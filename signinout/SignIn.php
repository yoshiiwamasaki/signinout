<?php

// セッション開始
session_start();

$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "admin";  // ユーザー名
$db['pass'] = "hogehoge";  // ユーザー名のパスワード
$db['dbname'] = "usermanagement";  // データベース名

// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["SignIn"])) {
    // 未入力チェック
    if (empty($_POST["email"])) { 
        $errorMessage = 'Eメールが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    // 未入力でない場合
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        // 入力したEメールを変数に格納
        $email = $_POST["email"];

        // DBへのアクセス用の値を変数に格納
        $dbs = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        // 検索判定処理
        try {
            $pdo = new PDO($dbs, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            // EメールをDBから取得
            $stmt = $pdo->prepare('SELECT * FROM useraccount WHERE email = ?');
            $stmt->execute(array($email));

            // 入力したパスワードを変数に格納
            $password = $_POST["password"];

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($password, $row['password'])) {
                    session_regenerate_id(true); //セッションIDの置換
                    $_SESSION["SESSION"] = $row['email']; // Eメールをセッション変数に格納
                    header("Location: Main.php");  // メイン画面へ遷移
                    exit();  // 処理終了
                } else {
                    // 認証失敗の場合
                    $errorMessage = 'Eメールあるいはパスワードに誤りがあります。';
                }
            } else {
                // 該当データなしの場合
                $errorMessage = 'Eメールあるいはパスワードに誤りがあります。';
            }
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
        }
    }
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
    <body>
  <!-- Start your project here-->
  <div style="height: 100vh">
      <div class="flex-center flex-column">
          <form class="border border-light p-5" id="SignInForm" name="SignInForm" action="" method="POST">
              <p class="h4 mb-4 text-center">Sign in</p>
              <div class="md-form">
              <i class="fa fa-envelope prefix"></i>
              <input type="email" id="inputValidationEx" name="email" class="form-control validate" value="<?php if (!empty($_POST["email"])) {echo htmlspecialchars($_POST["email"], ENT_QUOTES);} ?>" required="required">
              <label for="inputValidationEx" data-error="wrong" data-success="right">Type your email</label>
              </div>
              <div class="md-form">
              <i class="fa fa-lock prefix"></i>
              <input type="password" id="inputValidationEx2" name="password" value="" class="form-control validate" required="required">
              <label for="inputValidationEx2" data-error="wrong" data-success="right">Type your password</label>
              </div>
              <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
              <button class="btn btn-info btn-block my-4" type="submit" id="SignIn" name="SignIn">Sign in</button>
              <div class="text-center">
                  <p>Not a member?
                      <a href="SignUp.php">Sign Up</a>
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