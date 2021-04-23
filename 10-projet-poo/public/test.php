<?php
// On peut inclure toutes les bibliothés de composer
require __DIR__.'/../vendor/autoload.php';

// On va tester le VarDumper de Symfony
class Test {
    public $name;
}

$objet = new Test();
$objet->name = 'Hello';

$test = [
    'Un chaine',
    12,
    ['a' => "b"],
    $objet
];

dump($test, $object, 12);
