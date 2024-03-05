<?php

namespace App\Services\QuotesGarden\Adapters;

use App\Services\QuotesGarden\Entities\Quote;

class QuoteAdapter
{
    public static function fromParam( string $param ): Quote
    {
        $data = (array)json_decode( $param );
        return new Quote( ...$data );
    }

    public static function fromModel( $model ): Quote
    {
        return new Quote(
            $model->garden_id,
            $model->text,
            $model->author,
            $model->genre,
            'x'
        );
    }
}
