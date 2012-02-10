--TEST--
Some CONSTANT usage in an INI file
--DESCRIPTION--
Tests the CONSTANT expansion in different cases in a INI file
--FILE--
<?php
require __DIR__.'/../bootstrap.php';
define('MY_PWD', 'test');
define('ONE', 1);
define('TWO', 2);
$ini = <<<INI
one       = ONE
list      = [ONE, TWO]
[database]
dsn      = sqlite::memory:
username = chuck
password = MY_PWD
driver   = mysql
INI;
$container = new Respect\Config\Container($ini);
var_dump($container->one);
var_dump($container->list);
var_dump($container->database);
?>
--EXPECTF--
string(1) "1"
array(2) {
  [0]=>
  int(1)
  [1]=>
  int(2)
}
array(4) {
  ["dsn"]=>
  string(15) "sqlite::memory:"
  ["username"]=>
  string(5) "chuck"
  ["password"]=>
  string(4) "test"
  ["driver"]=>
  string(5) "mysql"
}
