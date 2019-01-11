@if ($paginator->lastPage() > 1)
<ul class="pagination">
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a id="{{ $i }}">{{ $i }}</a>
        </li>
    @endfor
</ul>
@endif