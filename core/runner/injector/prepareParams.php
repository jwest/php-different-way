<?php return function($function)
{
    return array_map(function($param) {
        return array(
            'name' => $param->getName(),
            'optional' => $param->isOptional(),
        );
    }, (new ReflectionFunction($function))->getParameters());
};

//@Test
$t($f(function(){}), array());

$t($f(function($param){}), array(array('name' => 'param', 'optional' => false)));

$t($f(function($_paramOther){}), array(array('name' => '_paramOther', 'optional' => false)));

$t($f(function($_param = null){}), array(array('name' => '_param', 'optional' => true)));

$t($f(function($param, $_param = null){}), array(array('name' => 'param', 'optional' => false), array('name' => '_param', 'optional' => true)));