@foreach($Elements as $li)


    @if(!isset($li->getParent[0]))
        <li class='{{$li->class}}
        @if(substr($li->link, 0,1) == '/')
        {{ Active::path(substr($li->link,1))}}
        @else
        {{Active::path($li->link)}}
        @endif
                '>
            <a href='{{$li->link}}'> {{$pref}}  {{$li->label}}</a></li>
    @else



        <li class="{{$li->class}}

        @if(substr($li->link, 0,1) == '/')
        {{ Active::path(substr($li->link,1))}}
        @else
        {{Active::path($li->link)}}
        @endif

                not-effec-open">
            <a class="pull-left small-menu-element-left" href="{{$li->link}}" type="button">{{$li->label}}</a>
            <a type="button" class="pull-left hidden-xs hidden-sm  dropdown-toggle" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @foreach($li->getParent as $subParent)
                    <li><a href='{{$subParent->link}}'>  {{$subParent->label}}</a></li>
                @endforeach
            </ul>
        </li>




    @endif



@endforeach

