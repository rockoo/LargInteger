<?php require('vendor/autoload.php');

use LargeInteger\LargeInteger;

$int1 = "2323543598732149872958714082798523523489723897423897423897429874987239847";
$int2 = "12323543598732149872958714082798523523489723897423897423897429874987239847";

$uint1 = new LargeInteger($int1);
$uint2 = new LargeInteger($int2);

echo "CUSTOM ".var_dump($uint1->greater_or_equal_than($uint2));

echo '<br />';

echo "BCCOMP ".var_dump(bccomp("$int1", "$int2"));
