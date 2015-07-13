<?php require('vendor/autoload.php');

use LargeInteger\LargeInteger;

$uint1 = new LargeInteger("123235435987321498729587140827985234");
$uint2 = new LargeInteger("123235435987321498729587140827985234");
$uint3 = $uint1->add($uint2);

//echo bcadd(123235435987321498729587140827985234, 123235435987321498729587140827985234);
//echo '<br />';
//echo $uint3->get_value();
//echo '<br />';
//echo bcadd("123235435987321498729587140827985234", "123235435987321498729587140827985234");

$int1 = new LargeInteger(28);
$int2 = new LargeInteger(457);

var_dump($int1->_compare($int2));
echo '<br/>';
var_dump(bccomp(28, 457));
