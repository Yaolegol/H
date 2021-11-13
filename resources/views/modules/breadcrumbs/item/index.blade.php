<div class="breadcrumbs-item">
    @if ($breadcrumbsItem['isLink'])
        <a class="breadcrumbs-item__link" href="{{$breadcrumbsItem['link']}}">{{$breadcrumbsItem['title']}}</a>
    @else
        <span>{{$breadcrumbsItem['title']}}</span>
    @endif

    @if($withArrow)
        <div class="breadcrumbs-item__arrow">></div>
    @endif
</div>


