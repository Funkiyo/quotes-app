<?php

namespace App\Services\Quotes\Entities;

class Pagination
{

    public int|null $prevPage;

    public function __construct(
        public int $currentPage,
        public int $nextPage,
        public int $totalPages,
    )
    {
        $this->prevPage = $this->currentPage > 1 ? $this->currentPage - 1 : null;
    }

    public function hasPrevPage(): bool
    {
        return $this->currentPage > 1;
    }

    public function hasNextPage(): bool
    {
        return $this->currentPage <= $this->totalPages;
    }

    public function getPrevPage(): int
    {
        return $this->prevPage;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function getNextPage(): int
    {
        return $this->nextPage;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }
}
