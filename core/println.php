<?php return function ($text, $_core_print) {
    $_core_print($text."\n");
};

//@Test
$t($f('test', function($text) { assert("test\n" === $text); }), null);