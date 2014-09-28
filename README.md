# English Wordbook with Yii [![Build Status](https://travis-ci.org/jamband/yii-englishwordbook-demo.svg?branch=master)](https://travis-ci.org/jamband/yii-englishwordbook-demo)
これは Yii Framework を使った英単語帳アプリのデモです。  
![png](http://jamband.github.io/images/english-wordbook.png)

## 必要条件
- PHP: 5.3.2 以上
- Yii Framework: 1.1.13 以上
- MySQL 5.x もしくは SQLite3
  
## 動作確認の手順
Zip ファイルを DL するか、ローカルに git clone してお使いください。  
Yii のコアファイルは [Composer](http://getcomposer.org/) でインストールします。  
ダウンロード済でない方は [こちら](http://getcomposer.org/download/) を参考にしてみてください。  
コマンドラインでプロジェクトルートまで移動して以下を実行します。

```shell
php composer.phar install
```

もしグローバルにインストールしている場合は以下。

```shell
composer install
```

### assets, proctected/runtime ディレクトリを作成
以下を実行してディレクトリを作成し、書き込み権限を与えてください。  

```shell
cd /path/to/project_root
mkdir -p assets protected/runtime && chmod a+x assets protected/runtime
```
  
### データベースの設定
yii_englishwordbook_demo という名前のデータベースを作成し、  
/protected/config/ の 3 つそれぞれのファイルの db, testdb 設定箇所を修正してください。  
(テスト用のデータベース名は yii_englishwordbook_demo_test がデフォルトです)

#### SQLite3を使用する場合
コメントアウトされている部分を解除して mysql 部分をコメントアウトします。  
ユニットテストなどを実行する場合は /protected/config/test.php も上記と同じようにします。  

#### MySQLを使用する場合

```shell
cd protected
php yiic migrate
```

テストを実行したい場合は以下

```shell
php yiic migrate --connectionID=testdb
```

動作確認用のサンプルデータが /protected/data/ にありますので、  
マイグレーション実行後、インポートしてお使いください。  

## その他
ユニットテストを実行

```shell
cd protected/tests
../vendor/bin/phpunit unit
```

機能テストを実行  

```shell
php -S localhost:8000 -t /path/to/project_root
cd protected/tests
../vendor/bin/phpunit functional
```

PHP 5.4.0 以上の場合、PHP ビルトインウェブサーバーを使用する形になっています。  
Firefox を使ってテストを走らせるので、予めダウンロードが必要になります。  
  
機能テストは [Selenium Server (Selenium RC)](http://docs.seleniumhq.org/download/) を使っています。  
インストール済でない方はインストールしておいてください。  
