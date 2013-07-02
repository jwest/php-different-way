<?php

function core_runner_injector($functionName) {

    $_prepareParams = require 'injector/prepareParams.php';
    $_filterParams = require 'injector/filterParams.php';
    $_prepareInjectors = require 'injector/prepareInjectors.php';
    $_functionNameToPath = require 'injector/functionNameToPath.php';
    $_injectorRequire = require 'injector/requireFunction.php';

    $_function = $_injectorRequire($functionName, $_functionNameToPath);

    return function() use ($_function, $_prepareInjectors, $_prepareParams, $_filterParams, $functionName) {

        $params = $_prepareParams($_function);
        $injectors = $_prepareInjectors($functionName, $params, $_filterParams);
        $userArgsNum = count($params) - count($injectors);

        if (func_num_args() !== $userArgsNum) {
            die ('SYNTAX: function: "'.$functionName.'", bad function params count');
        }

        $return = call_user_func_array($_function, array_merge(func_get_args(), $injectors));

        if (is_object($return) && !($return instanceof Closure)) {
            die ('SYNTAX: function: "'.$functionName.'", don\'t return object');
        }

        return $return;
    };

}
