<?php namespace LargeInteger;

use LargeInteger\Interfaces\LargeIntegerInterface;
use LargeInteger\Exceptions\LargeIntegerException as Exception;

class LargeInteger implements LargeIntegerInterface {
    protected $largeInt;
    protected $that;

    public function __construct($int) {
        $this->largeInt = sprintf('%s', $int);
        $this->that     = $this;

        if($this->largeInt < 0) throw new Exception(sprintf('%s %d', "Unsupported signed value found", $this->largeInt));
    }

    public function get_value()
    {
        return $this->largeInt;
    }

    public function equal_to(LargeInteger $obj)
    {
        return ($this->_compare($obj) === 0) ? true : false;
    }

    public function not_equal_to(LargeInteger $obj)
    {
        return ($this->_compare($obj) !== 0) ? true : false;
    }

    public function greater_than(LargeInteger $obj)
    {
        return ($this->_compare($obj) > 0) ? true : false;
    }

    public function less_than(LargeInteger $obj)
    {
        return ($this->_compare($obj) < 0) ? true : false;
    }

    public function greater_or_equal_than(LargeInteger $obj)
    {
        return ($this->_compare($obj) > 0 || $this->_compare($obj) === 0) ? true : false;
    }

    public function less_or_equal_than(LargeInteger $obj)
    {
        return ($this->_compare($obj) < 0 || $this->_compare($obj) === 0) ? true : false;
    }

    public function add(LargeInteger $obj)
    {
        $pattern = '/^\+?(\d+)(\.\d+)?$/';
        if (!preg_match($pattern, $this->that->get_value(), $matchFirst) || !preg_match($pattern, $obj->get_value(), $matchSecond)) return 0;

        $result    = array();
        $intOne    = strrev(ltrim($matchFirst[1], '0'));
        $intTwo    = strrev(ltrim($matchSecond[1], '0'));
        $scaleInt  = max(strlen($intOne), strlen($intTwo));
        $intOne    = str_pad($intOne, $scaleInt, '0');
        $intTwo    = str_pad($intTwo, $scaleInt, '0');

        for ($i = 0; $i < $scaleInt; $i++) {
            $calc = (int) $intOne[$i] + (int) $intTwo[$i];

            if (isset($result[$i])) $calc += $result[$i];

            $result[$i] = $calc % 10;

            if ($calc > 9) $result[$i + 1] = 1;
        }

        return new $this->that(strrev(implode($result)));
    }

    private function _compare(LargeInteger $obj) {
        $pattern = '/^\+?(\d+)(\.\d+)?$/';
        if (!preg_match($pattern, $this->that->get_value(), $matchFirst) || !preg_match($pattern, $obj->get_value(), $matchSecond)) return 0;

        $result    = 0;
        $intOne    = ltrim($matchFirst[1], '0');
        $intTwo    = ltrim($matchSecond[1], '0');

        if (strlen($intOne) > strlen($intTwo)) {
            $result = 1;
        } else if(strlen($intOne) < strlen($intTwo)) {
            $result = -1;
        }

        return $result;
    }

    private function _normalize($int) {

        preg_match('#\d+(?:\.\d{1,4)?#', sprintf('%f', $int), $match);

        return (isset($match[0])) ? $match[0] : 0;
    }
}