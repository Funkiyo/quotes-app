<?php

namespace App\Livewire;

use App\Services\QuotesGarden\QuotesService;
use App\Services\QuotesGarden\Responses\QuotesPage;
use Livewire\Component;

class QuotesListing extends Component
{
    use LivewireFavoriteActions;
    protected QuotesPage $quotesPage;

    protected QuotesService|null $service = null;

    public $page = 1;

    public function __construct()
    {
        $this->service = new QuotesService;
    }

    public function mount()
    {
        $this->goToPage( $this->page );
    }

    public function goToPage( int $page )
    {
        $this->quotesPage = $this->service->getQuotesPage( $page );
        $this->page = $page;
    }

    public function render()
    {
        return view( 'livewire.quotes.listing' )->with( [
            'quotesPage' => $this->quotesPage,
        ] );
    }
}
