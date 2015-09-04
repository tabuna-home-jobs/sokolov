@extends('app')

@section('content')




    <script type="text/javascript">
        var menus = {
            "oneThemeLocationNoMenus" : "",
            "moveUp" : "Вверх",
            "moveDown" : "Вних",
            "moveToTop" : "В начало",
            "moveUnder" : "До %s",
            "moveOutFrom" : "Под  %s",
            "under" : "После %s",
            "outFrom" : "За from %s",
            "menuFocus" : "%1$s. элемент меню %2$d из %3$d.",
            "subMenuFocus" : "%1$s. Меню суб-элемента %2$d из %3$s."
        };
    </script>




    <div id="wp-menu-mis">
    <div class="wp-admin wp-core-ui js   nav-menus-php auto-fold admin-bar  sticky-menu menu-max-depth-1">

    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Список меню</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">
                Меню сайта

            </div>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-xs-12">

                            <div id="wpwrap">
                                <div id="wpcontent">
                                    <div id="wpbody">
                                        <div id="wpbody-content">

                                            <div class="wrap">
                                                <div class="manage-menus">
                                                    <form method="get" action="{{route('wmenuindex')}}">
                                                        <label for="menu" class="selected-menu">Выберите меню для редактирования:</label>

                                                        {!! Form::select('menu', $menulist,0) !!}

                                            <span class="submit-btn">
                                                <input type="submit" class="btn btn-primary" value="Изменить">
                                            </span>
                                                        <span class="add-new-menu-action"> или <a href="{{route('wmenuindex')}}?action=edit&menu=0">Создать новое меню</a>. </span>
                                                    </form>
                                                </div>
                                                <div id="nav-menus-frame">

                                                    @if(Input::has('menu'))
                                                        <div id="menu-settings-column" class="metabox-holder">

                                                            <div class="clear"></div>

                                                            <form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
                                                                <div id="side-sortables" class="accordion-container">
                                                                    <ul class="outer-border">
                                                                        <li class="control-section accordion-section  open add-page" id="add-page">
                                                                            <h3 class="accordion-section-title hndle" tabindex="0"> Добавить ссылку <span class="screen-reader-text">Пресс возвращение или введите расширить</span></h3>
                                                                            <div class="accordion-section-content ">
                                                                                <div class="inside">
                                                                                    <div class="customlinkdiv" id="customlinkdiv">
                                                                                        <p id="menu-item-url-wrap">
                                                                                            <label class="howto" for="custom-menu-item-url"> <span>Ссылка</span>
                                                                                                <input id="custom-menu-item-url" name="url" type="text" class="code menu-item-textbox" value="http://">
                                                                                            </label>
                                                                                        </p>

                                                                                        <p id="menu-item-name-wrap">
                                                                                            <label class="howto" for="custom-menu-item-name"> <span>Название</span>
                                                                                                <input id="custom-menu-item-name" name="label" type="text" class="regular-text menu-item-textbox input-with-default-title" title="Название">
                                                                                            </label>
                                                                                        </p>

                                                                                        <p class="button-controls">

                                                                                            <a  href="#" onclick="addcustommenu()"  class="button-secondary submit-add-to-menu right"  >Добавить новый элемент меню</a>
                                                                                            <span class="spinner" id="spincustomu"></span>
                                                                                        </p>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    @endif
                                                    <div id="menu-management-liquid">
                                                        <div id="menu-management">
                                                            <form id="update-nav-menu" action="" method="post" enctype="multipart/form-data">
                                                                <div class="menu-edit ">
                                                                    <div id="nav-menu-header">
                                                                        <div class="major-publishing-actions">
                                                                            <label class="menu-name-label howto open-label" for="menu-name"> <span>Имя</span>
                                                                                <input name="menu-name" id="menu-name" type="text" class="menu-name regular-text menu-item-textbox" title="Введите название меню" value="@if(isset($indmenu)){{$indmenu->name}}@endif">
                                                                                <input type="hidden" id="idmenu" value="@if(isset($indmenu)){{$indmenu->id}}@endif" />
                                                                            </label>

                                                                            @if(Input::has('action'))
                                                                                <div class="publishing-action">
                                                                                    <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-primary menu-save">Создать меню</a>
                                                                                </div>
                                                                            @elseif(Input::has("menu"))
                                                                                <div class="publishing-action">
                                                                                    <a onclick="getmenus()" name="save_menu" id="save_menu_header" class="btn btn-primary menu-save">Сохранить меню</a>
                                                                                </div>

                                                                            @else
                                                                                <div class="publishing-action">
                                                                                    <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-primary menu-save">Create menu</a>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div id="post-body">
                                                                        <div id="post-body-content">

                                                                            @if(Input::has("menu"))
                                                                                <h3>Структура меню</h3>


                                                                            @else
                                                                                <h3>Создание меню</h3>
                                                                                <div class="drag-instructions post-body-plain" style="">
                                                                                    <p>
                                                                                        Пожалуйста введите название меню и нажмите "Cоздать меню"
                                                                                    </p>
                                                                                </div>
                                                                            @endif

                                                                            <ul class="menu ui-sortable" id="menu-to-edit">
                                                                                @if(isset($menus))
                                                                                    @foreach($menus as $m)
                                                                                        <li id="menu-item-{{$m->id}}" class="menu-item menu-item-depth-{{$m->depth}} menu-item-page menu-item-edit-inactive pending" style="display: list-item;">
                                                                                            <dl class="menu-item-bar">
                                                                                                <dt class="menu-item-handle">
                                                                                                    <span class="item-title"> <span class="menu-item-title"> <span id="menutitletemp_{{$m->id}}">{{$m->label}}</span> <span style="color: transparent;">|{{$m->id}}|</span> </span> <span class="is-submenu" style="@if($m->depth==0)display: none;@endif">Подъелемент</span> </span>
                                                                                                    <span class="item-controls"> <span class="item-type">Ссылка</span> <span class="item-order hide-if-js"> <a href="{{route('wmenuindex')}}?action=move-up-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-up"><abbr title="Move Up">↑</abbr></a> | <a href="{{route('wmenuindex')}}?action=move-down-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-down"><abbr title="Move Down">↓</abbr></a> </span> <a class="item-edit" id="edit-{{$m->id}}" title=" " href="{{route('wmenuindex')}}?edit-menu-item={{$m->id}}#menu-item-settings-{{$m->id}}"> </a> </span>
                                                                                                </dt>
                                                                                            </dl>

                                                                                            <div class="menu-item-settings" id="menu-item-settings-{{$m->id}}">
                                                                                                <p class="description description-thin">
                                                                                                    <label for="edit-menu-item-title-{{$m->id}}"> Название
                                                                                                        <br>
                                                                                                        <input type="text" id="idlabelmenu_{{$m->id}}" class="widefat edit-menu-item-title" name="idlabelmenu_{{$m->id}}" value="{{$m->label}}">
                                                                                                    </label>
                                                                                                </p>

                                                                                                <p class="field-css-classes description description-thin">
                                                                                                    <label for="edit-menu-item-classes-{{$m->id}}"> CSS стиль (Не обязательно)
                                                                                                        <br>
                                                                                                        <input type="text" id="clases_menu_{{$m->id}}" class="widefat code edit-menu-item-classes" name="clases_menu_{{$m->id}}" value="{{$m->class}}">
                                                                                                    </label>
                                                                                                </p>

                                                                                                <p class="field-css-classes description description-wide">
                                                                                                    <label for="edit-menu-item-classes-{{$m->id}}"> Ссылка
                                                                                                        <br>
                                                                                                        <input type="text" id="url_menu_{{$m->id}}" class="widefat code edit-menu-item-classes" id="url_menu_{{$m->id}}" value="{{$m->link}}">
                                                                                                    </label>
                                                                                                </p>

                                                                                                <p class="field-move hide-if-no-js description description-wide">
                                                                                                    <label> <span>Переместить</span> <a href="{{route('wmenuindex')}}?action=edit&menu=26#" class="menus-move-up" style="display: none;">Вверх</a> <a href="{{route('wmenuindex')}}?action=edit&menu=26#" class="menus-move-down" title="Mover uno abajo" style="display: inline;">В низ</a> <a href="{{route('wmenuindex')}}?action=edit&menu=26#" class="menus-move-left" style="display: none;"></a> <a href="{{route('wmenuindex')}}?action=edit&menu=26#" class="menus-move-right" style="display: none;"></a> <a href="{{route('wmenuindex')}}?action=edit&menu=26#" class="menus-move-top" style="display: none;">Верх</a> </label>
                                                                                                </p>

                                                                                                <div class="menu-item-actions description-wide submitbox">

                                                                                                    <a class="item-delete btn btn-danger" id="delete-{{$m->id}}" href="{{route('wmenuindex')}}?action=delete-menu-item&menu-item={{$m->id}}&_wpnonce=2844002501">Удалить</a>
                                                                                                    <a class="item-cancel hide-if-no-js btn btn-link" id="cancel-{{$m->id}}" href="{{route('wmenuindex')}}?edit-menu-item={{$m->id}}&cancel=1424297719#menu-item-settings-{{$m->id}}">Отмена</a>
                                                                                                    <a onclick="updateitem({{$m->id}})" class="btn btn-primary updatemenu" id="update-{{$m->id}}" href="javascript:void(0)">Обновить элемент</a>

                                                                                                </div>

                                                                                            </div>
                                                                                            <ul class="menu-item-transport"></ul>
                                                                                        </li>
                                                                                    @endforeach
                                                                                @endif
                                                                            </ul>
                                                                            <div class="menu-settings">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="nav-menu-footer">
                                                                        <div class="major-publishing-actions">

                                                                            @if(Input::has('action'))
                                                                                <div class="publishing-action">
                                                                                    <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-primary menu-save">Создать меню</a>
                                                                                </div>
                                                                            @elseif(Input::has("menu"))
                                                                                <span class="delete-action"> <a class="submitdelete deletion menu-delete" onclick="deletemenu()" href="javascript:void(9)">Удалить меню</a> </span>
                                                                                <div class="publishing-action">
                                                                                    <a onclick="getmenus()" name="save_menu" id="save_menu_header" class="btn btn-primary menu-save">Сохранить меню</a>
                                                                                </div>

                                                                            @else
                                                                                <div class="publishing-action">
                                                                                    <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-primary menu-save">Создать меню</a>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clear"></div>
                                        </div>

                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <script type="text/javascript" src="{{asset('/menu/scripts.js')}}"></script>

                                <script type="text/javascript" src="{{asset('/menu/scripts2.js')}}"></script>
                                <script type="text/javascript" src="{{asset('/menu/menu.js')}}"></script>

                                <script>
                                    var arraydata = [];

                                    var addcustommenur= "{{route('addcustommenu')}}";
                                    var updateitemr= "{{route('updateitem')}}";
                                    var generatemenucontrolr="{{route('generatemenucontrol')}}";
                                    var deleteitemmenur="{{route('deleteitemmenu')}}";
                                    var deletemenugr="{{route('deletemenug')}}";
                                    var createnewmenur="{{route('createnewmenu')}}";
                                    var menuwr="{{route('wmenuindex')}}";
                                </script>
                                <div class="clear"></div>
                            </div>








                    </div>
                </div>





            </div>
        </div>
    </div>
    </div>

</div>

    </div>
@endsection











