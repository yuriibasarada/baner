<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Basic Plus Demo
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2013, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */
-->
<html lang="en">
<head>
    <!-- Force latest IE rendering engine or ChromeFrame if installed -->
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta charset="utf-8">
    <title>jQuery File Upload Demo - Basic Plus version</title>
    <meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bar, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads. Works with any server-side platform (Google App Engine, PHP, Python, Ruby on Rails, Java, etc.) that supports standard HTML form file uploads.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Generic page styles -->
</head>
<body style="padding: 100px">
<div class="container" >
    <div class="row">
        <div class="col-6">
            <form id='data' enctype="multipart/form-data" method="POST">
                <h5>Заголовок</h5>
                <input id='smt-kalk-title' type="text" name="title" style="width: 270px;height: 40px;"><br/><br/>
                <h5>Выравнивание заголовка</h5>
                <select style="width: 270px;height: 40px;">
                    <option value="1" selected>Выберите позицию</option>
                    <option value="2">Выровнять по центру</option>
                    <option value="3">Выровнять по верхнему краю</option>
                    <option value="4">Выровнять по нижнему краю</option>
                    <option value="5">По правому краю</option>
                    <option value="6">По левому краю</option>
                </select>
                <br/><br/>
                <h5>Фоновое изображение</h5>
                <div class="d">
                    <input id="fileupload" type="file" name="files" style=" display: none">
                    <span id='val'></span>
                    <span id='button'>Загрузить</span>
                </div>
    </span><br/>
                <h5>Текстовое описание</h5>
                <textarea wrap="hard" name="text"id="smt-kalk-description" cols="30" rows="2" onkeyup="press(event)" style="width: 270px"></textarea>



            </form>
        </div>
        <div class="img" style="position: relative; display: grid; margin-top: 35px;" >
            <table class="harakt" border="0" cellspacing="0" cellpadding="0" >
                <thead style="width: auto">
                <tr><td style="display: none"></td>
                    <td style="position: absolute">
                        <h3><div id="smt-kalk-result" style="position: absolute; display: block;"></div></h3>
                        <h3><div id="smt-kalk-result1" style="position: absolute; text-align: center; padding-top: 125px;"></div></h3>
                        <h3><div id="smt-kalk-result2" style="position: absolute; text-align: center;"></div></h3>
                        <h3><div id="smt-kalk-result3" style="position: absolute; text-align: center;padding-top: 230px;"></div></h3>
                        <h3><div id="smt-kalk-result4" style="position: absolute; text-align: right; padding-top: 125px;"></div></h3>
                        <h3><div id="smt-kalk-result5" style="position: absolute; text-align: left; padding-top: 125px;"></div></h3>
                    </td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="display: none"> </td>
                    <td>
                        <div id="smt-talk-result" style="position: absolute; display: block; padding-top: 40px"></div>
                        <div id="smt-talk-result1" style="position: absolute; text-align: center; padding-top: 165px;"></div>
                        <div id="smt-talk-result2" style="position: absolute; text-align: center; padding-top: 40px;"></div>
                        <div id="smt-talk-result3" style="position: absolute; text-align: center; padding-top: 270px;"></div>
                        <div id="smt-talk-result4" style="position: absolute; text-align: right; padding-top: 165px;"></div>
                        <div id="smt-talk-result5" style="position: absolute;text-align: left; padding-top: 165px;"></div>

                    </td>
                </tr>
                </tbody>

            </table>


            <!-- The globalspacgress bar -->
            <div id="files" class="files"></div>
<!--                <div id="smt-kalk-result1" style="position: absolute; padding: 20px;"></div>-->
<!--                <div id="smt-talk-result2" style="position: absolute; padding: 30px;"></div>-->


        </div>
    </div>
    <div class="text-center"><button form="data" type="submit" name="submit">Сгенерировать банер</button></div>

