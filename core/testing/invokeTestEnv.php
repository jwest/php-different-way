<?php return function($path, $_core_fs_globFilesRecursive, $_core_string_endsWith, $_core_testing_prepareTestCase) {
    return array_map(function($file) use ($_core_string_endsWith, $_core_testing_prepareTestCase) {
        if ($_core_string_endsWith($file, '.php'))
            $_core_testing_prepareTestCase($file);
    }, $_core_fs_globFilesRecursive($path));
};