<?php return function ($functionName, $_core_runner_injector_functionNameToPath)
{
    return is_file($_core_runner_injector_functionNameToPath($functionName))
        ? require $_core_runner_injector_functionNameToPath($functionName)
        : null;
};

//@Test
$t($f('test', function(){ return 'core/runner/injector/requireFunction.php'; }), function($result) { return $result instanceof Closure; });

$t($f('test', function(){ return 'notExistFunction.php'; }), null);

$t($f('test', function($functionName){ assert('test' === $functionName); }), null);