</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload validation plugin -->
<script>
    /*jslint unparam: true, regexp: true */
    /*global window, $ */
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = window.location.hostname ===  'index.php',
            uploadButton = $('')
                .addClass('btn btn-primary')
                .prop('disabled', true)
                .text('Processing...')
                .on('click', function () {
                    var $this = $(this),
                        data = $this.data();
                    $this
                        .off('click')
                        .text('Abort')
                        .on('click', function () {
                            $this.remove();
                            data.abort();
                        });
                    data.submit().always(function () {
                        $this.remove();
                    });
                });
        //
        // var d = descript.slice();
        $('#fileupload').fileupload({
            // url: url,
            dataType: 'json',
            // autoUpload: true,
            // acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 999000,
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            previewMaxWidth: 300,
            previewMaxHeight: 300,
            previewCrop: true
        })
            .on('fileuploadadd', function (e, data) {
            data.context = $('<div/>').appendTo('#files');
            $.each(data.files, function (index, ) {
                var node = $('<p/>')
                node.appendTo(data.context);
            });
        })
            .on('fileuploadprocessalways', function (e, data) {
            var index = data.index,
                file = data.files[index],
                node = $(data.context.children()[index]);
            if (file.preview) {
                node
                    .prepend('<br>')
                    .prepend(file.preview);
            }
            if (file.error) {
                node
                    .append('<br>')
                    .append($('<span class="text-danger"/>').text(file.error));
            }
            if (index + 1 === data.files.length) {
                data.context.find('button')
                    .text('Upload')
                    .prop('disabled', !!data.files.error);
            }
        })
    });
</script>
<style>
    .img {
        width: 300px;	height: 300px; /* Размеры */
        /*background: #fc0; !* Цвет фона *!*/
        outline: 2px solid #000; /* Чёрная рамка */
        /*border: 3px solid #fff; !* Белая рамка *!*/
        /*border-radius: 10px; !* Радиус скругления *!*/
    }
    }
</style>
<script>
    function text (input, output) {
        var txtArea = document.getElementById(input);
        txtArea.addEventListener('keyup'/*or 'keydown' or 'keypress'*/, function () {
            var div = document.getElementById(output);
            div.innerHTML = txtArea.value;

        })

    }
    text('smt-kalk-title','smt-kalk-result');
    text('smt-kalk-title','smt-kalk-result1');
    text('smt-kalk-title','smt-kalk-result2');
    text('smt-kalk-title','smt-kalk-result3');
    text('smt-kalk-title','smt-kalk-result4');
    text('smt-kalk-title','smt-kalk-result5');
    text('smt-kalk-title','smt-kalk-result5');

    text('smt-kalk-description','smt-talk-result');
    text('smt-kalk-description','smt-talk-result1');
    text('smt-kalk-description','smt-talk-result2');
    text('smt-kalk-description','smt-talk-result3');
    text('smt-kalk-description','smt-talk-result4');
    text('smt-kalk-description','smt-talk-result5');

    $('textarea').val().replace(/ /g, ";");


    // var strings = new Array("first","second","third");
    // function press(event){
    //     if(event.keyCode==13){
    //         var values = document.getElementById("smt-kalk-description").value.split("\n");
    //         var str = values[values.length-2];
    //         var in_array = false;
    //         for(i=0;i<strings.length;i++){
    //             if(strings[i]==str){
    //                 in_array = true;
    //             }
    //         }
    //         if(!in_array) alert(document.getElementById("smt-kalk-description").value.split("<br/>"));
    //     }
    // }
</script>






<style type="text/css">

    td,select{
        width: 150px;
    }
    .harakt td div{
      width: 300px;
      height: 300px;
    }
    .harakt td div{
        display: none;
    }

</style>


<script>
    window.onload = function () {
        var a = document.querySelectorAll("select");
        Array.prototype.forEach.call(a, function (a, c) {
            a.onchange = function () {
                var a = document.querySelectorAll(".harakt thead td:nth-child(" + (c + 2) + ") div"),
                    d = this.selectedIndex || 0;
                Array.prototype.forEach.call(a, function (a, b) {
                    a.style.display = b == d ? "block" : "none"
                });
                a = document.querySelectorAll(".harakt tbody td:nth-child(" + (c + 2) + ") div");
                Array.prototype.forEach.call(a, function (a, b) {
                    a.style.display = b == d ? "block" : "none"
                })
            }
        })
    };
</script>


<style>
    * {
        margin:0;
        padding:0;
        font-family: tahoma;
    }

    .d {
        width: 270px;
        height: 40px;
        background-color: white;
        box-shadow: 1px 2px 3px #ededed;
        position:relative;
    }

    .fileupload input[type='file'] {
        width:270px;
        height:40px;
        opacity:0
    }

    #val {
        width: 170px;
        height:22px;
        position: absolute;
        top: 0;
        left: 0;
        font-size:11px;
        line-height: 22px;
        text-indent: 10px;
    }

    #button {
        text-align: center;
        display: block;
        width: 80px;
        background-color:darkgray;
        height:40px;
        color: white;
        position: absolute;
        right:0;
        top: 0;
        font-size: 11px;
        line-height: 40px;
    }

</style>
<script>
    $('#button').click(function(){
        $("input[type='file']").trigger('click');
    })

    $("input[type='file']").change(function(){
        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
    })
</script>
</body>
</html>
