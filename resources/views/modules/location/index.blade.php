<div class="location">
    <div>Регион поиска:</div>
    @if($locationSearch['city'] != null)
        <div>{{$locationSearch['city']['title']}}</div>
    @elseif($locationSearch['region'] != null)
        <div>{{$locationSearch['region']['title']}}</div>
    @else
        <div>не выбрано</div>
    @endif
</div>


