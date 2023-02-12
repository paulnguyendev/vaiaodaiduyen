@extends('admin.admin')
@section('navbar-right')
    <li><a href="{{ route('admin_profile/form') }}"><i class="icon-user"></i> <span class="hiden_1024_1350">Tài
                khoản</span></a>
    </li>
    <li><a href="{{ route('admin_auth/logout') }}"><i class="icon-switch2"></i> <span class="hiden_1024_1350">Thoát</span></a>
    </li>
@endsection
@section('content')
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
@endsection