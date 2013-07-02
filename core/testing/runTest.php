<?php return function (
    $functionName,
    $test,
    $__assert_booleanTest,
    $_core_runner_injector_requireFunction
)
{
    $test = create_function('$t,$f','return '.$test);
    $test(
        $__assert_booleanTest,
        $_core_runner_injector_requireFunction($functionName)
    );
};