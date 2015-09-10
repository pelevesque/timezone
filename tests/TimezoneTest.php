<?php

class TimezoneTest extends PHPUnit_Framework_TestCase
{
    // Only tests if getList() returns the correct array structure.
    public function testGetList()
    {
        $timezone = new Pel\Helper\Timezone;
        $list = $timezone::getList();
        $this->assertTrue(is_array($list));
        foreach ($timezone::getList() as $key => $value) {
            $this->assertTrue(is_string($value));
        }
    }

    // Only tests if getMenu() returns a string.
    public function testGetMenu()
    {
        $timezone = new Pel\Helper\Timezone;
        $list = $timezone::getMenu();
        $this->assertTrue(is_string($list));
    }
}
