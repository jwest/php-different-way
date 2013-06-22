<?php return function($actual, $result, $_core_println){
    if ($result instanceof Closure) {
        return $_core_println($result($actual) ?
            "  OK" :
            "  ERROR"
        );
    }
    return $_core_println((var_export($actual, true) === var_export($result, true)) ?
        "  OK" :
        "  ERROR: actual: ".var_export($actual, true).", result: ".var_export($result, true)
    );
};

//@Test
$t($f('test', 'test', function($text){ return $text; }), "  OK");

$t($f('testInvalid', 'invalidTest', function($text){ return $text; }), "  ERROR: actual: 'testInvalid', result: 'invalidTest'");

$t($f('test', function($a) { assert($a == 'test'); return true; }, function($text){ return $text; }), "  OK");

$t($f('test', function($a) { return false; }, function($text){ return $text; }), "  ERROR");