<?php return function($functionName, $function)
{
    return array_map(function($param) use ($functionName) {

        $name = $param->getName();

        if (strpos($name, '__') === 0) {
            $parts = explode('_', $functionName);
            array_pop($parts);
            $name = count($parts) > 0
                ? '_'.implode('_', $parts).substr($name, 1)
                : substr($name, 1);
        }

        return array(
            'name' => $name,
            'optional' => $param->isOptional(),
        );

    }, (new ReflectionFunction($function))->getParameters());
};

//@Test
$t($f('t', function(){}), array());

$t($f('t', function($param){}), array(array('name' => 'param', 'optional' => false)));

$t($f('t', function($_paramOther){}), array(array('name' => '_paramOther', 'optional' => false)));

$t($f('t', function($_param = null){}), array(array('name' => '_param', 'optional' => true)));

$t($f('t', function($param, $_param = null){}), array(array('name' => 'param', 'optional' => false), array('name' => '_param', 'optional' => true)));

$t($f('t_t', function($__param){}), array(array('name' => '_t_param', 'optional' => false)));

$t($f('t_t_t', function($__param){}), array(array('name' => '_t_t_param', 'optional' => false)));

$t($f('t', function($__param){}), array(array('name' => '_param', 'optional' => false)));
