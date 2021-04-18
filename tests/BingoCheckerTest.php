<?php

namespace Tests;

use App\Classes\BingoCard;
use App\Classes\BingoCaller;
use App\Classes\BingoChecker;
use PHPUnit\Framework\TestCase;

class BingoCheckerTest extends TestCase
{

    /** @test */
    public function it_assert_true_if_the_card_is_completed()
    {
        $caller = new BingoCaller();
        $card = new BingoCard();

        while (count($caller->numbersCalled) < 75) {
            $caller->call();
            $result = (new BingoChecker($card, $caller))->check();

            if($result === true){
                break;
            }
        }

        $this->assertTrue($result);
    }

    /** @test */
    public function it_assert_false_if_the_card_is_not_completed_yet()
    {
        $caller = new BingoCaller();
        $card = new BingoCard();

        while (count($caller->numbersCalled) < 20) {
            $caller->call();
            $result = (new BingoChecker($card, $caller))->check();
        }

        $this->assertFalse($result);
    }
}
