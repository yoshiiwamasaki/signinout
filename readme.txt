１．動作確認環境

　XAMPPの最新版（2018年11月1日時点）をインストールする。
　C:\xampp\htdocs配下にsigninoutフォルダを配置する。

　XAMPP（以下を含む）
　　Apache 2.4.35
　　MariaDB 10.1.36 (MySQL)
　　PHP 7.2.11
　　phpMyAdmin 4.8.3


２．DB設定
　phpMyAdminを用いる。(XAMPPからMySQL起動後、左記へアクセスする。 http://localhost/phpmyadmin/server_databases.php)
　データベース「usermanagement」を作成する。
　「usermanagement」配下にテーブル「useraccount」をカラム数:3で作成する。
　テーブル「useraccount」の定義は以下で作成する。
　・id       INT(5)       PRIMARY    AUTO_INCREMENT(A_I)
　・email    VARCHAR(256)
　・password VARCHAR(256)

　上記DBテーブルを作成し終えたら、テーブルにアクセスするためのユーザを作成する。
　ユーザの定義は以下の通り。
　・ユーザ名：admin　パスワード：hogehoge　DBサーバ：localhost


３．起動
　XAMPPからApacheとMySQLを起動する。
　ブラウザで下記へアクセスする。
　http://localhost/signinout/SignIn.php

　ログイン画面が表示できれば成功。