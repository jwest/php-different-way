<?php return function ($path)
{
    return array_filter(glob($path.'*'), 'is_file');
};

//@Test
$t($f('core/fs/'), function($result) { return in_array('core/fs/globFiles.php', $result); });

$t($f('core/fs/glob'), function($result) { return in_array('core/fs/globFiles.php', $result); });

$t($f('core/fs/globFiles.php'), function($result) { return in_array('core/fs/globFiles.php', $result); });

$t($f('core/'), function($result) { return !in_array('core/fs/globFiles.php', $result); });

$t($f('core/'), function($result) { return !in_array('core/fs', $result); });