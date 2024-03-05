<?php

namespace App\Services\Quotes\Responses;

use Illuminate\Http\Client\Response;
use App\Services\Quotes\Entities\Pagination;
use App\Services\Quotes\Entities\Quote;

class QuotesPage
{
    public Pagination $pagination;

    /**
     * @var Quote[]
     */
    public array $quotes = [];

    public int $totalQuotes;

    public function __construct( Response $response )
    {
        $json = (object)$response->json();

        if ( $json->statusCode !== 200 ) {
            $this->handleError( $json );
        }

        $this->pagination = new Pagination( ...$json->pagination );

        $this->totalQuotes = $json->totalQuotes;

        foreach ( $json->data as $rawQuote ) {
            $this->quotes[] = new Quote( ...$rawQuote );
        }
    }

    protected function handleError( object $json ): void
    {
        throw new \Exception( "Error retrieving quotes" );
    }
}
