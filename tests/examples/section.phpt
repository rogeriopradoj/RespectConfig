--TEST--
Tests sections in a INI
--DESCRIPTION--
Another simple INI but with a section to make things more clear
--FILE--
<?php
require __DIR__.'/../bootstrap.php';
$ini = <<<INI
timezone = America/Sao_Paulo
[database]
dsn      = sqlite::memory:
username = chuck
password = norris
driver   = mysql
INI;
$container = new Respect\Config\Container($ini);
var_dump($container->timezone);
var_dump($container->database);
?>
--EXPECTF--
string(17) "America/Sao_Paulo"
array(4) {
  ["dsn"]=>
  string(15) "sqlite::memory:"
  ["username"]=>
  string(5) "chuck"
  ["password"]=>
  string(6) "norris"
  ["driver"]=>
  string(5) "mysql"
}
