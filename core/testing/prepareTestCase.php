<?php return function (
    $fileName,
    $_core_testing_prepareTest,
    $_core_runner_injector_pathToFunctionName,
    $_core_fs_getContent
)
{
    $contentParts = explode('//'.'@Test', $_core_fs_getContent($fileName));
    if (!isset($contentParts[1]))
        return;
    $testCaseRaw = $contentParts[1];
    $_core_testing_prepareTest($_core_runner_injector_pathToFunctionName($fileName), array_filter(explode("\n\n", $testCaseRaw), function($test) {
        return !empty($test);
    }));
};