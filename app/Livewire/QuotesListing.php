<?php

namespace App\Livewire;

use App\Services\Quotes\Entities\Quote;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Services\Quotes\QuotesService;
use App\Services\Quotes\Responses\QuotesPage;
use App\Models\Quote as QuoteModel;

class QuotesListing extends Component
{
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

    public function addToFavorites( array $quoteParam )
    {
        $quote = new Quote( ...$quoteParam );
        $user = auth()->user();

        $quoteModel = QuoteModel::firstOrCreate( [
            'garden_id' => $quote->getId(),
            'text' => $quote->getText(),
            'author' => $quote->getAuthor(),
            'genre' => $quote->getGenre()
        ] );

        if ( ! $user->favoriteQuotes()->where( 'quote_id', $quoteModel->id )->exists() ) {
            $user->favoriteQuotes()->attach( $quoteModel->id );
        }

        //@TODO Unnecessary query but bypasses "Typed property App\Livewire\QuotesListing::$quotesPage must not be accessed before initialization"
        $this->goToPage( $this->page );
    }

    public function removeFromFavorites( array $quoteParam )
    {
        $quote = new Quote( ...$quoteParam );
        $user = auth()->user();

        $quoteModel = QuoteModel::where('garden_id',$quote->getId())->first();

        if($quoteModel){
            $user->favoriteQuotes()->detach( $quoteModel->id );
        }

        //@TODO Unnecessary query but bypasses "Typed property App\Livewire\QuotesListing::$quotesPage must not be accessed before initialization"
        $this->goToPage( $this->page );
    }

    public function render()
    {
        return view( 'livewire.quotes-listing' )->with( [
            'quotesPage' => $this->quotesPage,
        ] );
    }
}
