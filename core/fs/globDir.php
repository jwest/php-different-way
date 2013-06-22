<?php return function ($path)
{
    return glob($path.'*', GLOB_ONLYDIR|GLOB_NOSORT);
};

//@Test
$t($f('core/'), function($result) { return in_array('core/fs', $result); });

$t($f('core/f'), function($result) { return in_array('core/fs', $result); });

$t($f('core/fs'), function($result) { return in_array('core/fs', $result); });

$t($f('core/fs/'), function($result) { return empty($result); });