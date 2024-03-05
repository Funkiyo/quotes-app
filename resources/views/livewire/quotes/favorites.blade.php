<div>
    <div>
        <div class="p-6">
            {{ $quotesPagination->links() }}
        </div>
        <div class="grid grid-cols-3 gap-4 p-6">
            @foreach ($quotes as $quote)
                @include('livewire.quotes.item')
            @endforeach
        </div>
    </div>
</div>
