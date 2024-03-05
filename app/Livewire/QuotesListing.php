<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\Quotes\QuotesService;
use App\Services\Quotes\Responses\QuotesPage;

class QuotesListing extends Component
{
    protected QuotesPage $quotesPage;

    protected QuotesService|null $service = null;

    public function __construct()
    {
        $this->service = new QuotesService;
    }

    public function mount()
    {
        $this->goToPage( 1 );
    }

    public function goToPage( int $page )
    {
        $this->quotesPage = $this->service->getQuotesPage( $page );
    }

    public function render()
    {
        return view( 'livewire.quotes-listing' )->with( [
            'quotesPage' => $this->quotesPage
        ] );
    }
}
