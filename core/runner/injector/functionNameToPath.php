<?php return function($functionName)
{
    return str_replace('_', '/', $functionName) .'.php';
};

//@Test

$t($f('core_testing_test'), 'core/testing/test.php');

$t($f('core_testing_testOther'), 'core/testing/testOther.php');
