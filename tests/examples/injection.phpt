--TEST--
Tests dependecy injection to a container
--DESCRIPTION--
As every "object" is lazy loaded and therefore only created when needed, we can change them before they got used. This is very good for unit tests.
--FILE--
<?php
require __DIR__.'/../bootstrap.php';

$ini = <<<INI
[connection stdClass]
INI;
$container = new Respect\Config\Container($ini);
$container->connection = new Pdo('sqlite::memory:');
var_dump($container->connection);
?>
--EXPECTF--
object(PDO)#%d (0) {
}