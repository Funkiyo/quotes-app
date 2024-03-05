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
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-sm">
                        @if($pagination->hasPrevPage())
                            <li>
                                <a
                                    wire:click="goToPage({{$pagination->getPrevPage()}})"
                                    href="javascript:void(0)" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500
                            bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700
                            dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    Previous
                                </a>
                            </li>
                            <li>
                                <a
                                    wire:click="goToPage({{$pagination->getPrevPage()}})"
                                    href="javascript:void(0)" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white
                        border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700
                        dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    {{$pagination->getPrevPage()}}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a
                                href="javascript:void(0)" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white
                        border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700
                        dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                {{$pagination->getCurrentPage()}}
                            </a>
                        </li>
                        @if($pagination->hasNextPage())
                            <li>
                                <a
                                    wire:click="goToPage({{$pagination->getNextPage()}})"
                                    href="javascript:void(0)" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border
                        border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700
                        dark:text-white">
                                    {{$pagination->getNextPage()}}
                                </a>
                            </li>
                            <li>
                                <a
                                    wire:click="goToPage({{$pagination->getNextPage()}})"
                                    href="javascript:void(0)" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white
                        border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800
                        dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    Next
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 p-6">
        @foreach($quotesPage->quotes as $quote)
            @php($isFavorite = auth()->user()->isFavoriteQuote($quote->getId()))
            <div class="@if($isFavorite) bg-red-100 @else bg-gray-50 @endif rounded-lg shadow p-8">
                <h2 class="italic text-blue-darkest leading-normal">
                    @if(!$isFavorite)
                        <button
                            wire:click="addToFavorites({{$quote->toParam()}})"
                            type="button" class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800
                font-medium rounded-lg text-sm px-1 py-1 dark:bg-gray-600
                dark:hover:bg-gray-700">
                            <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
                            </svg>
                        </button>
                        &nbsp;
                    @else
                        <button
                            wire:click="removeFromFavorites({{$quote->toParam()}})"
                            type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800
                font-medium rounded-lg text-sm px-1 py-1 dark:bg-purple-600
                dark:hover:bg-purple-700">
                            <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="m12.7 20.7 6.2-7.1c2.7-3 2.6-6.5.8-8.7A5 5 0 0 0 16 3c-1.3 0-2.7.4-4 1.4A6.3 6.3 0 0 0 8 3a5 5 0 0 0-3.7 1.9c-1.8 2.2-2 5.8.8 8.7l6.2 7a1 1 0 0 0 1.4 0Z"/>
                            </svg>
                        </button>
                    @endif
                    {{$quote->getText()}}
                </h2>
                <p class="text-center pt-8 text-grey-darker">
                    <strong>{{$quote->getAuthor()}}</strong>
                    {{--                    <span--}}
                    {{--                        class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">--}}
                    {{--                        {{$quote->getGenre()}}--}}
                    {{--                    </span>--}}

                </p>
            </div>
        @endforeach
    </div>
</div>
