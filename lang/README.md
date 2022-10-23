# [Локализация](https://laravel.com/docs/9.x/localization#main-content)

Файлы локализации прописываются в текущей директории. Для этого, создаётся соответствующая папка, с названием локализации, а внутрь копируются все файлы из других локализаций, при этом, изменяется лишь непосредственно сам текст.

Внутри [файла](https://github.com/DavidaaWoW/LaravelCarServiceApplication/blob/main/lang/ru/profile.php) локализации, объявляем начало php кода, после чего сразу же возвращаем массив, где ключом является уникальный, в пределах данного файла идентификатор, а значением как раз перевод. ```'driversLicence' => 'Ваши водительские права:'```

Локализация по умолчанию указывается в конфигурационном файле [app.php](https://github.com/DavidaaWoW/LaravelCarServiceApplication/blob/main/config/app.php) ```'locale' => 'ru',```, там же, указывается и локализация, которая будет применятся, при отстутствии какого-либо перевода ```'fallback_locale' => 'en',```

## Настройка локализации

Свой язык, пользователь может настроить на странице профиля, соответствующей кнопкой.

При переходе, вызывается роутинг ```/profile/lan```: ```Route::get('/profile/lan/{lan}', [ProfileController::class, 'setLan'])->middleware('auth')->name('setLan');```. Из него происходит вызов метода ```setLan``` в [ProfileController-е](https://github.com/DavidaaWoW/LaravelCarServiceApplication/blob/main/app/Http/Controllers/ProfileController.php).

Внутри него происходит взаимодействие с БД ```Redis```, откуда сначала вытаскивается актуальная информация в виде ```JSON``` файла, затем в нём заменяется параметр ```lan```, после чего, новый JSON опять помещается в хранилище. Также, в конце, вызывается статический метод у App, для установки текущей локали ```App::setLocale($lan);```. **Локализация в laravel доступна "из коробки"**

## Работа с [Middleware](https://laravel.com/docs/9.x/middleware#main-content)

Однако, проблема такой настройки заключается в том, что локализация будет применена лишь к текущей странице, а при любом переходе она будет сброшена.

Для решения этой проблемы воспользуемся системой Middleware. Регистрируем новый middleware в файле [Kernel.php](https://github.com/DavidaaWoW/LaravelCarServiceApplication/blob/main/app/Http/Kernel.php): 
```
...
protected $middlewareGroups = [
	'web' => [
	...
	\App\Http\Middleware\Localization::class
	],
	...
];
...
```
Внутри Middleware мы по сути повторяем предыдущие действия - достаём данные из ```Redis``` и применяем локаль.

## Использование локализации в шаблонах

Возьмём для примера [шаблон navbar-а](https://github.com/DavidaaWoW/LaravelCarServiceApplication/blob/main/resources/views/layouts/navbar.blade.php). В названиях ссылок разделов можно заметить директиву ```@lang```, внутри которой мы передаём строку типа ```файл.элементмассива```: ```@lang('app.navbarAbout')```