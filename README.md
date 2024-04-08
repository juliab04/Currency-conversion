Здравствуйте,  я Юлия 

Данный проект реализован с использованием PHP 8.0, PostgreSql и Nginx.

Описание: Это сервис конвертации валют, который позволит вам рассчитать соотношение актуальных курсов денежных средств на сегодня.

Функционал сервиса:

    Регистрация пользователя;

    Вход в личный кабинет;

    Выход из профиля.

При регистрации пользователя выполняется проверка наличия уже существующего E-mail в базе данных, а также проверка соответствия введенных данных при авторизации.

Добавлена валидация полей при регистрации/авторизации.

Функционал проекта:

    Реализована собственная маршрутизация;

    Использован шаблон проектирования MVC (Model-View-Controller);

    Создан автозагрузчик классов.

Для запуска приложения:

    Склонируйте проект.
    Создайте базу данных PostgreSQL с параметрами:

    Название базы данных: dbname

    Имя пользователя: dbuser

    Пароль: dbpwd

    Создайте следующие таблицы:

Таблица "users":
create table users (
    id serial primary key,
    name varchar not null,
    email varchar not null,
    password varchar not null
);

Таблица "from_currency":
create table from_currency(
                       id_from serial primary key,
                       from_currency varchar not null
);


Таблица "to_currency":
create table to_currency(
                        id_to serial primary key,
                        to_currency varchar not null
);

    Перейдите по ссылке http://localhost/main, чтобы начать использовать сервис.
