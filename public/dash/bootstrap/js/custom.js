//Тайм пикер для акций
$(document).ready(function () {


    //Тайм пикер для акций
    $(function () {
        if (document.getElementById('datetimepickerstart') && document.getElementById('datetimepickerend')) {

            $('#datetimepickerstart').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                locale: 'ru',
                defaultDate: $('#datetimepickerstart input').attr('value')
            });

            $('#datetimepickerend').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                locale: 'ru',
                defaultDate: $('#datetimepickerend input').attr('value')
            });

            $("#datetimepickerstart").on("dp.change", function (e) {
                $('#datetimepickerend').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepickerend").on("dp.change", function (e) {
                $('#datetimepickerstart').data("DateTimePicker").maxDate(e.date);
            });

        }
        ;
    });


    //Тайм пикер для акций
    $(function () {
        if (document.getElementById('datetimepickerorder')) {

            $('#datetimepickerorder').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                locale: 'ru',
                defaultDate: $('#datetimepickerorder input').attr('value')
            });

            $("#datetimepickerorder").on("dp.change", function (e) {
                $('#datetimepickerorder').data("DateTimePicker").minDate(e.date);
            });


        }
        ;
    });


    //Тайм пикер для задачи
    $(function () {
        if (document.getElementById('datetimepickertast')) {

            $('#datetimepickertast').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                locale: 'ru',
                defaultDate: $('#datetimepickerorder input').attr('value')
            });

            $("#datetimepickertast").on("dp.change", function (e) {
                $('#datetimepickerorder').data("DateTimePicker").minDate(e.date);
            });


        }
        ;
    });


    //Визуальный редактор
    /**
     *  fancybox-thumb-img-text для img увеличение
     */
    $(function () {
        tinymce.init({
            theme: "modern",
            skin: 'light',
            language: 'ru',
            selector: "textarea.textareaedit",
            extended_valid_elements: "img[class=img-responsive|!src|border:0|alt|title|width|height|style]",
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code ',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print  media | forecolor backcolor',
            image_advtab: true,
            //plugins: "image,code,link,preview,hr,media,link image", //responsivefilemanager
            // toolbar: "styleselect | fontsizeselect   | bullist numlist outdent indent | link image media, file_browser_callback: RoxyFileBrowser  | preview code | more ",
            //menu: "true",
            statusbar: true,
            file_browser_callback: RoxyFileBrowser
            /*
             setup: function (editor) {
             editor.addButton('more', {
             text: 'Превью',
             onclick: function () {
             editor.insertContent('<!--more-->');
             }
             });
             },
             */

            //external_filemanager_path: "/dash/filemanager/",
            //filemanager_title: "Файловый менеджер",
            //external_plugins: {"filemanager": "/dash/filemanager/plugin.min.js"}
        });


        function RoxyFileBrowser(field_name, url, type, win) {
            var roxyFileman = '/dash/fileman/index.html';
            if (roxyFileman.indexOf("?") < 0) {
                roxyFileman += "?type=" + type;
            }
            else {
                roxyFileman += "&type=" + type;
            }
            roxyFileman += '&input=' + field_name + '&value=' + win.document.getElementById(field_name).value;
            if (tinyMCE.activeEditor.settings.language) {
                roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
            }
            tinyMCE.activeEditor.windowManager.open({
                file: roxyFileman,
                title: 'Roxy Fileman',
                width: 850,
                height: 650,
                resizable: "yes",
                plugins: "media",
                inline: "yes",
                close_previous: "no"
            }, {window: win, input: field_name});
            return false;
        }


    });


    // Запонимание положения сайт бара
    $("#sidebarcollapse").click(function () {
        $.ajax({
            type: "post",
            url: '/dashboard/sidebar',
            beforeSend: function (request) {
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
    $(function () {
        $('.glyphicon.btn-remove.glyphicon-minus').last().removeClass('btn-remove glyphicon-minus').addClass('glyphicon-plus btn-add');

        $(document).on('click', '.btn-add', function (e) {
            e.preventDefault();

            var controlForm = $('.controls form:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo('#GoodsAttr');

            newEntry.find('input').val('');

            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }).on('click', '.btn-remove', function (e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });


    // Запонимание положения сайт бара
    $(".delete").click(function () {

        var url = $(this).data('url');
        var item = $(this).data('item');

        if(item == undefined) {
            item = '';
        }

        swal({
            title: "Вы уверены?",
            text: "Эта запись будет на всегда удалена!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Да, далить её!",
            cancelButtonText: "Нет, я передумал!",
            closeOnConfirm: false
        }, function () {

            $.ajax({
                type: "DELETE",
                url: url,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
                },
                error: function(){
                    alert("Error!");
                },
                success: function(){

                    swal({
                        title: "Удалено!",
                        text: "Запись была удалена.",
                        type: "success",
                        closeOnConfirm: true
                    }, function () {
                        location.reload(true)
                    });

                }
            });




        });


    });


});
