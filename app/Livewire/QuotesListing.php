<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\Quotes\QuotesService;
use App\Services\Quotes\Responses\QuotesPage;

class QuotesListing extends Component
{
    protected QuotesPage $quotesPage;

    public function mount()
    {
        $quotesService = new QuotesService;
        $this->quotesPage = $quotesService->getQuotesPage();
    }

    public function render()
    {
        return view( 'livewire.quotes-listing' )->with( [
            'quotesPage' => $this->quotesPage
        ] );
    }
}
