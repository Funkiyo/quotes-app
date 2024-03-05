<div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <h1 class="mt-8 text-2xl font-medium text-gray-900">
            Explore quotes from <a href="https://prathameshmore.online/QuoteGarden/#get-quotes" target="_blank">QuoteGarden</a>
        </h1>

        <div class="mt-6 flex place-content-between">
            <div>
                <p class="text-gray-500 leading-relaxed">
                    Showing page {{$quotesPage->pagination->getCurrentPage()}}
                    from {{$quotesPage->pagination->getTotalPages()}}
                </p>
            </div>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-sm">
                        @if($quotesPage->pagination->hasPrevPage())
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500
                            bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700
                            dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    Previous
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white
                        border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700
                        dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    {{$quotesPage->pagination->getPrevPage()}}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white
                        border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700
                        dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                {{$quotesPage->pagination->getCurrentPage()}}
                            </a>
                        </li>
                        @if($quotesPage->pagination->hasNextPage())
                            <li>
                                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border
                        border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700
                        dark:text-white">
                                    {{$quotesPage->pagination->getNextPage()}}
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white
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
            <div class="bg-gray-50 rounded-lg shadow p-8">
                <h2 class="italic text-blue-darkest leading-normal">
                    {{$quote->getText()}}
                </h2>
                <p class="text-center pt-8 text-grey-darker">
                    {{$quote->getAuthor()}}
                    <span
                        class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                        {{$quote->getGenre()}}
                    </span>
                </p>
            </div>
        @endforeach
    </div>
</div>
