@if($paginator->total() > $paginator->perPage() && $paginator->total() > 0)
    <ul class="pagination pagination-primary">
        {{-- Previous Button --}}
        @if(!$paginator->onFirstPage())
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
        @endif

        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $start = max(1, $currentPage - 1);
            $end = min($lastPage, $currentPage + 1);
        @endphp

        {{-- Always show the first page --}}
        @if($start > 1)
            <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
            @if($start > 2)
                <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">...</a></li>
            @endif
        @endif

        {{-- Show middle pages --}}
        @for($i = $start; $i <= $end; $i++)
            <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Always show the last page --}}
        @if($end < $lastPage)
            @if($end < $lastPage - 1)
                <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">...</a></li>
            @endif
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a></li>
        @endif

        {{-- Next Button --}}
        @if(!$paginator->onLastPage())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
        @endif
    </ul>
@endif
