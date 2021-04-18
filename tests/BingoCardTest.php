<?php

namespace Tests;

use App\Classes\BingoCard;
use PHPUnit\Framework\TestCase;

class BingoCardTest extends TestCase{

    /** @test */
    public function it_assert_true_if_the_card_was_fully_created()
    {
        $card = new BingoCard();

        foreach ($card->numbers as $key => $numbers) {
            $this->assertCount(5, $numbers);
        }

    }

}

?>