# アプリケーション名
### mogitate

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


## URL
#### ・mogitate:
#### ・お問い合わせフォーム: http://localhost/
#### ・phpmyadmin: http://localhost:8080/
