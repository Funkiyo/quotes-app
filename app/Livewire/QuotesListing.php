<?php

namespace App\Livewire;

use App\Services\QuotesGarden\QuotesService;
use App\Services\QuotesGarden\Responses\QuotesPage;
use Livewire\Component;

class QuotesListing extends Component
{
    use FavoriteActions;
    protected QuotesPage $quotesPage;

    protected QuotesService|null $service = null;

    public $page = 1;

    public function __construct()
    {
        $this->service = new QuotesService;
    }

    public function goToPage( int $page )
    {
        $this->page = $page;
    }

    public function render()
    {
        //@TODO Unnecessary query but bypasses "Typed property App\Livewire\QuotesListing::$quotesPage must not be accessed before initialization"
        $this->quotesPage = $this->service->getQuotesPage( $this->page );

        return view( 'livewire.quotes.listing' )->with( [
            'quotesPage' => $this->quotesPage,
        ] );
    }
}
