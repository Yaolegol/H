<div class="modules-common-breadcrumbs-item">
    @if ($breadcrumbsItem['isLink'])
        <a class="modules-common-breadcrumbs-item__link" href="{{$breadcrumbsItem['link']}}">{{$breadcrumbsItem['title']}}</a>
    @else
        <span>{{$breadcrumbsItem['title']}}</span>
    @endif

    @if($withArrow)
        <div class="modules-common-breadcrumbs-item__arrow">></div>
    @endif
</div>


