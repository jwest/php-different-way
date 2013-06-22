<?php
ini_set('xdebug.max_nesting_level', 100);
require 'core/runner/injector.php';
$f = core_runner_injector('core_testing_invokeTestEnv');
$f($argv[1]);