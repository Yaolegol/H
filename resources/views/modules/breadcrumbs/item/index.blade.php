<div class="breadcrumbs-item">
    @isset ($breadcrumbsItem['active'])
        <span>{{$breadcrumbsItem['title']}}</span>
    @else
        <a class="breadcrumbs-item__link" href="{{$breadcrumbsItem['link']}}">{{$breadcrumbsItem['title']}}</a>
        <span class="breadcrumbs-item__arrow">-></span>
    @endisset
</div>


