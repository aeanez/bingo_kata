<?php

namespace Tests;

use App\Classes\BingoCaller;
use PHPUnit\Framework\TestCase;

class BingoCallerTest extends TestCase {

    /** @test */
    public function it_assert_true_if_a_number_is_returned()
    {
        $caller = new BingoCaller();

        $this->assertIsNumeric($caller->call());
    }
    
}

?>