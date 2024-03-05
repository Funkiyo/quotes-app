<?php

namespace Tests\Feature;

use App\Services\Quotes\QuotesService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuotesServiceTest extends TestCase
{

    protected QuotesService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new QuotesService();
    }

    /**
     * A basic feature test example.
     */
    public function test_basic_connection(): void
    {
        $page = 2;

        $quotesPage = $this->service->getQuotesPage( $page );

        $this->assertEquals( $quotesPage->pagination->getCurrentPage(), $page );
    }
}
