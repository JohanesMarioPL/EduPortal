### Installation

1. Clone repository `cd https://github.com/JohanesMarioPL/EduPortal.git` terlebih dahulu

2. Setelah sudah diclone lalu update/install terlebih dahulu composer `composer install` / `composer update`

3. selanjutkan copy paste .env.example menjadi .env `cp .env.example .env`

4. lalu generate key `php artisan key:generate`

5. set .env ganti nama database menjadi `eduportal`

6. setelah itu install terlebih dahulu npm nya `npm install`

7. selanjutnya install sequelize `npm install sequelize`

8. lalu migrate database `npx sequelize-cli db:migrate`

9. lalu seed database `npx sequelize-cli db:seed:all`

10. jalankan program `php artisan serve` 


### Demo
Account Administrator : username : `admin` password `12345678`

Account Fakultas : username : `fakultaspsikologi` password `12345678`

Account Program Studi : username : `psikologi` password `12345678`

Account User : username : `dummyuser3` password `12345678`
