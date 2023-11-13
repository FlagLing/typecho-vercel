<?php
// site root path
define('__TYPECHO_ROOT_DIR__', dirname(__FILE__));

// plugin directory (relative path)
define('__TYPECHO_PLUGIN_DIR__', '/usr/plugins');

// theme directory (relative path)
define('__TYPECHO_THEME_DIR__', '/usr/themes');

// admin directory (relative path)
define('__TYPECHO_ADMIN_DIR__', '/admin/');

// register autoload
require_once __TYPECHO_ROOT_DIR__ . '/var/Typecho/Common.php';

// init
\Typecho\Common::init();

// config db
$db = new \Typecho\Db('Pdo_Mysql', 'typecho_');
$db->addServer(array (
  'host' => $_ENV["HOST"],
  'port' => $_ENV["PORT"],
  'user' => $_ENV["USER"],
  'password' => $_ENV["PASSWORD"],
  'charset' => 'utf8mb4',
  'database' => $_ENV['DATABASE'],
  'engine' => 'InnoDB',
  'sslCa' => 'ssl/cacert.pem',
  'sslVerify' => 'true',
), \Typecho\Db::READ | \Typecho\Db::WRITE);
\Typecho\Db::set($db);

/** 初始化主题 */
@require_once __TYPECHO_ROOT_DIR__ . __TYPECHO_THEME_DIR__ . "/echo/var/init.php";
