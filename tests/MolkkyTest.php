<?php

use App\Molkky;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class MolkkyTest extends TestCase
{
    #[DataProvider('provideData')]
    public function testGetScore($score, $expectedScore)
    {
        $molkky = new Molkky;
        
        $this->assertSame($expectedScore, $molkky->getScore($score));
        // $this->assertSame('You win !', $molkky->getScore([[20],[5],[20],[5]]));
        // $this->assertEquals(49, $molkky->getScore([[19],[5],[20],[5]]));
        // $this->assertEquals(10, $molkky->getScore([[0],[0],[10],[0]]));
        // $this->assertEquals(5, $molkky->getScore([[0],[0],[5],[0]]));
        // $this->assertEquals(35, $molkky->getScore([[20],[5],[5],[0]]));
    }

    public static function provideData()
    {
        return [
            'First Dataset' => [
                'score' => [[20], [0], [0], [0]],
            'expectedScore' => 'You lose !'
            ],
            'Second Dataset' => [
                'score' => [[20], [20], [10]],
            'expectedScore' => 'You win !'
            ],
            'Third Dataset' => [
                'score' => [[10], [1,3,5], [4,3], [8,7]],
            'expectedScore' => 17
            ]
        ];
    }
}
