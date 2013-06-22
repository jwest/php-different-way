<?php return function($path) {
    return substr(str_replace('/', '_', $path), 0, -4);
};

//@Test

$t($f('core/testing/test.php'), 'core_testing_test');

$t($f('core/testing/testOther.php'), 'core_testing_testOther');
