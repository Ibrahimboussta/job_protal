@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center items-center space-x-2 mt-6 mx-auto max-w-full">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="w-8 h-8 flex items-center justify-center text-gray-400 bg-white border border-gray-200 rounded-full cursor-not-allowed">
                &lt;
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="w-8 h-8 flex items-center justify-center text-blue-500 bg-white border border-gray-200 rounded-full hover:bg-blue-100 hover:text-blue-600">
                &lt;
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="w-8 h-8 flex items-center justify-center text-gray-400 bg-white border border-gray-200 rounded-full">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="w-8 h-8 flex items-center justify-center text-white bg-blue-500 rounded-full font-semibold">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="w-8 h-8 flex items-center justify-center text-blue-500 bg-white border border-gray-200 rounded-full hover:bg-blue-100 hover:text-blue-600">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="w-8 h-8 flex items-center justify-center text-blue-500 bg-white border border-gray-200 rounded-full hover:bg-blue-100 hover:text-blue-600">
                &gt;
            </a>
        @else
            <span class="w-8 h-8 flex items-center justify-center text-gray-400 bg-white border border-gray-200 rounded-full cursor-not-allowed">
                &gt;
            </span>
        @endif
    </nav>
@endif
