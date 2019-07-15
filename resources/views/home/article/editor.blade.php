@extends('home.masters.user')
@section('title')
    iBook - 修改文章
@endsection
@section('content')
    <div class="container" style="margin-top: 10px">
        @foreach( $articles as $article)
            <form method="post" enctype="multipart/form-data" action="{{ route('editor',['id'=>$article->aid]) }}" id="article">
                {{ csrf_field() }}
                <input class="form-control" name="article-title" style="height: 50px;font-size: 20px" id="article-title"
                       placeholder="标题(必填)" value="{{ $article->title }}">
                <hr/>
                <div id="editor">
                    {{ readfile(URL::asset($article->content)) }}
                </div>
                <div class="col_full row">
                    <div class="col-sm-12">
                        <label for="article-brief">文章简介:</label>
                        <textarea name="article-brief" cols="58" rows="7" tabindex="4"
                                  class="form-control" id="article-brief">
                            {{ $article->brief }}
                        </textarea>
                    </div>
                </div>
                <div class="col_full row">
                    <div class="col-sm-6">
                        <label for="article-label">标签:</label>
                        <input id="article-label" name="article-tags" type="text" class="tags" value="{{ $article->tags }}"/>
                    </div>
                    <div class="col-sm-6">
                        <label for="article-item">栏目:</label>
                        <input id="article-item" name="article-item" type="text" class="tags" value="{{ $article->item }}"/>

                    </div>
                </div>
                <div class="col_full row">
                    <div class="col-sm-6">
                        <label for="article-type">文章类型:</label>
                        <select id="article-type" name="article-type" class="form-control">
                            <option value="{{ $article->type }}">{{ $article->type }}</option>
                            @foreach( $types as $type)
                                <option value="{{ $type->typename }}">{{ $type->typename }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="article-power">文章权限：</label>
                        <input type="radio" id="article-power"
                               name="article-power" class="radio radio-inline"
                               value="0"/>仅自己可见
                        <input type="radio" id="article-power"
                               name="article-power" class="radio radio-inline"
                               value="1"/>关注我的可见
                        <input type="radio" id="article-power"
                               name="article-power" class="radio radio-inline"
                               value="2" checked/>所有人可见
                    </div>
                </div>
                <div class="row upload_img">
                    <!--用来存放文件信息-->
                    <div class="btns col-sm-2">
                        <div id="picker">&nbsp;&nbsp;<i class="icon-tags"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上传封面
                        </div>
                    </div>
                    <div id="thelist" class="uploader-list col-sm-10">
                        <div class="file-item thumbnail col-sm-3" id="upload_old">
                            <i class="icon-line-square-cross" onclick="deleteFile(this)"></i>
                            <img src="{{ URL::asset($article->cover) }}">
                        </div>
                    </div>
                </div>
                <div class="col_full center">
                    <button class="button button-3d button-rounded button-amber" type="submit" id="upload">
                        <i class="icon-ok"></i>
                        <span>上传文章</span>
                    </button>
                </div>
                <input type="hidden" name="article-content" id="article-content">
                <input type="hidden" name="article-covers" id="article-covers" value="{{ $article->cover }}">
                <input type="hidden" name="article-id" id="article-id" value="{{ $article->aid }}">
                <input type="hidden" name="article-path" id="article-path" value="{{ $article->content }}">
            </form>
        @endforeach
    </div>
    <script type="text/javascript">
        //自定义添加标签
        $(function () {
            $('#article-label').tagsInput({width: 'auto'});
            $('#article-item').tagsInput({width: 'auto'});
        });

    </script>
    <!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->
    <script src="{{ URL::asset('home/lib/wangEditor-3.1.1/wangEditor-3.1.1/release/wangEditor.js') }}"></script>
    <script type="text/javascript">
        var E = window.wangEditor;
        var editor = new E('#editor');
        editor.customConfig.uploadImgShowBase64 = true   // 使用 base64 保存图片
        // 自定义配置颜色（字体颜色、背景色）
        editor.customConfig.colors = [
            '#000000',
            '#eeece0',
            '#1c487f',
            '#4d80bf',
            '#c24f4a',
            '#8baa4a',
            '#7b5ba1',
            '#46acc8',
            '#f9963b',
            '#ffffff',
            '#e7f359'
        ];
        // 自定义字体
        editor.customConfig.fontNames = [
            '宋体',
            '微软雅黑',
            'Arial',
            'Tahoma',
            'Verdana','Helvetica',
            '黑体','Georgia','华文细黑','中易宋体'
        ];
        editor.create();
        E.fullscreen.init('#editor');
    </script>
    <!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->
    <script src="{{ URL::asset('home/lib/webuploader-0.1.5/webuploader.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            var uploader = WebUploader.create({
                formData: {
                    _token: '{{ csrf_token() }}',
                },
                // 选完文件后，是否自动上传。
                auto: true,
                // 文件接收服务端。
                server: '{{ route('uploadCovers') }}',
                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#picker',
                // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
                resize: false,
                // 只允许选择图片文件。
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/*'
                },
                /* fileSizeLimit :10, //验证文件总大小是否超出限制, 超出则不允许加入队列
                fileSingleSizeLimit :10,   //验证单个文件大小是否超出限制, 超出则不允许加入队列。 */
                duplicate: true //去重， 根据文件名字、文件大小和最后修改时间来生成hash Key.

            });

            // 当文件被加入队列之前触发，此事件的handler返回值为false，则此文件不会被添加进入队列。
            uploader.on('beforeFileQueued', function (file) {
                // 限制图片数量
                var img_length = $("#thelist img").length;
                if (img_length >= 1) {
                    layer.msg("最多上传一张封面");
                    return false;
                }

            });

            // 当有文件添加进来的时候deleteFile(this)
            uploader.on('fileQueued', function (file) {
                document.getElementById('upload_old').style.display = "none";
                var $li = $(
                    '<div id="' + file.id + '" class="file-item thumbnail col-sm-3">' +
                    '<i class="icon-line-square-cross" onclick="deleteFile(this)"></i>' +
                    '<img>' +
                    '</div>'
                    ),
                    $img = $li.find('img');
                // $list为容器jQuery实例
                $("#thelist").append($li);
                // 创建缩略图
                // 如果为非图片文件，可以不用调用此方法。
                // thumbnailWidth x thumbnailHeight 为 100 x 100
                uploader.makeThumb(file, function (error, src) {
                    if (error) {
                        $img.replaceWith('<span>不能预览</span>');
                        return;
                    }
                    $img.attr('src', src);
                }, 167, 230);

            });

            // 文件上传成功，给item添加成功class, 用样式标记上传成功。
            uploader.on('uploadSuccess', function (file, response) {
                $('#' + file.id).addClass('upload-state-done');
                var $li = $('#' + file.id),
                    $done = $li.find('div.upload-state-done');
                // 避免重复创建
                if (!$done.length) {
                    $done = $('<div class=""></div>').appendTo($li);
                }
                layer.msg(response.Msg);
                //将返回结果添加到隐藏域中
                $('#article-covers').val(response.path);
            });

            // 文件上传失败，显示上传出错。
            uploader.on('uploadError', function (file) {
                var $li = $('#' + file.id),
                    $error = $li.find('div.error');
                // 避免重复创建
                if (!$error.length) {
                    $error = $('<div class="errors"></div>').appendTo($li);
                }
                layer.msg('文件上传失败')
            });
            // 文件上传过程中创建进度条实时显示。
            uploader.on('uploadProgress', function (file, percentage) {
                var $li = $('#' + file.id),
                    $percent = $li.find('.progress span');

                // 避免重复创建
                if (!$percent.length) {
                    $percent = $('<p class="progress"><span></span></p>')
                        .appendTo($li)
                        .find('span');
                }

                $percent.css('width', percentage * 100 + '%');
            });
            $("#ctlBtn").click(function () {
                uploader.upload();
            })

        });
        $(function () {
            var validate = $("#article").validate({
                debug: true, //调试模式取消submit的默认提交功能
                //errorClass: "label.errors", //默认为错误的样式类为：errors
                focusInvalid: false, //当为false时，验证无效时，没有焦点响应
                onkeyup: false,
                submitHandler: function (form) {   //表单提交句柄,为一回调函数，带一个参数：form
                    $('#article-content').val(editor.txt.html());
                    form.submit();   //提交表单
                },
                rules: {
                    'article-title': {
                        required: true
                    }
                },
                messages: {
                    'article-title': "请输入标题"
                }
            });
        });

        function deleteFile(obj) {
            $(obj).parent().remove();
        }
        $("#upload").on('click',function () {
            $('#article-content').val(editor.txt.html())
        })
    </script>
@endsection
