--TEST--
The simples usage of an INI and a Container
--DESCRIPTION--
A container that loads an INI without sections, just key and value.
--FILE--
<?php
require __DIR__.'/../bootstrap.php';
$ini = <<<INI
one   = 1
two   = 2
three = 3
INI;
$container = new Respect\Config\Container($ini);
var_dump($container->one);
var_dump($container->two);
var_dump($container->three);
?>
--EXPECTF--
string(1) "1"
string(1) "2"
string(1) "3"