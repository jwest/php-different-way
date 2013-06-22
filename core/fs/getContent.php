<?php return function ($path)
{
    return !file_exists($path) ?
        null :
        file_get_contents($path);
};

//@Test

$t($f('core/fs/getContent.php'), function($result) { return strstr($result, '@Test'); });

$t($f('notExistsFile'), null);
