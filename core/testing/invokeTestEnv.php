<?php return function($path, $_core_fs_globFilesRecursive, $_core_string_endsWith, $__prepareTestCase) {
    return array_map(function($file) use ($_core_string_endsWith, $__prepareTestCase) {
        if ($_core_string_endsWith($file, '.php'))
            $__prepareTestCase($file);
    }, $_core_fs_globFilesRecursive($path));
};