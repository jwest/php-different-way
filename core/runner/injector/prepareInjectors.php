<?php return function ($functionName, $params, $_core_runner_injector_filterParams)
{
    return array_map(function($param){
        return core_runner_injector(substr($param['name'], 1));
    }, $_core_runner_injector_filterParams($functionName, $params));
};

//@Test

$t($f('test', array(), function($name, $params){ return $params; }), array());

$t($f('test', array(array('name' => '_param')), function($name, $params){ return $params; }), function($params) { return is_callable($params[0]); } );