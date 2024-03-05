<?php

namespace App\Services\QuotesGarden;

use Illuminate\Support\Facades\Http;
use App\Services\QuotesGarden\Responses\QuotesPage;

class QuotesService
{

    const string URI = 'https://quote-garden.onrender.com/api/';

    const string VERSION = 'v3/';

    protected $limit = 9;

    public function __construct()
    {
    }

    public function getQuotesPage( int $page = 1 ): QuotesPage
    {
        $response = Http::get( $this->endpoint( 'quotes' ), [
            'page' => $page,
            'limit' => $this->limit
        ] );
        return new QuotesPage( $response );
    }

    protected function endpoint( string $path ): string
    {
        return self::URI . self::VERSION . $path;
    }
}
