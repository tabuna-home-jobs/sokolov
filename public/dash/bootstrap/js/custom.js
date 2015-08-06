//Тайм пикер для акций
$(document).ready(function(){


    //Тайм пикер для акций
    $(function () {
        if(document.getElementById('datetimepickerstart') &&  document.getElementById('datetimepickerend')){

                $('#datetimepickerstart').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss',
                    locale: 'ru',
                    defaultDate:  $('#datetimepickerstart input').attr('value')
                });

                $('#datetimepickerend').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss',
                    locale: 'ru',
                    defaultDate:  $('#datetimepickerend input').attr('value')
                });

                $("#datetimepickerstart").on("dp.change", function (e) {
                    $('#datetimepickerend').data("DateTimePicker").minDate(e.date);
                });
                $("#datetimepickerend").on("dp.change", function (e) {
                    $('#datetimepickerstart').data("DateTimePicker").maxDate(e.date);
                });

         };
    });



    //Визуальный редактор
    $(function () {
            tinymce.init({
                theme: "modern",
                skin: 'light',
                language: 'ru',
                selector: "textarea.textareaedit",
                extended_valid_elements: "img[class=img-responsive|!src|border:0|alt|title|width|height|style]",
                plugins: "image,code,link,preview,hr,media,responsivefilemanager",
                toolbar: "styleselect | fontsizeselect   | bullist numlist outdent indent | link image media  | preview code | more  ",
                menu: "false",
                statusbar: false,
                setup: function (editor) {
                    editor.addButton('more', {
                        text: 'Превью',
                        onclick: function () {
                            editor.insertContent('<!--more-->');
                        }
                    });
                },

                external_filemanager_path: "/dash/filemanager/",
                filemanager_title: "Файловый менеджер",
                external_plugins: {"filemanager": "/dash/filemanager/plugin.min.js"}
            });
    });





    // Запонимание положения сайт бара
    $( "#sidebarcollapse" ).click(function() {
        $.ajax({
            type: "post",
            url: '/dashboard/sidebar',
            beforeSend: function(request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
            }
        });
    });




    //Подсветка активных полей админки
    //У всех ссылок должны быть конечные слэши /
    $("ul.sidebar-menu > li").each(function () {
        var pathName = location + "/";//pathname + "/";
        var currHref = $('a', this).attr('href');
        var currObj = $(this);

        //Если оно с дочками то бежим по нему
        if (currObj.hasClass('treeview')) {
            $('ul li a', currObj).each(function () {
                //Получаем ссылку текущего подменю
                var currSubHref = $(this).attr('href');

                if (pathName.indexOf(currSubHref) + 1) {
                    currObj.addClass('active');
                    $(this).addClass('activeA');
                } else {
                    $(this).removeClass('activeA');
                }
            });
        } else {
            if (pathName.indexOf(currHref) != '-1') {
                currObj.addClass('active');
            } else {
                currObj.removeClass('active');
            }
        }
    });



    // Растягивание файлового менеджера на всю высоту
    $(function () {
        var iframe = $('#ourframe', parent.document.body);
        iframe.height($(document.body).height());
    });





    //Атрибуты и их значения
    $(function()
    {
        $('.glyphicon.btn-remove.glyphicon-minus').last().removeClass('btn-remove glyphicon-minus').addClass('glyphicon-plus btn-add');

        $(document).on('click', '.btn-add', function(e)
        {
            e.preventDefault();

            var controlForm = $('.controls form:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo('#GoodsAttr');

            newEntry.find('input').val('');

            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }).on('click', '.btn-remove', function(e)
        {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });




});
