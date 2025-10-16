@if ($jobs->hasPages())
    <ul class="pager">
        {{-- Previous Page Link --}}
        @if ($jobs->onFirstPage())
            <li class="disabled"><span class="pager-prev"></span></li>
        @else
            <li><a class="pager-prev" href="{{ $jobs->previousPageUrl() }}"></a></li>
        @endif
        @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
            @if ($page == $jobs->currentPage())
                <li><span class="pager-number active">{{ $page }}</span></li>
            @else
                <li><a class="pager-number" href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach
        @if ($jobs->hasMorePages())
            <li><a class="pager-next" href="{{ $jobs->nextPageUrl() }}"></a></li>
        @else
            <li class="disabled"><span class="pager-next"></span></li>
        @endif
    </ul>
@endif
