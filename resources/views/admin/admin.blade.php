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
    @include('admin.elements.left_side')
   <!-- Right side -->
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
            @yield('content')
           
        </div>
    </div>
    <div class="clear"></div>
</body>
</html>
