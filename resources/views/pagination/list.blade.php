@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li>
        <a id="{{ $paginator->currentPage()-1 > 0 ? $paginator->currentPage()-1 : $paginator->currentPage() }}">Previous</a>
    </li>
    <li style="height: 23px;margin-top: 10px;margin-left: 10px;margin-right: 10px;">
        Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
    </li>
    <li>
        <a id="{{ $paginator->currentPage()+1 <= $paginator->lastPage() ? $paginator->currentPage()+1 : $paginator->currentPage() }}">Next</a>
    </li>
</ul>
@endif