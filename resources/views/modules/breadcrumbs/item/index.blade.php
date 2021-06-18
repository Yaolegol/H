<div class="breadcrumbs-item">
    @isset ($breadcrumbsItem['active'])
        <span>{{$breadcrumbsItem['title']}}</span>
    @else
        <a href="{{$breadcrumbsItem['link']}}">{{$breadcrumbsItem['title']}}</a>
    @endisset
</div>


