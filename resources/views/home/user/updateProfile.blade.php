@extends('home.masters.user')
@section('title')
    iBook - 完善个人信息
@endsection
@section('content')
    <script src="{{ URL::asset('home/lib/webuploader-0.1.5/webuploader.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $(function () {
                var uploader = WebUploader.create({
                    formData: {
                        _token: '{{ csrf_token() }}',
                        path: $('#path').val()
                    },
                    // 选完文件后，是否自动上传。
                    auto: true,
                    // 文件接收服务端。
                    server: '{{ route('uploadIcon') }}',
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
                        layer.msg("最多上传一张头像");
                        return false;
                    }

                });

                // 当有文件添加进来的时候deleteFile(this)
                uploader.on('fileQueued', function (file) {
                    document.getElementById('upload_old').style.display = "none";
                    var $li = $(
                        '<i class="icon-line-square-cross" onclick="deleteFile(this)"></i>' +
                        '<div id="' + file.id + '" class="comment-avatar clearfix" style="margin-left: 60px">' +
                        '<img class=\'avatar avatar-70 photo avatar-default\' height=\'80\'\n' +
                        'width=\'80\'>' +
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
                    }, 90, 90);

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
                    $("#icon").val(response.path)
                });

                // 文件上传失败，显示上传出错。
                uploader.on('uploadError', function (file) {
                    var $li = $('#' + file.id),
                        $error = $li.find('div.error');
                    // 避免重复创建
                    if (!$error.length) {
                        $error = $('<div class="errors"></div>').appendTo($li);
                    }
                    layer.msg('头像上传失败')
                });

            });

            $("#update-form").validate({
                errorClass: "error",
                errorElement: "span",
                wrapper: "label",
                errorContainer: $(".error"),
                rules: {
                    username: {
                        remote: {
                            url: "{{ url('index/checkUsername') }}",
                            type: "POST",
                            data: {
                                username: function () {
                                    return $('#username').val();
                                },
                                old: function () {
                                    return $('#old_username').val();
                                },
                                _token: '{{ csrf_token() }}'
                            }
                        }
                    },
                    email: {
                        remote: {
                            url: "{{ url('index/checkEmail') }}",
                            type: "POST",
                            data: {
                                email: function () {
                                    return $('#email').val();
                                },
                                old: function () {
                                    return $('#old_email').val();
                                },
                                _token: '{{ csrf_token() }}'
                            }
                        }
                    },
                    phone: {
                        remote: {
                            url: "{{ url('index/checkPhone') }}",
                            type: "POST",
                            data: {
                                phone: function () {
                                    return $('#phone').val();
                                },
                                old: function () {
                                    return $('#old_phone').val();
                                },
                                _token: '{{ csrf_token() }}'
                            }
                        },
                    }
                },
                messages: {
                    username: {
                        remote: "用户名已存在，请更换用户名",
                    },
                    email: {
                        email: "请输入合法的邮箱地址",
                        remote: "该邮箱已绑定其他用户",
                    },
                    phone: {
                        remote: "该手机号已绑定其他用户",
                    }
                }
            });
        });

        function deleteFile(obj) {
            $(obj).parent().remove();
        }
    </script>
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register"
                     style="max-width: 500px;">
                    <div class="tab-container">
                        <div class="tab-content clearfix" id="tab-login">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    @foreach( $user as $value)
                                        <form id="update-form" name="login-form" class="nobottommargin"
                                              action="{{ route('updateUser') }}"
                                              method="post">
                                            {{ csrf_field() }}
                                            <h3>完善个人信息</h3>
                                            <div class="col_full">

                                                <div class="row" style="width: 100%;height: 90px">
                                                    <div id="thelist" class="uploader-list col-sm-6">
                                                    <span class="comment-avatar clearfix" id="upload_old"
                                                          style="margin-left: 60px">
                                                        <img alt='{{ $value->username }}'
                                                             src="{{ URL::asset($value->icon) }}"
                                                             class='avatar avatar-70 photo avatar-default' height='80'
                                                             width='80'/>
                                                    </span>
                                                    </div>
                                                    <!--用来存放文件信息-->
                                                    <div class="btns col-sm-6" style="margin-top: 40px">
                                                        <div id="picker">上传头像</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col_full">
                                                <label for="username">
                                                    <small>*</small>
                                                    昵称:</label>
                                                <input type="text" id="username" name="username"
                                                       value="{{ $value->username }}" class="form-control"/>
                                                <input type="hidden" id="old_username" value="{{ $value->username }}">
                                                <div class="error"></div>
                                            </div>
                                            <div class="col_full">
                                                <label for="email">
                                                    <small>*</small>
                                                    Email: </label>
                                                <input type="email" id="email" name="email"
                                                       value="{{ $value->email }}"
                                                       class="required email form-control"/>
                                                <input type="hidden" id="old_email" value="{{ $value->email }}">
                                                <div class="error"></div>
                                            </div>
                                            <div class="col_full">
                                                <label for="phone">Phone: </label>
                                                <input type="text" id="phone" name="phone"
                                                       value="{{ $value->phone }}"
                                                       class="required phone form-control"/>
                                                <input type="hidden" id="old_phone" value="{{ $value->phone }}">
                                                <div class="error"></div>
                                            </div>

                                            <div class="col_full">
                                                <label for="sex">性别:</label>

                                                <input type="radio" id="sex1" class="radio radio-inline"
                                                       name="sex"
                                                       value="1"/>
                                                <label for="sex1">男</label>
                                                <input type="radio" id="sex2" class="radio radio-inline"
                                                       name="sex"
                                                       value="2"/>
                                                <label for="sex2">女</label>
                                                <input type="radio" id="sex3" class="radio radio-inline"
                                                       name="sex" checked
                                                       value="3"/>
                                                <label for="sex3">保密</label>

                                            </div>
                                            <div class="col_full">
                                                <label for="profile">个人介绍:</label>
                                                <textarea class="form-control" id="profile" name="profile">{{ $value->profile }}
                                                </textarea>
                                            </div>
                                            <div class="col_full">
                                                <label for="account">社交账号:</label>
                                                <div class="fright clearfix">
                                                    <a href="{{ url('auth/qq') }}"
                                                       class="social-icon si-small si-borderless si-facebook">
                                                        <i class="am-icon-qq"></i>
                                                        <i class="am-icon-qq"></i>
                                                    </a>

                                                </div>

                                                <div class="clear"></div>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $value->id }}">
                                            <div class="col_full nobottommargin">
                                                <button class="button button-rounded button-reveal button-large button-white button-light tright"
                                                        type="submit"
                                                        id="login-form-submit" name="login-form-submit" value="restore">
                                                    <i class="icon-circle-arrow-right"></i>
                                                    <span>保存</span>
                                                </button>
                                            </div>
                                            <input type="hidden" id="path" value="{{ $value->icon }}">
                                            <input type="hidden" name="icon" id="icon">
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- #content end -->
@endsection
