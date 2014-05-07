# English Wordbook using Yii Framework

[![Build Status](https://travis-ci.org/jamband/yii-englishwordbook-demo.svg?branch=master)](https://travis-ci.org/jamband/yii-englishwordbook-demo)

これは Yii Framework を使った英単語帳アプリのデモです。  

## 必要条件
Yii 1.x 系自体は PHP 5.1.0 ですが、このデモでは PHP 5.3.3 以上が必要になります。
  
## 使用環境
Yii Framework: 1.1.14  
データベース: MySQL または SQLite3  

## 動作確認の手順

Zip ファイルを DL するか、ローカルに git clone してお使いください。  
Yii のコアファイルは [Composer](http://getcomposer.org/) でインストールします。  
ダウンロード済でない方は [こちら](http://getcomposer.org/download/) を参考にしてみてください。  
コマンドラインでプロジェクトルートまで移動して以下を実行します。

```shell
composer install
```

Composer では Yii と PHPUnit などがインストールされます。  

### assets, proctected/runtime ディレクトリを作成

以下を実行してディレクトリを作成し、書き込み権限を与えてください。  

```shell
cd /path/to/project_root
mkdir -p assets protected/runtime && chmod a+x assets protected/runtime
```
  
### データベースの設定

**yii_englishwordbook_demo** という名前のデータベースを作成し、  
/protected/config/ の 3 つそれぞれのファイルの db, testdb 設定箇所を修正してください。  
(テスト用のデータベース名は **yii_englishwordbook_demo_test** がデフォルトです)

#### SQLite3を使用する場合

コメントアウトされている部分を解除して mysql 部分をコメントアウトします。  
ユニットテストなどを実行する場合は /protected/config/test.php も上記と同じようにします。  

#### MySQLを使用する場合

コマンドラインで /protected/ まで移動し `php yiic migrate` でテーブルを作成します。  
(テストを実行する場合は `php yiic migrate --connectionID=testdb` も実行)  
動作確認用のサンプルデータが /protected/data/ にありますので、  
マイグレーション実行後、インポートしてお使いください。  

## その他

ユニットテストを実行する場合は、コマンドラインで  
/protected/tests/ まで移動し `../vendor/bin/phpunit unit`  
  
機能テストは PHP 5.4.0 以上の場合、PHPビルドインサーバを使用する形になっていますので  
`php -S localhost:8000 -t /path/to/project_root` でサーバを起動しておいて  
/protected/tests/ まで移動し `../vendor/bin/phpunit functional`  
  
な感じになります。  
Firefox を使ってテストを走らせるので、予めダウンロードが必要になります。  
  
機能テストは Selenium Server を使っています。  
インストール済でない方はインストールしておいてください。  
[http://docs.seleniumhq.org/download/](http://docs.seleniumhq.org/download/)  

## License
&copy; 2013-2014 Tomoki Morita.  
Distributed under the [MIT License](http://www.opensource.org/licenses/MIT)
