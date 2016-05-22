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
define('DB_NAME', 'fob');

/** Имя пользователя MySQL */
define('DB_USER', 'fob');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'fob');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         't>8U4d~|yM61(DV+IXJz~Ib|&wbV0KirpC `l87&;Ljp|rXm(>uQrbPR8:F84=,(');
define('SECURE_AUTH_KEY',  '<`+ay4_9<Leu;s{wD+gJQzDqYQ8w,U^9E0.%]v~&cN]`jhrvy6w[?h3E_t1RM)m/');
define('LOGGED_IN_KEY',    ';kIPEvio%$o;Qb32>p4g<{4`Sraed58bcm_pS)=WWZ~thB07<l$8,[.?4IT0K.-N');
define('NONCE_KEY',        '~kb@D}p^U!J?f*ZOAk3PRL47|%I[1@#{]HrHk!Pv+:|iuZ`bLdHwb cBfM/8.O{O');
define('AUTH_SALT',        '=Z~X:1clVm,_|S=P#9h}jLL1w94C@l74 ZQt>gsV7/quv#jt|q39F@-MO-{.|vWA');
define('SECURE_AUTH_SALT', '=`g`j#H_+@oB0V)DJwr~et`7i>&_fxM4U:ZBX0cSKs=6%y R@&xHyV_tvA0 Ae:$');
define('LOGGED_IN_SALT',   ']<IuEe^Q)w>;pA}gP|:W*{(*|>:m#qO_>!al+(bjJ.{Ql+5HbIkYlPz(pvh`;&B%');
define('NONCE_SALT',       'mTYl3o0U|*gBB5x;Z|wzC[jeHVy^Q=w3_eb!G&^z)5?oPo%!. `5pMk$sS3,cBWa');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
