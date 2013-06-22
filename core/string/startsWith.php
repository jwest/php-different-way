<?php return function ($haystack, $needle)
{
    return (bool) !strncmp($haystack, $needle, strlen($needle));
};

//@Test

$t($f('file.php', 'file'), true);

$t($f('file.php', 'fi'), true);

$t($f('file.php', '.php'), false);

$t($f('file.php', 'p'), false);

$t($f('file.php', 'le'), false);