<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '12345' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1_:bIAlIVbTIL$b)KS wo-@)6NW(QCQ&ENv#x<uvk:t~#13N `(Mdohe1m6-c]i.' );
define( 'SECURE_AUTH_KEY',  '/TKNVcB=_OxqCN5vQq+WO5-etP@0Vq-ci^^}*0dS:4ej`21S/!>PY8Fz4rv0I2C}' );
define( 'LOGGED_IN_KEY',    'Oed9M#M~IG,pimE_J>(aCYhpwERcRx}_aaP:)$tfb}Y3]YP3v^{qO%IRiu#E31?-' );
define( 'NONCE_KEY',        '#E,G:I?OrW}]ib_t3Q*_/c1ll84Z;sPNH:JGz$%&SsBlD=B18pmZRqgSq.+yKZbQ' );
define( 'AUTH_SALT',        '/g&]/YI*r~K5j~nOBFYO55pI0y[mYt(mXye;?/u9;.)]JN9F4/}NoV kM.l`4e~:' );
define( 'SECURE_AUTH_SALT', 'k$H|?v|z/*!eKWgJ}B]>,XBF):fA.X&^#+8KDMoD6ys04=;gTX*(Rwk+pP*R*1$S' );
define( 'LOGGED_IN_SALT',   'C,Z}ZcXo*2J%TH,EvYE1 y; 5mJUac}*yp`/]R 7`3W3y P11B0.@kWr2#d2?$/!' );
define( 'NONCE_SALT',       'WvPFC(|@yH%v*-by81B8A_kOTq/)181>*~cnv=uQG[t 5WUfs?z:uW4H{nMmzp9|' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
