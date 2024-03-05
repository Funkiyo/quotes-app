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

    public function goToPage( int $page )
    {
        $this->page = $page;
    }

    public function render(QuotesService $service)
    {
        //@TODO Unnecessary query but bypasses "Typed property App\Livewire\QuotesListing::$quotesPage must not be accessed before initialization"
        $this->quotesPage = $service->getQuotesPage( $this->page );

        return view( 'livewire.quotes.listing' )->with( [
            'quotesPage' => $this->quotesPage,
        ] );
    }
}
