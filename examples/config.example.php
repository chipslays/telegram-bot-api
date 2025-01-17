<?php

return [

    /**
     * Параметры бота.
     */
    'bot' => [

        /**
         * Токен бота, который был получен у @BotFather.
         */
        'token' => '1234567890:BOT_TOKEN',

        /**
         * Имя бота, например, такое же как указано у @BotFather.
         */
        'name' => 'MyBot',

        /**
         * Юзернейм бота, без собаки (@).
         */
        'username' => 'MyTelegram_bot',

        /**
         * Обработчик Webhook.
         */
        'handler' => 'https://example.com/bot.php',

        /**
         * Версия бота.
         */
        'version' => '1.0.0',
    ],

    /**
     * Общие настройки.
     */
    'common' => [

        /**
         * Временная зона.
         * 
         * bool false - Чтобы не использовать этот параметр
         * 
         * @see https://www.php.net/manual/en/timezones.php
         */
        'timezone' => 'UTC',

        /**
         * Максимальная нагрузка на сервер.
         */
        'max_system_load' => 1,
    ],

    /**
     * Параметры Telegram.
     */
    'telegram' => [

        /** 
         * Разметка текста по умолчанию.
         * Если нужно отправить сообщение с другой разметкой, используйте параметр:
         * $extra = ['parse_mode' => 'markdown']
         */
        'parse_mode' => 'html',

        /**
         * "Шифрование" параметра `callback_data` у inline-клавиатуры .
         * NOTE: не храните важные данные в этом параметре, т. к. его можно посмотреть на стороне юзера.
         * safe_callback сделан для усложнения распознования, но не гарантирует 100% зашиты. 
         * 
         * Поддерживает: 
         * bool false - ничего не использовать (unsafe)
         * string "encode" - пережатая строка в base64 (unsafe)
         * string "hash" - хеширование строки в md5 в базе данных, при получении - сверка (safe)
         */
        'safe_callback' => 'encode',
    ],

    /**
     * Параметры администратора.
     */
    'admin' => [

        /**
         * Список администраторов, где ключ - юзернейм или ID юзера, а значение - пароль.
         */
        'list' => [
            'chipslays' => 'password',
            '436432850' => 'password',
        ],
    ],

    /**
     * Модуль User.
     * 
     * Позволяет взаимодействовать с юзером.
     * Хранение данных, управление, бан, флуд и прочее.
     */
    'user' => [

        /**
         * Включение/выключение модуля.
         */
        'enable' => true,

        /**
         * Метод хранения данных.
         * 
         * Поддерживает:
         * string "store" - хранение с помощью модуля Store.
         * string "database" - хранение в отдельной таблице (users) в базе данных.
         */
        'driver' => 'store',

        /**
         * Через сколько секунд должно быть обработано следующее сообщение от юзера.
         */
        'flood_time' => 1,
    ],

    /**
     * Модуль Database.
     * 
     * Позволяет взаимодействовать с базой данных.
     * Используется библиотека от Laravel.
     * 
     * @see https://laravel.com/docs/8.x/database
     */
    'database' => [

        /**
         * Включение/выключение модуля.
         */
        'enable' => true,

        /**
         * Драйвер базы данных.
         * 
         * Поддерживает:
         * string "sqlite"
         * string "mysql"
         */
        'driver' => 'mysql',
        'sqlite' => [
            'database' => '/path/to/database.sqlite',
        ],
        'mysql' => [
            'host'      => 'localhost',
            'database'  => 'telegram_test',
            'username'  => 'mysql',
            'password'  => 'mysql',
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ],
    ],

    /**
     * Модуль Cache.
     * 
     * Повзоляет взаимодействовать с Memcached и Redis.
     * Внимение, у вас должно быть установленно Memcached и/или Redis.
     */
    'cache' => [

        /**
         * Включение/выключение модуля.
         */
        'enable' => false,

         /**
         * Драйвер кеша.
         *
         * Поддерживает:
         * string "memcached"
         * string "redis"
         * 
         * @see https://www.php.net/manual/ru/book.memcached.php
         * @see https://github.com/phpredis/phpredis
         */
        'driver' => 'memcached',

        'memcached' => [
            'host'  => 'localhost',
            'port' => '11211',
        ],

        'redis' => [
            'host'  => '127.0.0.1',
            'port' => '6379',
        ],
    ],

    /**
     * Модуль Store.
     * 
     * Позвоялет сохранять данные для последущего использования. 
     * Все сохраненные данные сериализуются, поэтому пожно сохранить массивы и т. п.
     * Позволяет сохранять как глобно данные, так и данные привязанные к конкретному юзеру.
     */
    'store' => [

        /**
         * Включение/выключение модуля.
         */
        'enable' => true,
        
        /**
         * Драйвер кеша.
         *
         * Поддерживает:
         * string "file" - хранение в файлах (не рекомендуется для высоконагруженных ботов, возможна потеря данных).
         * string "database" - хранение в отдельной таблице `store`.
         * bool false - хранение оперативной памяти (подходит только для Longpoll).
         * 
         * @see https://www.php.net/manual/ru/book.memcached.php
         * @see https://github.com/phpredis/phpredis
         */
        'driver' => 'file',

        /**
         * Параметры драйвера `file`.
         */
        'file' => [

            /**
             * Директория для хранения файлов с данными.
             */
            'dir' => __DIR__ . '/storage/store',
        ],
    ],

    /**
     * Модуль State.
     * 
     * Позволяет задавать стейты для юзеров.
     * С их помощью можно легко организовать цепочку диалога, например, форму сбора данных. 
     * Стейт позволяет хранить название стейта и данные.
     */
    'state' => [

        /**
         * Включение/выключение модуля.
         */
        'enable' => true,
    ],

    /**
     * Модуль Localization.
     */
    'localization' => [

        /**
         * Язык по умолчанию если у пользователя не определен язык, не найден файл локализации.
         */
        'default_language' => 'ru',

        /**
         * Директория с файлами локализации.
         * Файлы локализации должны иметь название языка с раширением .php, который возвращает массив.
         * Например: ru.php
         */
        'dir' => __DIR__ . '/localization',
    ],

    /**
     * Модуль Log.
     */
    'log' => [

        /**
         * Включение/выключение модуля.
         */
        'enable' => true,

        /**
         * Автоматически логировать входящий Update массив.
         * Запись происходит после отработки бота, чтобы не замедлять процесс ответа.
         */
        'auto' => true,

        /**
         * Директория с лог-файлами.
         * Название файла: DD.MM.YYYY_<POSTFIX>.log
         */
        'dir' => __DIR__ . '/storage/logs',
    ],

    /**
     * Компоненты. 
     * 
     * Позволяет внедрять/переиспользовать части кода как компоненты.
     * Соддержит массив с информацией о компонентах.
     */
    'components' => [

        /**
         * Уникальный ключ компонента.
         */
        'vendor.component' => [

            /**
             * Включение/выключение компонента.
             */
            'enable' => true,

            /**
             * Файл инициализации компонента (входная точка).
             */
            'entrypoint' => __DIR__ . '/components/vendor/component/component.php',
        ],

        // ... так же подключаются остальные компоненты.
    ],
];
