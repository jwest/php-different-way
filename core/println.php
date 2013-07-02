<?php return function ($text, $__print) {
    $__print($text."\n");
};

//@Test
$t($f('test', function($text) { assert("test\n" === $text); }), null);