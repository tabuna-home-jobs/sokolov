@foreach($Elements as $li)
    <li class='{{$li->class}}

    @if(substr($li->link, 0,1) == '/')
    {{ Active::path(substr($li->link,1))}}
    @else
    {{Active::path($li->link)}}
    @endif

            '>
        <a href='{{$li->link}}'> {{$pref}}  {{$li->label}}</a></li>
@endforeach

