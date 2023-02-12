<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CMS - Hệ thống quản trị nội dung</title>
    <link href="{{asset('imgroup')}}/css/main.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('imgroup')}}/images/favicon.jpg" type="image/x-icon" />

    <script type="text/javascript" src="{{asset('imgroup')}}/js/md5.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/spinner/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/forms/uniform.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/forms/jquery.cleditor.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/forms/jquery.validationEngine-vn.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/forms/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/forms/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/forms/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/wizard/jquery.form.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/wizard/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/tables/datatable.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/tables/tablesort.min.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/ui/jquery.tipsy.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/ui/jquery.collapsible.min.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/ui/jquery.sourcerer.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/ui/jquery.timeentry.min.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/ui/jquery.colorpicker.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/plugins/forms/jquery.dualListBox.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/js/jshashtable-2.1.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/js/jquery.numberformatter-1.2.2.min.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/js/custom.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/js/js_admin.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/js/function.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/js/ajax.js"></script>
    <script type="text/javascript" src="{{asset('imgroup')}}/js/md5.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval("myAjax();", 300000);
        });

        function myAjax() {
            $.post("/ajax.php", {},
                function(data) {});
        }
    </script>
</head>

<body>
    <!-- Left side content -->

    <script type="text/javascript">
        $(function() {
            $('#menu .activemenu .sub').css('display', 'block');
            $('#menu .activemenu a').removeClass('inactive');
        })
        $(document).ready(function(e) {
            var showed = localStorage['showed'];
            if (showed == "yes") {
                $('#show_hide_menu').css('display', 'block');
                $('#click_show').html('<span>&raquo; Ẩn bớt menu &laquo;</span>');
            }
            $('#click_show').click(function() {
                if ($('#show_hide_menu').is(':hidden') == true) {
                    $('#show_hide_menu').show('fast');
                    $('#click_show').html('<span>&raquo; Ẩn bớt menu &laquo;</span>');
                    localStorage['showed'] = "yes";
                } else {
                    $('#show_hide_menu').hide('fast');
                    $('#click_show').html('<span>&raquo; Hiển thị thêm menu &laquo;</span>');
                    localStorage['showed'] = "";
                }
            });
        });
    </script>

    <div id="leftSide">
        <div class="logo">
            <a href="#" target="_blank" onclick="return false;">
                <img src="{{asset('imgroup')}}/images/admin/logo.png" width="136" alt="" />
            </a>
        </div>
        <div class="sidebarSep mt0"></div>
        <div class="version-cms">CMS VERSION 5</div>
        <!-- Left navigation -->
        <ul id="menu" class="nav">
            <li class="dash" id="menu1"><a class=" active" title="" href="admin.php"><span>Trang
                        chủ</span></a></li>
            <li class="categories_li" id="menu2"><a href="/admin.php?do=categories&act=list&cid=121&root=1"
                    title="" class=""><span>Danh mục</span><strong></strong></a>
            </li>
            <li class="setting_li" id="menu8"><a href="/admin.php?do=infos" title="" class=""><span>Cấu
                        hình website</span><strong></strong></a>
            </li>
            <div style="display:none;" id="show_hide_menu">
                <li class="article_li" id="menu3"><a href="#" title="" class="exp"><span>Tin
                            tức</span><strong></strong></a>
                    <ul class="sub">
                        <li><a href="admin.php?do=articles" title="">Tất cả tin tức</a></li>
                        <li><a href="admin.php?do=articles&act=add" title="">Thêm tin tức</a></li>
                    </ul>
                </li>
                <li class="product_li" id="menu4"><a href="#" title="" class="exp"><span>Sản
                            phẩm</span><strong></strong></a>
                    <ul class="sub">
                        <li><a href="admin.php?do=products" title="">Tất cả sản phẩm</a></li>
                        <li><a href="admin.php?do=products&act=add" title="">Thêm sản phẩm</a></li>
                    </ul>
                </li>
                <li class="cart_li" id="menu5"><a href="#" title="" class="exp"><span>Bán
                            hàng</span><strong></strong></a>
                    <ul class="sub">
                        <li><a href="admin.php?do=orders" title="">Đơn hàng chưa hoàn thành</a></li>
                        <li><a href="admin.php?do=orders&act=finish" title="">Đơn hàng đã hoàn thành</a></li>
                        <li><a href="admin.php?do=payments" title="">Hệ thống thanh toán</a></li>
                        <li><a href="admin.php?do=thankyou" title="">Cấu hình bán hàng</a></li>
                    </ul>
                </li>
                <li class="ui" id="menu6"><a href="#" title="" class="exp"><span>Quản lý
                            website</span><strong></strong></a>
                    <ul class="sub">
                        <li><a href="admin.php?do=admin_groups" title="">Các nhóm quản trị viên & phân quyền</a>
                        </li>
                        <li><a href="admin.php?do=users" title="">Danh sách quản trị viên</a></li>
                        <li><a href="admin.php?do=userlog" title="">Theo dõi hoạt động quản trị viên</a></li>
                    </ul>
                </li>
                <li class="member_li" id="menu7"><a href="#" title="" class="exp"><span>Người
                            dùng</span><strong></strong></a>
                    <ul class="sub">
                        <li><a href="admin.php?do=contact_logs" title="">Danh sách liên hệ</a></li>
                        <li><a href="admin.php?do=comments" title="">Danh sách bình luận</a></li>
                    </ul>
                </li>
                <li class="template_li" id="menu10"><a href="#" title="" class="exp"><span>Giao
                            diện</span><strong></strong></a>
                    <ul class="sub">
                        <li><a href="admin.php?do=widgets&cid=1" title="">Widget cột trái</a></li>
                        <li><a href="admin.php?do=widgets&cid=2" title="">Widget cột phải</a></li>
                        <li><a href="admin.php?do=widgets&cid=3" title="">Widget trang chủ</a></li>
                        <li><a href="admin.php?do=widgets&cid=33" title="">Widget footer</a></li>
                        <li><a href="admin.php?do=img_group&act=detail&cid=1" title="">Hình Slider trang chủ</a>
                        </li>
                        <li><a href="admin.php?do=interface" title="">Các mẫu giao diện</a></li>
                        <li><a href="admin.php?do=popup" title="">Popup</a></li>
                        <li><a href="admin.php?do=exit_popup" title="">Exit Popup</a></li>
                    </ul>
                </li>
                <li class="marketing_li" id="menu11"><a href="#" title=""
                        class="exp"><span>Marketing Online</span><strong></strong></a>
                    <ul class="sub">
                        <li><a href="admin.php?do=nicks" title="">Nick hỗ trợ</a></li>
                    </ul>
                </li>
            </div>
            <li style="margin-top:30px;"><a href="#" class="exp" id="click_show"><span>&raquo; Hiển thị
                        thêm menu &laquo;</span></a></li>
        </ul>
    </div> <!-- Right side -->
    <div id="rightSide">
        <!-- Top fixed navigation -->
        <div class="topNav">
            <div class="wrapper">
                <div class="welcome"><a href="#" title=""><img src="{{asset('imgroup')}}/images/admin/userPic.png"
                            alt="" /></a><span>Xin chào, @dmin!</span></div>
                <div class="userNav">
                    <ul>
                        <li><a href="http://vaiaodaiduyen.com" title="" target="_blank"><img
                                    src="{{asset('imgroup')}}/images/admin/icons/topnav/mainWebsite.png" alt="" /><span>Vào trang
                                    web</span></a></li>
                        <li><a href="admin.php?do=profile" title=""><img
                                    src="{{asset('imgroup')}}/images/admin/icons/topnav/profile.png" alt="" /><span>Thông tin tài
                                    khoản</span></a></li>
                        <li class="ddnew"><a title=""><img src="{{asset('imgroup')}}/images/admin/icons/topnav/messages.png"
                                    alt="" /><span>Thông báo</span><span class="numberTop">1697</span></a>
                            <ul class="userMessage">
                                <li><a href="admin.php?do=orders" title="" class="sInbox"><span>Đơn hàng</span>
                                        <span class="numberTop"
                                            style="float:none; display:inline-block">1562</span></a></li>
                                <li><a href="admin.php?do=contact_logs" title="" class="sInbox"><span>Liên
                                            hệ</span> <span class="numberTop"
                                            style="float:none; display:inline-block">133</span></a></li>
                            </ul>
                        </li>
                        <li><a href="" id="userLogout" title=""><img
                                    src="{{asset('imgroup')}}/images/admin/icons/topnav/logout.png" alt="" /><span>Đăng
                                    xuất</span></a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="wrapper">

            <div class="widget">
                <div class="title">
                    <h6>Chào mừng bạn đến với CMS - HỆ THỐNG QUẢN TRỊ NỘI DUNG WEBSITE - Powered by <a
                            href="http://www.imgroup.vn" title="IM Group" target="_blank"><strong>IM
                                Group</strong></a></h6>
                    <div class="clear"></div>
                </div>
                <p>Nếu bạn có thắc mắc trong quá trình sử dụng CMS, xin vui lòng xem hướng dẫn tại <strong><a
                            href="http://support.imgroup.vn/su-dung-cms/cms-v5-0/"
                            target="_blank">http://support.imgroup.vn/su-dung-cms/cms-v5-0/</a></strong></p>
            </div>

            <div class="widgets">
                <div class="oneTwo">
                    <div class="widget">
                        <div class="title"><img src="{{asset('imgroup')}}/images/admin/article-icon.png" alt=""
                                class="titleIcon" />
                            <h6>QUẢN LÝ MENU - DANH MỤC CHÍNH</h6>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="sTable taskWidget">
                            <tbody>
                                <tr>
                                    <td style="text-align:left; padding:10px 20px;">
                                        <a class="suggest_link"
                                            href="/admin.php?do=categories&act=list&cid=121&root=1">&raquo; Click vào
                                            đây để quản lý menu &laquo;</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="oneTwo">
                    <div class="widget">
                        <div class="title"><img src="{{asset('imgroup')}}/images/admin/article-icon.png" alt=""
                                class="titleIcon" />
                            <h6>QUẢN LÝ CẤU HÌNH WEBSITE</h6>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="sTable taskWidget">
                            <tbody>
                                <tr>
                                    <td style="text-align:left; padding:10px 20px;">
                                        <a class="suggest_link" href="/admin.php?do=infos">&raquo; Click vào đây để
                                            quản lý cấu hình &laquo;</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="widgets">
                <div class="oneTwo">
                    <div class="widget">
                        <div class="title"><img src="{{asset('imgroup')}}/images/admin/article-icon.png" alt=""
                                class="titleIcon" />
                            <h6>QUẢN LÝ TIN TỨC</h6>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="sTable taskWidget">
                            <tbody>
                                <tr>
                                    <td style="text-align:left; padding:10px 20px;">
                                        <a class="suggest_link" href="/admin.php?do=articles">&raquo; Click vào đây để
                                            quản lý tin tức &laquo;</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="oneTwo">
                    <div class="widget">
                        <div class="title"><img src="{{asset('imgroup')}}/images/admin/article-icon.png" alt=""
                                class="titleIcon" />
                            <h6>QUẢN LÝ SẢN PHẨM</h6>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="sTable taskWidget">
                            <tbody>
                                <tr>
                                    <td style="text-align:left; padding:10px 20px;">
                                        <a class="suggest_link" href="/admin.php?do=products">&raquo; Click vào đây để
                                            quản lý sản phẩm &laquo;</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <style>
                .suggest_link {
                    font-size: 20px;
                    color: #f00 !important;
                }

                .suggest_link:hover {
                    text-decoration: underline;
                    color: #2B6893 !important;
                }
            </style>
        </div>
    </div>
    <div class="clear"></div>
</body>

</html>
