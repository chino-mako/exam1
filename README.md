お問い合わせフォーム

環境構築
Dockerビルド
1. docker-compose up -d --build

Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. php artisan key:generate
4. php artisan migrate
5. php artisan db:seed

使用技術
・PHP php:7.4.9-fpm
・Laravel:8 
・mysql:8.0.26

ER図
https://drive.google.com/file/d/1tS6HKz4u-PtS6sudq9_NK08PDZVxxzF0/view?usp=sharing

URL
開発環境：http://localhost/
