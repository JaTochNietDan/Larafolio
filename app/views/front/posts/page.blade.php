<ul class="pagination">
    @if($paginator->getCurrentPage() == 1)
        <li class="disabled"><a>&laquo;</a></li>
    @else
        <li><a href="?page={{ $paginator->getCurrentPage() - 1 }}">&laquo;</a></li>
    @endif
    
    @for($i = 1; $i <= ceil($paginator->getTotal() / $paginator->getPerPage()); $i++)
        @if($i == $paginator->getCurrentPage())
            <li class="active"><a>{{ $i }}</a></li>
        @else
            <li><a href="?page={{ $i }}">{{ $i }}</a></li>
        @endif
    @endfor
    
    @if(ceil($paginator->getTotal() / $paginator->getPerPage()) == $paginator->getCurrentPage())
        <li class="disabled"><a>&raquo;</a></li>
    @else
        <li><a href="?page={{ $paginator->getCurrentPage() + 1 }}">&raquo;</a></li>
    @endif
</ul>