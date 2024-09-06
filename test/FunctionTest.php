<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require 'functions.php';

class FunctionTest extends TestCase
{

    public function testFirst() {
        $this->assertTrue(true);
    }

    #[DataProvider('getValuesForSum')]
    public function testSum(array $values, $expectedResult) {
        //Act
        $result = sum(...$values);

        //Assert
        $this->assertSame($expectedResult, $result);
    }

    public function testAbsSum() {
        //Arrange
        $firstValue = 2;
        $secondValue = -5;
        //Act
        $result = absoluteSum($firstValue, $secondValue);

        //Assert
        $this->assertSame(3, $result);
    }

    public function testSubstract() {
        //Arrange
        $firstValue = 10;
        $secondValue = 6;
        //Act
        $result = substract($firstValue, $secondValue);

        //Assert
        $this->assertSame(4, $result);
    }

    public function testCountdown() 
    {
        $value = 5;
        $expectedResult = [5, 4, 3, 2, 1, 0];

        $result = countdown($value);

        $this->assertEqualsCanonicalizing($expectedResult, $result);
    }

    public function testDivide() {
        //Arrange
        $firstValue = 10;
        $secondValue = 5;
        //Act
        $result = divide($firstValue, $secondValue);

        //Assert
        $this->assertSame(2.0, $result);
    }

    public function testZeroDividor()
    {
        //Arrange
        $firstValue = 10;
        $secondValue = 0;

        $this->expectException(InvalidArgumentException::class);
        //Act
        $result = divide($firstValue, $secondValue);
    }


    #[DataProvider('getSentences')]
    public function testHowManyLetters($value, $expectedResult)
    {
        $result = howManyLetters($value);

        $this->assertEquals($expectedResult, $result);
    }


    public static function getSentences() : array 
    {
        return [
            ['Thomas', 6],
            ['Thomas est formateur', 18],
            ['Thomas est formateur          ', 18],
            ['       Thomas est formateur', 18],
        ];
    }

    public static function getValuesForSum() : array
    {
        return [
            [[2, 3], 5],
            [[2, 8, 4], 14],
            [[2, 8, 4, 6], 20],
        ];
    }
}