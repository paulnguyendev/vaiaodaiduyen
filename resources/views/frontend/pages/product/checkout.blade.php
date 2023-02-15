@extends('frontend.main')
@section('content')
  
        <link href="{{asset('imgroup')}}/css/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css">
        <link href="{{asset('imgroup')}}/css/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css">
        <script src="{{asset('imgroup')}}/js/jquery.fancybox-1.3.4.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#this_map").fancybox({
                    openEffect: 'none',
                    closeEffect: 'none',

                    helpers: {
                        title: {
                            type: 'over'
                        }
                    }
                });
                $("#tabsmethod").tabs();
            });
        </script>
        <h3 class="title-h3 cart-title">Thanh toán</h3>
        <div class="cart-container">
            <form action="" id="formOrder" class="webForm" enctype="multipart/form-data" style="width:100%">
                <div>
                    <table style="float:left;">
                        <tbody>
                            <tr>
                                <td>
                                    <p class="checkoutTitle">Thông tin người mua</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Họ tên <span class="required">*</span></label>
                                    <input id="orderName" type="text" value="" class="validate[required]">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input id="orderAddress" type="text" value="" class="validate[required]">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Điện thoại <span class="required">*</span></label>
                                    <input id="orderPhone" type="text" value="" class="validate[required]">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Email <span class="required">*</span></label>
                                    <input id="orderEmail" type="text" value=""
                                        class="validate[required,custom[email]]">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Ghi chú</label>
                                    <textarea id="orderMessage" cols="5" rows="5" style="height:70px;"></textarea>
                                    <input type="hidden" id="lgorder" value="vn">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="float:right;">
                        <tbody>
                            <tr>
                                <td>
                                    <p class="checkoutTitle">Thông tin người nhận</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" onchange="copyInfo();" id="cbx_same">
                                    <label for="cbx_same" style="display:inline;">Thông tin người nhận giống người
                                        mua</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Họ tên <span class="required">*</span></label>
                                    <input id="receiveName" type="text" value="" class="validate[required]">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input id="receiveAddress" type="text" value="" class="validate[required]">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Điện thoại <span class="required">*</span></label>
                                    <input id="receivePhone" type="text" value="" class="validate[required]">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Email <span class="required">*</span></label>
                                    <input id="receiveEmail" type="text" value=""
                                        class="validate[required,custom[email]]">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="cl"></p>
                <div>
                    <p class="checkoutTitle">Thông tin thanh toán</p>
                    <div id="tabsmethod" style="text-align:center;"
                        class="ui-tabs ui-widget ui-widget-content ui-corner-all">
                        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">

                            <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a
                                    href="#tabs-0">Giao hàng thu tiền tận nơi</a></li>

                        </ul>
                        <div id="tabs-0" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
                            <div>
                                <p>
                                    <img alt="" src="/kcfinder/upload/images/Capture3.JPG"
                                        style="width: 249px; height: 217px;">
                                </p>
                                <p>
                                    &nbsp;</p>
                                <p>
                                    <span style="color:#0000cd;"><strong>Shop sẽ giao hàng và thu tiền tận nơi bạn
                                            nhé!</strong></span>
                                </p>
                                <p>
                                    &nbsp;</p>
                                <p>
                                    <span style="font-size:14px;"><span style="color:#0000cd;"><strong>Bạn vui lòng bấm vào
                                                nút "</strong></span><span style="color:#ff0000;"><strong>Đặt
                                                mua</strong></span><span style="color:#0000cd;"><strong>" bên dưới để hoàn
                                                tất đặt hàng.</strong></span></span>
                                </p>
                                <p>
                                    &nbsp;</p>
                            </div>
                            <input class="submit-order" type="submit" value="Đặt mua"
                                onclick="return checkoutSubmit('Tannoi')">
                        </div>
                    </div>
                </div>
            </form>
            <p class="cl"></p>
            <table class="gio-hang" style="margin-top:10px; border-collapse:collapse;">
                <tbody>
                    <tr class="cart-header">
                        <td>Stt</td>
                        <td>Hình</td>
                        <td>Sản Phẩm</td>
                        <td>Số Lượng</td>
                        <td>Giá bán</td>
                        <td>Thành Tiền</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><img src="/upload/images/vai-ao-dai-3d-dat-in-1619746868.jpg" width="100"
                                alt="Vải áo dài 3D đặt in"></td>
                        <td>
                            <p>Vải áo dài 3D đặt in</p>
                            <p><strong>Mã SP:</strong> A27706-0B50-977</p>
                        </td>
                        <td>1</td>
                        <td>195,000 vnđ</td>
                        <td><strong style="color:#FF0000;">195,000 vnđ</strong></td>
                    </tr>
                    <tr class="cart-header">
                        <td colspan="5" style="text-align:right;">Tổng Cộng</td>
                        <td>
                            <span style="color:#FF0000;">195,000 vnđ</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

@endsection
