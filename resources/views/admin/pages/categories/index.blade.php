@extends('admin.admin')
@section('content')
    <div class="control_frm" style="margin-top:25px;">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="admin.php?do=categories&amp;cid=121&amp;root=1"><span>Danh mục chính</span></a></li>
                <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <script language="javascript">
        function CheckDelete(l) {
            if (confirm('Bạn có chắc muốn xoá danh mục này?')) {
                location.href = l;
            }
        }
        function ChangeAction(str) {
            if (confirm("Bạn có chắc chắn?")) {
                document.f.action = str;
                document.f.submit();
            }
        }
        function TreeFilterChanged(value) {
            xmlHttp = GetXmlHttpObject();
            if (xmlHttp == null) {
                alert("Browser does not support HTTP Request");
                return;
            }
            var url = "ajax/check.php";
            url = url + "?id=" + value;
            url = url + "&sid=" + Math.random();
            xmlHttp.onreadystatechange = ReadyTreeFilterChanged;
            xmlHttp.open("GET", url, true);
            xmlHttp.send(null);
        }
        function ReadyTreeFilterChanged() {
            if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
                if (xmlHttp.responseText != "0")
                    location.href = "admin.php?do=categories&act=list&cid=" + xmlHttp.responseText + "&root=1";
                else {
                    alert('Danh mục này không phải thể loại có menu con!');
                }
            }
        }
    </script>
    <form name="f" id="f" method="post">
        <div class="control_frm" style="margin-top:0">
            <div style="float:left;">
                <input type="button" class="blueB" value="Thêm"
                    onclick="location.href='{{route('admin_categories/form')}}'">
                <input type="button" class="blueB" value="Hiện"
                    onclick="ChangeAction('admin.php?do=categories&amp;act=show&amp;cid=121&amp;root=1');return false;">
                <input type="button" class="blueB" value="Ẩn"
                    onclick="ChangeAction('admin.php?do=categories&amp;act=hide&amp;cid=121&amp;root=1');return false;">
                <input type="button" class="blueB" value="Xoá"
                    onclick="ChangeAction('admin.php?do=categories&amp;act=dellist&amp;cid=121&amp;root=1');return false;">
            </div>
            <div style="float:right;">
                <div class="selector">
                    <select name="cat" id="cat" onchange="TreeFilterChanged(this.value);">
                        <option value="1">Top</option>
                        <option value="121" selected="" style="color:#0000ff;font-weight:bold;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; Danh mục chính</option>
                        <option value="151" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; TRANG CHỦ</option>
                        <option value="154" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; VẢI ÁO DÀI ĐẸP
                        </option>
                        <option value="188" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI 3D ĐẶT IN</option>
                        <option value="172" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI CƯỚI HỎI, DẠ HỘI</option>
                        <option value="169" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI THÊU</option>
                        <option value="182" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI VẼ</option>
                        <option value="168" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI ĐÍNH ĐÁ, KẾT CƯỜM</option>
                        <option value="155" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI LỤA</option>
                        <option value="183" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI LỤA TRƠN</option>
                        <option value="156" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI LỤA THUN</option>
                        <option value="173" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI ĐẮP NHUNG</option>
                        <option value="174" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI GẤM</option>
                        <option value="185" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI CÁCH TÂN</option>
                        <option value="189" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI MẸ VÀ BÉ</option>
                        <option value="177" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI QUẦN ÁO DÀI</option>
                        <option value="186" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI VÁY, ÁO, ĐẦM</option>
                        <option value="175" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI HỌC SINH</option>
                        <option value="184" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI VÁY, ÁO, ĐẦM</option>
                        <option value="176" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            VẢI ÁO DÀI KHÁC</option>
                        <option value="190" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; ÁO DÀI MAY SẴN</option>
                        <option value="191" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            ÁO DÀI IN 3D MAY SẴN</option>
                        <option value="192" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            ÁO DÀI MÀU TRƠN MAY SẴN</option>
                        <option value="193" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt;
                            ÁO DÀI CÁCH TÂN MAY SẴN</option>
                        <option value="171" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; CÁCH CHỌN VẢI ÁO DÀI
                        </option>
                        <option value="179" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; LÀM ĐẸP</option>
                        <option value="178" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; SỰ KIỆN</option>
                        <option value="153" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; HỖ TRỢ</option>
                        <option value="152" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; LIÊN HỆ</option>
                        <option value="187" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; THỜI TRANG VNXK</option>
                        <option value="167" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; GIỚI THIỆU</option>
                        <option value="180" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; Hướng dẫn nhận quà
                        </option>
                        <option value="181" style="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; Cám ơn</option>
                    </select>
                </div>
            </div>
            <img src="{{ asset('imgroup') }}/images/admin/question-button.png" alt="Tooltip" class="icon_que tipS"
                style="float:right; margin:5px 5px 0 0;"
                original-title="Dùng để di chuyển đến các danh mục thuộc thể loại có menu con">
        </div>
        <div class="widget">
            <div class="title"><span class="titleIcon">
                    <div class="checker" id="uniform-titleCheck"><span><input type="checkbox" id="titleCheck"
                                name="titleCheck" style="opacity: 0;"></span></div>
                </span>
                <h6>Danh sách các danh mục</h6>
            </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
                <thead>
                    <tr>
                        <td></td>
                        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;"
                                original-title="">Thứ tự</a></td>
                        <td class="sortCol header">
                            <div>Tên danh mục<span></span></div>
                        </td>
                        <td class="sortCol header">
                            <div>Thể loại<span></span></div>
                        </td>
                        <td class="tb_data_small">Ẩn/Hiện</td>
                        <td>Thao tác</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="6"></td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>
                            <div class="checker" id="uniform-check0"><span><input type="checkbox" name="iddel[]"
                                        value="151" id="check0" style="opacity: 0;"></span></div>
                        </td>
                        <td align="center" style="border-left-color: rgb(203, 203, 203);">
                            <input type="text" value="1" name="ordering[]" onkeypress="return OnlyNumber(event)"
                                class="tipS smallText" original-title="Số thứ tự của danh mục, xếp từ nhỏ đến lớn"
                                id="number151" onchange="return updateNumber('categories', '151')">
                            <div id="ajaxloader"><img class="numloader" id="ajaxloader151" src="images/site/loader.gif"
                                    alt="loader"></div>
                        </td>
                        <td class="title_name_data">
                            <a href="admin.php?do=categories&amp;act=edit&amp;id=151&amp;cid=121&amp;root=1"
                                class="tipS SC_bold" original-title="">TRANG CHỦ</a>
                        </td>
                        <td align="center">
                            Trang chủ </td>
                        <td align="center">
                            <a href="admin.php?do=categories&amp;act=change_active&amp;cid=121&amp;id=151&amp;current=1&amp;root=1"
                                title="" class="smallButton tipS" original-title="Click để ẩn"><img
                                    src="{{ asset('imgroup') }}/images/admin/icons/color/tick.png" alt=""></a>
                        </td>
                        <td class="actBtns">
                            <a href="admin.php?do=categories&amp;act=edit&amp;id=151&amp;cid=121&amp;root=1"
                                title="" class="smallButton tipS" original-title="Sửa danh mục"><img
                                    src="{{ asset('imgroup') }}/images/admin/icons/dark/pencil.png" alt=""></a>
                            <a href=""
                                onclick="CheckDelete('admin.php?do=categories&amp;act=del&amp;id=151&amp;cid=121&amp;root=1'); return false;"
                                title="" class="smallButton tipS" original-title="Xóa danh mục"><img
                                    src="{{ asset('imgroup') }}/images/admin/icons/dark/close.png" alt=""></a>
                            <a href="/trang-chu/" target="_blank" title="" class="smallButton tipS"
                                original-title="Xem danh mục"><img src="{{ asset('imgroup') }}/images/admin/eye_inv.png"
                                    alt=""></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
@endsection
