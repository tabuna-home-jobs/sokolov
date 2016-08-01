@foreach($Elements as $li)


    @if(!isset($li->getParent[0]))
        <li class='{{$li->class}}
        @if(substr($li->link, 0,1) == '/')
        {{ Active::path(substr($li->link,1) . '**')}}
        @else
        {{Active::path($li->link ."/**")}}
        @endif
                '>
            <a
                    @if( empty(Active::path(substr($li->link,1))) && empty(Active::path($li->link)))
                    href='{{$li->link}}'
                    @endif

            > {{$pref}}  {{$li->label}}</a></li>
    @else



        <li class="{{$li->class}}

        @if(substr($li->link, 0,1) == '/')
        {{ Active::path(substr($li->link,1))}}
        @else
        {{Active::path($li->link)}}
        @endif

                not-effec-open">
            <a class="pull-left small-menu-element-left"

               @if( empty(Active::path(substr($li->link,1))) && empty(Active::path($li->link)))
               href="{{$li->link}}"
                    @endif

            >{{$li->label}}</a>
            <a class="pull-left xs-100  dropdown-toggle" data-toggle="dropdown"
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

