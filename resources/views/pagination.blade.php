<div id="pagination">
    
    @if(1 == $currentPage)
        
        <a href="" class="active">{{ $currentPage }}</a>
    @else
        <a href="{{ $basePaginationUrl }}{{ $basePaginationChar }}page=1">1</a>
    @endif


    @if($currentPage - $pagesBeforeAfter > 2)
    ...
    @endif
    
    @if($totalPages > 1)
        @for($page = max($currentPage - $pagesBeforeAfter, 2); $page <= $currentPage + $pagesBeforeAfter && $page < $totalPages; ++$page) 
            @if($page == $currentPage)
                <a href="" class="active">{{ $page }}</a>
            @else
                <a href="{{ $basePaginationUrl }}{{ $basePaginationChar }}page={{ $page }}">{{ $page }}</a>
            @endif
        @endfor
    @endif

    @if($currentPage < $totalPages - $pagesBeforeAfter - 1)
    ...
    @endif

    @if($currentPage == $totalPages)
        <a href="" class="active">{{ $currentPage }}</a>
    @else
        <a href="{{ $basePaginationUrl }}{{ $basePaginationChar }}page={{ $totalPages }}">{{ $totalPages }}</a>
    @endif
</div>