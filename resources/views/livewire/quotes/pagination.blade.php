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
