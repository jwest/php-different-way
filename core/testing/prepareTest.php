<?php return function ($functionName, $testCase, $__runTest, $_core_println)
{
    $_core_println($functionName);
    return array_map(function($test) use ($functionName, $__runTest) {
        return $__runTest($functionName, $test);
    }, $testCase);
};

//@Test
$t($f('test', array('test1', 'test2'), function($functionName) { return $functionName; }, function($text) {}), array('test', 'test'));

$t($f('test', array(), function($functionName) { return 'test'; }, function($text) {}), array());

$t($f('test', array(), function($functionName) { return 'test'; }, function($text) { assert('test' === $text); }), array());