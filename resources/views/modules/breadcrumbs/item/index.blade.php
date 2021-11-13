<div class="breadcrumbs-item">
    @if ($breadcrumbsItem['active'])
        <span>{{$breadcrumbsItem['title']}}</span>
    @else
        <a class="breadcrumbs-item__link" href="{{$breadcrumbsItem['link']}}">{{$breadcrumbsItem['title']}}</a>
        <div class="breadcrumbs-item__arrow">></div>
    @endif
</div>


