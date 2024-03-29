<?php require_once('./vendor/autoload.php');

use LargeInteger\LargeInteger;

class LargeIntTest extends PHPUnit_Framework_TestCase {

    public function testInitValueShouldAcceptUnsignedValuesOnly()
    {
        $this->setExpectedException('LargeInteger\Exceptions\LargeIntegerException');

        new LargeInteger(-123);
    }

    public function testGetValueShouldReturnInt()
    {
        $li = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");

        $this->assertInternalType("int", (int) $li->get_value());
    }

    public function testEqualsToTrue()
    {
        $obj1 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj2 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj3 = new LargeInteger("123235435987321498729587140827498523523489723897423897423897429874987239847");
        $obj4 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");

        $this->assertTrue($obj1->equal_to($obj2));
        $this->assertFalse($obj3->equal_to($obj4));
    }

    public function testNotEqualTo()
    {
        $obj1 = new LargeInteger("112523543598732149872958714082798523523489723897423897423897429874987239847");
        $obj2 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj3 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj4 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");

        $uint1 = new LargeInteger("123235435987321498729587140827985234");
        $uint2 = new LargeInteger(3);
        $uint3 = $uint1->add($uint2);

        $this->assertTrue($obj1->not_equal_to($obj2));
        $this->assertFalse($obj3->not_equal_to($obj4));
        $this->assertNotEquals("123235435987321498729587140827985235", $uint3->get_value());
    }

    public function testGreaterThan()
    {
        $obj1 = new LargeInteger("243234243598732149872958714082798523523489723897423897423897429874987239847");
        $obj2 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj3 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj4 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");

        $this->assertTrue($obj1->greater_than($obj2));
        $this->assertFalse($obj3->greater_than($obj4));
    }

    public function testLessThan()
    {
        $obj1 = new LargeInteger("1232354359873214987295871408279852352348972389742389742389742987498723984");
        $obj2 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj3 = new LargeInteger("123223543598732149872958714082798523523489723897423897423897429874987239847");
        $obj4 = new LargeInteger("23223543598732149872958714082798523523489723897423897423897429874987239847");

        $this->assertTrue($obj1->less_than($obj2));
        $this->assertFalse($obj3->less_than($obj4));
    }

    public function testGreaterOrEqualThan()
    {
        $obj1 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj2 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj3 = new LargeInteger("22323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj4 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj5 = new LargeInteger("2323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj6 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");

        $this->assertTrue($obj1->greater_or_equal_than($obj2));
        $this->assertTrue($obj3->greater_or_equal_than($obj4));
        $this->assertFalse($obj5->greater_or_equal_than($obj6));
    }

    public function testLessOrEqualThan()
    {
        $obj1 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj2 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj3 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj4 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj5 = new LargeInteger("12323543598732149872958714082798523523489723897423897423897429874987239847");
        $obj6 = new LargeInteger("2323543598732149872958714082798523523489723897423897423897429874987239847");

        $this->assertTrue($obj1->less_or_equal_than($obj2));
        $this->assertTrue($obj3->less_or_equal_than($obj4));
        $this->assertFalse($obj5->less_or_equal_than($obj6));
    }
}