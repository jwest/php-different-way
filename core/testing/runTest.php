<?php return function (
    $functionName,
    $test,
    $_core_testing_assert_booleanTest,
    $_core_runner_injector_requireFunction
)
{
    $test = create_function('$t,$f','return '.$test);
    $test(
        $_core_testing_assert_booleanTest,
        $_core_runner_injector_requireFunction($functionName)
    );
};