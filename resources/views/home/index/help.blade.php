@extends('home.masters.user')
@section('title')
    iBook - Help
@endsection
@section('content')
    <!-- Page Title
============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>帮助</h1>
            <span>常见问题查看，也可联系我们</span>
            <ol class="breadcrumb">
                <li class="active"><a href="#">Help</a></li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin clearfix">

                    <ul id="portfolio-filter" class="clearfix">

                        <li class="activeFilter"><a href="#" data-filter="all">All</a></li>
                        <li><a href="#" data-filter=".faq-account">账号信息</a></li>
                        <li><a href="#" data-filter=".faq-article">写文章</a></li>
                        <li><a href="#" data-filter=".faq-do">基本操作</a></li>
                        <li><a href="#" data-filter=".faq-itemdiscussion">普通用户</a></li>
                        <li><a href="#" data-filter=".faq-affiliates">合法用户</a></li>
                        <li><a href="#" data-filter=".faq-others">其他</a></li>
                    </ul>

                    <div class="clear"></div>

                    <div id="faqs" class="faqs">

                        <div class="toggle faq faq-article faq-affiliates">
                            <div class="togglet"><i class="toggle-closed icon-pencil2"></i><i
                                        class="toggle-open icon-pencil2"></i>如何写文章?
                            </div>
                            <div class="togglec">
                                必须合法注册并登录的用户才能上传文章，在首页和文章展示页面有写文章按钮，点击跳转到
                                上传文章页面。文章书写采用富文本形式，自定义样式，自定义上传封面，如未上传采用默认封面。
                                同时，可以自定义文章栏目，标签和分类，方便进行管理和搜索
                            </div>
                        </div>

                        <div class="toggle faq faq-article">
                            <div class="togglet"><i class="toggle-closed am-icon-copyright"></i><i
                                        class="toggle-open am-icon-copyright"></i>版权信息?
                            </div>
                            <div class="togglec">如果引用他人文章请注明出处
                            </div>
                        </div>

                        <div class="toggle faq faq-account">
                            <div class="togglet"><i class="toggle-closed icon-lock3"></i><i
                                        class="toggle-open icon-lock3"></i>用户状态禁用?
                            </div>
                            <div class="togglec">上传的文章会经过我们后台管理人员的审核，如果发现上传敏感信息或者不良言论，
                                管理员有权删除上传文章和禁用此账号，发现账号禁用请联系管理员解决
                            </div>
                        </div>

                        <div class="toggle faq faq-account faq-itemdiscussion">
                            <div class="togglet"><i class="toggle-closed icon-user4"></i><i
                                        class="toggle-open icon-user4"></i>如何注册账号?
                            </div>
                            <div class="togglec">注册账号可以采用普通的邮箱注册方式，会发送邮箱激活码，请及时激活。
                                还可以采用qq号第三方登录，采用此方式请完善密码后再进入系统。
                            </div>
                        </div>

                        <div class="toggle faq faq-account">
                            <div class="togglet"><i class="toggle-closed icon-ok"></i><i
                                        class="toggle-open icon-ok"></i>忘记密码如何找回?
                            </div>
                            <div class="togglec">合法用户可以修改个人信息，完善手机号和邮箱，忘记密码时可以在登录页面
                                点击忘记密码，然后根据绑定的手机号和邮箱发送验证码进行密码找回
                            </div>
                        </div>

                        <div class="toggle faq faq-itemdiscussion faq-do">
                            <div class="togglet"><i class="toggle-closed icon-book2"></i><i
                                        class="toggle-open icon-book2"></i>如何查看书籍?
                            </div>
                            <div class="togglec">网站首页会推送评论最高的热门文章和最新发布的文章，直接点击封面或者标题即可查看文章。
                                或者首页点击订阅书籍，查看所有文章，按照发布时间排序，可以点击封面或者标题查看
                            </div>
                        </div>

                        <div class="toggle faq faq-do faq-affiliates">
                            <div class="togglet"><i class="toggle-closed icon-plus"></i><i
                                        class="toggle-open icon-plus"></i>如何关注别人?
                            </div>
                            <div class="togglec">进入文章详情页面，会有作者信息，在作者头像旁边有关注按钮，可以直接点击关注按钮关注别人。
                                或者在文章展示时点击作者名称，进入作者的个人空间，同样头像旁边有关注按钮，可以点击关注。关注的账号，会显示在
                                我关注的人中，可以进行管理，其发布的文章会展示在关注文章中，可以进行查看
                            </div>
                        </div>

                        <div class="toggle faq faq-do faq-affiliates">
                            <div class="togglet"><i class="toggle-closed icon-heart3"></i><i
                                        class="toggle-open icon-heart3"></i>如何点赞和收藏?
                            </div>
                            <div class="togglec">文章详情页面在文章的内容的右下角，有一个大拇指和一个爱心，点击大拇指即为点赞文章，一个
                                账号可以多次点赞文章，点击爱心即为收藏，一个账号只能收藏一次文章，收藏的文章在收藏文章中管理
                            </div>
                        </div>

                        <div class="toggle faq faq-do faq-affiliates">
                            <div class="togglet"><i class="toggle-closed icon-comments-alt"></i><i
                                        class="toggle-open icon-comments-alt"></i>如何评论文章?
                            </div>
                            <div class="togglec">登录的合法用户，可以在文章详情展示页面的最下方进行评论，或者在标题下面点击评论数直接
                                跳转到评论的地方，填入要评论的内容，点击评论发布评论。发布的评论可以在评论管理中进行管理，可以管理别人对
                                自己文章的评论和自己对他人的评论
                            </div>
                        </div>

                        <div class="toggle faq faq-do faq-itemdiscussion">
                            <div class="togglet"><i class="toggle-closed icon-phone3"></i><i
                                        class="toggle-open icon-phone3"></i>如何联系我们?
                            </div>
                            <div class="togglec">如果发现网站有BUG或者有好的建议，可以采用邮箱方式联系我们。我们的邮箱在底部还有联系我们页面
                                都有，点击首页的联系我们还有导航栏的联系我们，都可以跳转到联系我们页面，进行信息的填写就可以将您宝贵的意见告诉我们
                            </div>
                        </div>

                        <div class="toggle faq faq-do faq-affiliates">
                            <div class="togglet"><i class="toggle-closed icon-file-settings"></i><i
                                        class="toggle-open icon-file-settings"></i>如何进行文章管理和栏目管理?
                            </div>
                            <div class="togglec">上传的文章会展示在个人中心和文章管理页面，进入文章管理可以进行管理，修改或者删除文章，可以修改
                                文章内容，栏目等信息或者展示权限，在栏目管理中也可以根据自己分类的栏目进行文章管理
                            </div>
                        </div>

                    </div>

                    <script type="text/javascript">
                        jQuery(document).ready(function ($) {
                            var $faqItems = $('#faqs .faq');
                            if (window.location.hash != '') {
                                var getFaqFilterHash = window.location.hash;
                                var hashFaqFilter = getFaqFilterHash.split('#');
                                if ($faqItems.hasClass(hashFaqFilter[1])) {
                                    $('#portfolio-filter li').removeClass('activeFilter');
                                    $('[data-filter=".' + hashFaqFilter[1] + '"]').parent('li').addClass('activeFilter');
                                    var hashFaqSelector = '.' + hashFaqFilter[1];
                                    $faqItems.css('display', 'none');
                                    if (hashFaqSelector != 'all') {
                                        $(hashFaqSelector).fadeIn(500);
                                    } else {
                                        $faqItems.fadeIn(500);
                                    }
                                }
                            }

                            $('#portfolio-filter a').click(function () {
                                $('#portfolio-filter li').removeClass('activeFilter');
                                $(this).parent('li').addClass('activeFilter');
                                var faqSelector = $(this).attr('data-filter');
                                $faqItems.css('display', 'none');
                                if (faqSelector != 'all') {
                                    $(faqSelector).fadeIn(500);
                                } else {
                                    $faqItems.fadeIn(500);
                                }
                                return false;
                            });
                        });
                    </script>

                </div><!-- .postcontent end -->

            </div>

        </div>

    </section><!-- #content end -->
@endsection

