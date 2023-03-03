## Docker for PHP
* nginx
* php 8.0.24
* mariadb 10.5.9
* adminer

## How to use with laravel 8
1. Clone this repository
2. Build images using this command
> $ docker compose build
3. Run images using this command
> $ docker compose up -d
4. Go to app container shell using this command
> $ docker exec -it app bash
5. Inside the container install laravel using this command, this will create project folder in root folder
> $ composer create-project --prefer-dist laravel/laravel:^8.0 project
6. Next, move the content of the project folder, to our root directory using this command
> $ mv ./project/* ./

> $ mv ./project.* ./

there will a notification, just select no

7. Remove project folder using this command 
> $ rm -rf project/
8. Exit the container, using this command
> $ exit
9. Shutdown all the container
> $ docker compose down
10. Start up again the container
> $ docker compose up -d

## laravel breeze installation
1. Add this command inside our app container to install laravel breeze
> composer require laravel/breeze:1.9.4
2. Install laravel breeze setup
> php artisan breeze:install
3. Install tailwind dependencies
> npm install -D tailwindcss@latest postcss@latest autoprefixer@latest
4. Exit from container
5. Execute this command
> npm install && npm run dev
6. Back to container shell, execute this command.
> php artisan migrate

## laravel ui installation
> composer require laravel/ui

> php artisan ui bootstrap --auth

> npm install && npm run dev