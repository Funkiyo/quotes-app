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

}
