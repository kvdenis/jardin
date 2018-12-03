#!/usr/bin/env php
<?php
/**
 * Yii Application Initialization Tool
 *
 * In order to run in non-interactive mode:
 *
 * init --env=Development --overwrite=n
 */

if (!extension_loaded('openssl')) {
    die('The OpenSSL PHP extension is required by Yii2.');
}

$params = getParams();
$root = str_replace('\\', '/', __DIR__);
$envs = require "$root/environments/index.php";
$envNames = array_keys($envs);

echo "Устанвока Jardin\n\n";


echo "База данных\n";

echo "Host:";
$dbHost = trim(fgets(STDIN));

echo "DBName:";
$dbName = trim(fgets(STDIN));

echo "Username:";
$dbUserName = trim(fgets(STDIN));

echo "Password:";
$dbPassword = trim(fgets(STDIN));


echo "Устанока переменных\n";

echo "Ссылка до папки frontend/web:";
$urlUpload = trim(fgets(STDIN));

echo "\n завершено.\n\n";

$tplParams = "
<?php
return [
    'urlUpload' => '{$urlUpload}',
];
";

file_put_contents("$root/common/config/params-local.php", $tplParams);

$tplDb = "

<?php
return [
    'components' => [

        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host={$dbHost};dbname={$dbName}',
            'username' => '{$dbUserName}',
            'password' => '{$dbPassword}',
            'charset' => 'utf8',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
";

file_put_contents("$root/common/config/main-local.php", $tplDb);


function getParams()
{
    $rawParams = [];
    if (isset($_SERVER['argv'])) {
        $rawParams = $_SERVER['argv'];
        array_shift($rawParams);
    }

    $params = [];
    foreach ($rawParams as $param) {
        if (preg_match('/^--(\w+)(=(.*))?$/', $param, $matches)) {
            $name = $matches[1];
            $params[$name] = isset($matches[3]) ? $matches[3] : true;
        } else {
            $params[] = $param;
        }
    }
    return $params;
}

/**
 * Prints error message.
 * @param string $message message
 */
function printError($message)
{
    echo "\n  " . formatMessage("Error. $message", ['fg-red']) . " \n";
}

/**
 * Returns true if the stream supports colorization. ANSI colors are disabled if not supported by the stream.
 *
 * - windows without ansicon
 * - not tty consoles
 *
 * @return boolean true if the stream supports ANSI colors, otherwise false.
 */
function ansiColorsSupported()
{
    return DIRECTORY_SEPARATOR === '\\'
        ? getenv('ANSICON') !== false || getenv('ConEmuANSI') === 'ON'
        : function_exists('posix_isatty') && @posix_isatty(STDOUT);
}

/**
 * Get ANSI code of style.
 * @param string $name style name
 * @return integer ANSI code of style.
 */
function getStyleCode($name)
{
    $styles = [
        'bold' => 1,
        'fg-black' => 30,
        'fg-red' => 31,
        'fg-green' => 32,
        'fg-yellow' => 33,
        'fg-blue' => 34,
        'fg-magenta' => 35,
        'fg-cyan' => 36,
        'fg-white' => 37,
        'bg-black' => 40,
        'bg-red' => 41,
        'bg-green' => 42,
        'bg-yellow' => 43,
        'bg-blue' => 44,
        'bg-magenta' => 45,
        'bg-cyan' => 46,
        'bg-white' => 47,
    ];
    return $styles[$name];
}

/**
 * Formats message using styles if STDOUT supports it.
 * @param string $message message
 * @param string[] $styles styles
 * @return string formatted message.
 */
function formatMessage($message, $styles)
{
    if (empty($styles) || !ansiColorsSupported()) {
        return $message;
    }

    return sprintf("\x1b[%sm", implode(';', array_map('getStyleCode', $styles))) . $message . "\x1b[0m";
}
