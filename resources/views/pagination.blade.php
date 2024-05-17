@php
    $keyword = request('keyword');
@endphp
<div class="col-lg-12 col-md-12 text-center">
    <div class="pagination-area">

        @if ($pagination_object->previousPageUrl())
            <a href="{{ $pagination_object->previousPageUrl() }}" class="prev page-numbers">
                <i class='bx bx-left-arrow-alt'></i>
            </a>
        @endif

        @foreach (range($pagination_object->currentPage() - 2, $pagination_object->currentPage() + 2) as $page)
            @if ($page > 0 && $page <= $pagination_object->lastPage())
                @if ($page == $pagination_object->currentPage())
                    <span class="page-numbers current">{{ $page }}</span>
                @else
                    <!-- Use appends method to add query strings -->
                    <a href="{{ $pagination_object->appends(['keyword' => $keyword])->url($page) }}" class="page-numbers">{{ $page }}</a>
                @endif
            @endif
        @endforeach

        @if ($pagination_object->nextPageUrl())
            <a href="{{ $pagination_object->nextPageUrl() }}" class="next page-numbers">
                <i class='bx bx-right-arrow-alt'></i>
            </a>
        @endif

    </div>
</div>
