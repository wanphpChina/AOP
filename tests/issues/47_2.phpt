--TEST--
getPropertyValue with protected properties
--SKIPIF--
skip "Bad test, to be corrected"
--FILE--
<?php
class Foo {
   protected $bar = "orig";
}

aop_add_before('Foo->bar', function(AopJoinPoint $jp) {
    echo $jp->getPropertyValue();
});

$foo = new Foo();
$test = $foo->bar;
$foo->bar = "test";
$foo->bar = "test2";

?>
--EXPECT--
origorigtest

