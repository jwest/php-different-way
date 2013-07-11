#This is only experiment!!!

This is framework for create better (like functional programming) code in php with dependecy injection in function.

##How it works?

1. Declare only one anonymous function in file for example:

 <?php return function($a, $b) {
     return;
 };

2. Ok, first tests!

 <?php return function($a, $b) {
     return;
 };

 //@Test
 $t($f(1, 1), 2);

 $t($f(0, 1), 1);

 $t($f(4, 2), 6);

Two magic functions in variables:

 - $t - this is test function with two arguments ($actual, $expected)
 - $f - function from file

3. Run test:

 php test.php ./path/to/file.php

3. Add logic to function:

 <?php return function($a, $b) { 
     return $a + $b;
 };

 //@Test
 $t($f(1, 1), 2);

 $t($f(0, 1), 1);

 $t($f(4, 2), 6);

THIS IS SIMPLE! yeah ;)

4. but, if you have get output on screen, and add tests for this output, you must use *injector*, add param in unit tests and use for send to output

 <?php return function($a, $b, $_println) {
     $c = $a + $b;
     $_println($c);
     return $c;
 };

 //@Test
 $t($f(1, 1, function($output){ assert(2 === $output); }), 2);

 $t($f(0, 1, function($output){ assert(1 === $output); }), 1);

 $t($f(4, 2, function($output){ assert(6 === $output); }), 6);

Function println is part of core framework, this is loaded dynamically.

5. You have dependency injection in php function! ;)

6. Organize your functions in catalogues and use other functions only with dependency injections.

7. See on index.php for start app
