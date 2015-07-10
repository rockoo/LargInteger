<?php require('vendor/autoload.php');

use LargeInteger\LargeInteger;

$obj1 = new LargeInteger("212323543598732149872958714082798523523489723897423897423897429874987239847");
$obj2 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");

//$equals = $obj1->equal_to($obj2);

//$comp = $obj1->_compare($obj2);

$d = $obj1->greater_or_equal_than($obj2);

var_dump($d);