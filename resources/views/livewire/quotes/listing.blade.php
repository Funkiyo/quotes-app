@php($pagination = $quotesPage->pagination)
<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <h1 class="mt-8 text-2xl font-medium text-gray-900">
            Explore quotes from <a href="https://prathameshmore.online/QuoteGarden/#get-quotes" target="_blank">QuoteGarden</a>
        </h1>

        <div class="mt-6 flex place-content-between">
            <div>
                <p class="text-gray-500 leading-relaxed">
                    Showing page {{$pagination->getCurrentPage()}}
                    from {{$pagination->getTotalPages()}}
                </p>
            </div>
            <div>
                @include('livewire.quotes.pagination')
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 p-6">
        @foreach($quotesPage->quotes as $quote)
           @include('livewire.quotes.item')
        @endforeach
    </div>
</div>
