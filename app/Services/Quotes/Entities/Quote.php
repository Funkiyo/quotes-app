<?php

namespace App\Services\Quotes\Entities;

class Quote
{
    public function __construct(
        public string $_id,
        public string $quoteText,
        public string $quoteAuthor,
        public string $quoteGenre,
        public string $__v,
    )
    {

    }

    public function getId(): string
    {
        return $this->_id;
    }

    public function getText(): string
    {
        return $this->quoteText;
    }

    public function getAuthor(): string
    {
        return $this->quoteAuthor;
    }

    public function getGenre(): string
    {
        return $this->quoteGenre;
    }

    public function toParam(): string
    {
        return json_encode( (array)$this );
    }

    public static function fromParam( string $param ): Quote
    {
        $data = (array)json_decode( $param );
        return new Quote( ...$data );
    }
}
