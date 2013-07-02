<?php return function ($path, $__globFilesRecursive, $_core_fs_globFiles, $_core_fs_globDir)
{
    $files = $_core_fs_globFiles($path);

    foreach ($_core_fs_globDir($path) as $dir)
    {
        $files = array_merge($files, $__globFilesRecursive($dir.'/'));
    }
    return $files;
};

//@Test
$t(
    $f(
        'testDir',
        function(){ return array(); },
        function(){ return array('testDir/test'); },
        function(){ return array(); }
    ),
    function($result) { return in_array('testDir/test', $result); }
);

$t(
    $f(
        'testDir/',
        function($path){ assert('testDir/testDirOther/' === $path); return array(); },
        function(){ return array('testDir/test'); },
        function(){ return array('testDir/testDirOther'); }
    ),
    function($result) { return in_array('testDir/test', $result); }
);

$t(
    $f(
        'testDir/',
        function(){ return array(); },
        function(){ return array('testDir/test'); },
        function($path){ assert('testDir/' === $path); return array('testDir/testDirOther'); }
    ),
    function($result) { return in_array('testDir/test', $result); }
);

$t(
    $f(
        'testDir/',
        function(){ return array(); },
        function($path){ assert('testDir/' === $path); return array('testDir/test'); },
        function(){ return array('testDir/testDirOther'); }
    ),
    function($result) { return in_array('testDir/test', $result); }
);