# English Wordbook using Yii Framework

これは Yii Framework を使った英単語帳アプリのデモです。  

## 必要条件
Yii 1.x 系自体は PHP 5.1.0 ですが、このデモでは PHP 5.3.0 以上が必要になります。
  
## 使用環境
Yii Framework: 1.1.14  
データベース: MySQL または SQLite3  

## 動作確認の手順

Zip ファイルを DL するか、ローカルに git clone してお使いください。  
Yii のコアファイルは [Composer](http://getcomposer.org/) でインストールします。  
ダウンロード済でない方は [こちら](http://getcomposer.org/download/) を参考にしてみてください。  
コマンドラインでプロジェクトルートまで移動して以下を実行します。

```
composer install
```

Composer では Yii と PHPUnit などがインストールされます。  
  
### データベースの設定

**yii_englishwordbook_demo** という名前のデータベースを作成し、  
/protected/config/ の 3 つそれぞれのファイルの db 設定箇所を修正してください。  
(テスト用のデータベース名は **yii_englishwordbook_demo_test** がデフォルトです)

#### SQLite3を使用する場合

コメントアウトされている部分を解除して mysql 部分をコメントアウトします。  
ユニットテストなどを実行する場合は /protected/config/test.php も上記と同じようにします。  

#### MySQLを使用する場合

コマンドラインで /protected/ まで移動し `php yiic migrate` でテーブルを作成します。  
動作確認用のサンプルデータが /protected/data/ にありますので、  
マイグレーション実行後、インポートしてお使いください。  

また、ユニットテストなどで使用するデータベースは、  
**yii_englishwordbook_demo** を構造のみコピーして、  
**yii_englishwordbook_demo_test** という名前で作成します。  
(migration テーブルは不必要なので削除しておいてください)

## その他

ユニットテストを実行する場合は、コマンドラインで  
/protected/tests/ まで移動し `../vendor/bin/phpunit unit`  
  
機能テストも同様に  
/protected/tests/ まで移動し `../vendor/bin/phpunit functional`  
  
な感じになります。  
  
機能テストは Selenium Server を使っています。  
インストール済でない方はインストールしておいてください。  
[http://docs.seleniumhq.org/download/](http://docs.seleniumhq.org/download/)  

### 注意

ランタイム関連のエラーが出る場合は、  
/assets/, /protected/runtime/ のパーミッションを書き込み可能に変更してください。

## Copyright and license
Copyright &copy; 2013 Tomoki Morita.  
Distributed under the [MIT License](http://www.opensource.org/licenses/MIT)
