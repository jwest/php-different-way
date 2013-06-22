<?php return function ($functionName, $params)
{
    return array_filter($params, function($param) use ($functionName) {
        if ($param['optional']) {
            die ('SYNTAX: function: "'.$functionName.'", param must not be optional');
        }
        return strpos($param['name'], '_') === 0;
    });
};