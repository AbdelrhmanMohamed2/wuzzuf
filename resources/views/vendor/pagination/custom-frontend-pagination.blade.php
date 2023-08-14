{{--
    <ul>
        <li><a href="#">&lt;</a></li>
        <li class="active"><span>1</span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">&gt;</a></li>
    </ul>
--}}


@if ($paginator->hasPages())
    <nav>
        <ul class="pagination pagination-sm m-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled " aria-disabled="true" aria-label="@lang('pagination.previous')"><a class=""
                        href="#">&lt;</a></li>
            @else
                <li class="">
                    <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lt;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled " aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active " aria-current="page"><a class=""
                                    href="#">{{ $page }}</a></li>
                        @else
                            <li class=""><a class=""
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="">
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">&gt;</a>
                </li>
            @else
                <li class="disabled " aria-disabled="true" aria-label="@lang('pagination.next')"><a class=""
                        href="#">&gt;</a></li>
            @endif
        </ul>
    </nav>
@endif
