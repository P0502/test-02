# アプリケーション名
### mogitate

## アプリケーションの詳細
### こちらのアプリケーションはもぎたてフルーツの詳細(商品名、写真、値段、季節、商品説明)を登録したり、商品カードをクリックして商品の詳細を見たり編集したりする事ができ、
### 商品情報を削除したい場合は画面右下のごみ箱ボタンをクリックする事で商品情報を削除する事ができます。
### また、探したい商品があるときは、検索欄に商品名を入力したり、検索機能の下にある価格で並び替え機能(価格が高い順か価格が低い順)で商品を探すことができます。


## 環境構築
### Dockerビルド
#### ・git clone git@github.com:P0502/test-02.git
#### ・docker-compose up -d --build

### Laravelのパッケージのインストール
#### ・docker-compose exec php bash
#### ・composer install

### env.ファイルの作成
#### ・cp .env.example.env

### アプリケーション実行
#### ・php artisan migrate

### シーディング実行
#### ・php artisan db:seed

### SeasonTableのみシーディング実行
#### ・php artisan db:seed --class=SeaonsTableSeeder

### ProductsTableのみシーディング実行
#### ・php artisan db:seed --class=ProductsTableSeeder

### キー生成
#### ・php artisan key:generate

### 使用技術(実行環境)
#### ・PHP:8.4.14
#### ・Laravel:8.83.29
#### ・nginx:1.21.1
#### ・mysql:8.0.26
#### ・phpmyadmin:8080:80

## ER図
<img width="604" height="583" alt="スクリーンショット 2026-02-15 222005" src="https://github.com/user-attachments/assets/e844f96c-8fd1-4703-897a-1672d827d8dc" />

<img width="564" height="517" alt="スクリーンショット 2026-01-04 025335" src="https://github.com/user-attachments/assets/eb559ff2-623f-43a1-9a7a-348a0a6b4746" />

## URL
#### ・mogitate: http://localhost/products
#### ・phpmyadmin: http://localhost:8080/
