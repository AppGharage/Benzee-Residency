##Installation

Installation
NB: Make sure you have composer installed or you may downlaod composer at => https://getcomposer.org/download/

1.git clone
2.Open the console and cd into your project root directory
3.Rename .env.example file to .env inside your project root and update the database information. (windows wont let you do it, so you have to open your console cd your project root directory and Run mv .env.example .env )
4.Run composer install or php composer.phar install
5.Run php artisan key:generate
6.Run php artisan migrate
7.Run php artisan db:seed to run seeders(Optional)
8.Run php artisan serve
#####You can now access your project at localhost:8000 :slightly_smiling_face:

If for some reason your project stop working run :

composer install
php artisan migrate

