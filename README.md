1) Скачиваем проект с репозитория
2) поднимаем контейнера в докере
3) выполняем команду docker-compose run composer install
4) прописываем конфиги в .env для конекта с базой
5) выполняем миграцию docker-compose run artisan migrate
6) выполняем запись мок-данных для ролей из сида docker-compose run artisan db:seed --class=RoleSeeder
7) создаем юзеров используя запросы из коллекций постмана
