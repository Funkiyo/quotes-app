<?php

namespace App\Livewire;

use App\Models\Quote as QuoteModel;
use App\Services\QuotesGarden\Entities\Quote;

trait LivewireFavoriteActions
{
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
    }

    public function removeFromFavorites( array $quoteParam )
    {
        $quote = new Quote( ...$quoteParam );
        $user = auth()->user();

        $quoteModel = QuoteModel::where( 'garden_id', $quote->getId() )->first();

        if ( $quoteModel ) {
            $user->favoriteQuotes()->detach( $quoteModel->id );
        }

    }
}
