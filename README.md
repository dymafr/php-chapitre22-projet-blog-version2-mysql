# setup mysql for server

## install mysql-server

`apt install mysql-server`

## configure mysql user

`mysql`
`ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';`
`exit`

## install php fpm, common and pdo

`apt install php8.2-fpm php8.2-common php8.2-mysql php8.2-cli`

## configure php.ini (/etc/php/8.2/fpm/php.ini)

`extension=pdo_mysql`

## add seed data

in ./data

`php seed-articles.php`;
