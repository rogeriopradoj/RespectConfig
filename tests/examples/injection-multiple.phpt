--TEST--
Tests dependecy injection to a container that uses this dependency internally.
--DESCRIPTION--
Sometimes we can have another instances into a configuration file that consumes instances from same file. When that happens (as described in bug #14 [github]) the used dependecy is instantiated in parse time, making the injection impossible.
--FILE--
<?php
require __DIR__.'/../bootstrap.php';

class DatabaseWow {
    public $c;
    public function __construct($con) {
        $this->c = $con;
    }
}

$ini = <<<INI
[pdo StdClass]

[db DatabaseWow]
con = [pdo];
INI;
$container = new Respect\Config\Container($ini);
$container->pdo = new Pdo('sqlite::memory:');
var_dump($container->pdo instanceof Pdo);
var_dump($container->db->c instanceof Pdo);
?>
--EXPECT--
bool(true)
bool(true)