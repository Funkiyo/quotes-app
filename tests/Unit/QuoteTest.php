<?php

namespace Tests\Unit;

use App\Services\Quotes\Entities\Quote;
use PHPUnit\Framework\TestCase;

class QuoteTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $id = '1234';
        $text = 'Quote text';
        $author = 'Quote Author';
        $genre = 'Quote Genre';
        $v = '1';

        $quote = new Quote( $id, $text, $author, $genre, $v );
        $param = $quote->toParam();

        $clonedQuote = Quote::fromParam( $param );

        $this->assertEquals( $quote->getId(), $clonedQuote->getId() );
        $this->assertEquals( $quote->getText(), $clonedQuote->getText() );
        $this->assertEquals( $quote->getAuthor(), $clonedQuote->getAuthor() );
        $this->assertEquals( $quote->getGenre(), $clonedQuote->getGenre() );
    }
}
