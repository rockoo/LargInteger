<?php namespace LargeInteger\Interfaces;

use LargeInteger\LargeInteger;

interface LargeIntegerInterface {
    public function get_value();

    public function equal_to(LargeInteger $obj);

    public function not_equal_to(LargeInteger $obj);

    public function greater_than(LargeInteger $obj);

    public function less_than(LargeInteger $obj);

    public function greater_or_equal_than(LargeInteger $obj);

    public function less_or_equal_than(LargeInteger $obj);

    public function add(LargeInteger $obj);
}