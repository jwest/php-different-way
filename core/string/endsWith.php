<?php return function ($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
};

//@Test

$t($f('file.php', '.php'), true);

$t($f('file.php', 'p'), true);

$t($f('file.php', 'file'), false);

$t($f('file.php', 'fi'), false);

$t($f('file.php', 'le'), false);