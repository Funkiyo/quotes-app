<?php

namespace App\Livewire;

use App\Services\QuotesGarden\Entities\Quote;
use Livewire\Component;
use Livewire\WithPagination;

class QuotesFavorites extends Component
{
    use WithPagination;
    use FavoriteActions;

    public function render()
    {
        $quotesPagination = auth()->user()->favoriteQuotes()->paginate( 6 );
        $quotes = [];
        foreach ( $quotesPagination as $quoteModel ) {
            $quotes[] = Quote::fromModel( $quoteModel );
        }
        return view( 'livewire.quotes.favorites' )->with( [
            'quotesPagination' => $quotesPagination,
            'quotes' => $quotes
        ] );
    }
}
