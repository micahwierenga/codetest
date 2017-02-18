<?php

require_once("./EquilibriumIndex.php");

class EquilibriumIndex extends PHPUnit_Framework_TestCase
{
	public function testCase()
	{
		$arr = array(-7, 1, 5, 2, -4, 3, 0);
		$this->assertEquals(array(3,6), getEquilibriums($arr));
	}
	public function testCase1()
	{
		$arr1 = array(-1, 3, -4, 5, 1, -6, 2, 1);
		$this->assertEquals(array(1,3,7), getEquilibriums($arr1));
	}
}
