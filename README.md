
## О проекте

Данный проект является шаблоном клиент-серверного приложения на тему "автосервис".

## Описание

Веб-приложение отражает в себе автосервис с возможностью просматривать бренды автомобилей и их модели. В приложении присутствует аутентификация, с автоматическим запоминанием данных для входа. У аутентифицированных пользователей присутствует личная страничка профиля, где они могут настроить тему и язык веб-ресурса. Также пользователи имеют возможность загруить свои водительские права в формате PDF, если они загружены в систему, то пользователь имеет возможность их скачать. Также, через страницу профиля возможно произвести выход из учётной записи. В веб-приложении также присутствует версия для администратора, доступ к которой защищён внутренними средствами веб-сервера apache [htaccess + htpasswd](https://httpd.apache.org/docs/2.4/howto/auth.html). На страничке администратора, есть возможность выполнять основные [CRUD](https://www.freecodecamp.org/news/crud-operations-explained/) операции, над моделями брендов и автомобилей. Также, у администратора есть доступ к статистике, в которой представлены различные графики. На странице статистике есть возможность случайной генерации **N-ого** количества автомобилей для тестирования.

В проекте были использованы основные возможности экосистемы Laravel. В частности:

- [Шаблонизатор Blade](https://laravel.com/docs/9.x/blade)
- [Eloquent ORM](https://laravel.com/docs/9.x/eloquent)
- [Artisan console](https://laravel.com/docs/9.x/artisan#main-content)

Изначально, весь функционал был написан на "чистом" php, [в процедурном стиле](https://github.com/DavidaaWoW/mirea_5sem_RSCHIR/tree/master/5ПР)
После чего, была произведена успешная миграция на фреймворк Laravel, с сохранением всего функционала, **и возможностью его расширения**

## Документация

Все основные манипуляции были тщательно задокументированы, их описания можно найти непосредственно в каждом разделе.

### Содержание

+ [Docker](https://github.com/DavidaaWoW/LaravelCarServiceApplication/tree/main/docker)
+ [Работа с БД](https://github.com/DavidaaWoW/LaravelCarServiceApplication/tree/main/database)
+ [Модели](https://github.com/DavidaaWoW/LaravelCarServiceApplication/tree/main/app/Models)
+ [Контроллеры](https://github.com/DavidaaWoW/LaravelCarServiceApplication/tree/main/app/Http/Controllers)
+ [Пути(Routing)](https://github.com/DavidaaWoW/LaravelCarServiceApplication/tree/main/routes)
+ [View. Шаблоны Blade](https://github.com/DavidaaWoW/LaravelCarServiceApplication/tree/main/resources/views)
+ [Локализация](https://github.com/DavidaaWoW/LaravelCarServiceApplication/tree/main/lang)
+ [Глобальные темы пользователей](https://github.com/DavidaaWoW/LaravelCarServiceApplication/tree/main/public/themes)
+ [Администрирование интернет-ресурса](https://github.com/DavidaaWoW/LaravelCarServiceApplication/tree/main/resources/views/admin)

## Авторские права

Данный проект является открытым и свободно распространяемым. Создателем всего кода является Гегия Давит, или же [@DavidaaWoW](https://github.com/DavidaaWoW)
