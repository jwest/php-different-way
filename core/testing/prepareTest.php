<?php return function ($functionName, $testCase, $_core_testing_runTest, $_core_println)
{
    $_core_println($functionName);
    return array_map(function($test) use ($functionName, $_core_testing_runTest) {
        return $_core_testing_runTest($functionName, $test);
    }, $testCase);
};

//@Test
$t($f('test', array('test1', 'test2'), function($functionName) { return $functionName; }, function($text) {}), array('test', 'test'));

$t($f('test', array(), function($functionName) { return 'test'; }, function($text) {}), array());

$t($f('test', array(), function($functionName) { return 'test'; }, function($text) { assert('test' === $text); }), array());