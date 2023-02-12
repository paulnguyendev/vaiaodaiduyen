@php
    $currentRoute = url()->current();
   
@endphp
<div id="leftSide">
    <div class="logo">
        <a href="#" target="_blank" onclick="return false;">
            <img src="{{ asset('imgroup') }}/images/admin/logo.png" width="136" alt="" />
        </a>
    </div>
    <div class="sidebarSep mt0"></div>
    <div class="version-cms">CMS VERSION 5</div>
    <!-- Left navigation -->
    <ul id="menu" class="nav">
        <li class="dash" id="menu1"><a class = "{{$currentRoute == route('admin/index') ? "active" : "" }} " title="" href="{{route('admin/index')}}"><span>Trang
                    chủ</span></a></li>
        <li class="categories_li" id="menu2">
            <a class = "{{$currentRoute == route('admin_categories/index') ? "active" : "" }} "  href="{{route('admin_categories/index')}}"
                title="" class=""><span>Danh mục</span><strong></strong></a>
        </li>
        <li class="setting_li" id="menu8"><a  class = "{{$currentRoute == route('admin_info/index') ? "active" : "" }} "  href="{{route('admin_info/index')}}" title="" class=""><span>Cấu
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
            <li class="marketing_li" id="menu11"><a href="#" title="" class="exp"><span>Marketing
                        Online</span><strong></strong></a>
                <ul class="sub">
                    <li><a href="admin.php?do=nicks" title="">Nick hỗ trợ</a></li>
                </ul>
            </li>
        </div>
        <li style="margin-top:30px;"><a href="#" class="exp" id="click_show"><span>&raquo; Hiển thị
                    thêm menu &laquo;</span></a></li>
    </ul>
</div>
