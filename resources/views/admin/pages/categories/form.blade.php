@extends('admin.admin')
@section('content')
    <div class="control_frm" style="margin-top:25px;">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="admin.php?do=categories&amp;cid=121&amp;root=1"><span>Danh mục chính</span></a></li>
                <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <script type="text/javascript">
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
                if (xmlHttp.responseText != "0") {
                    //location.href = "admin.php?do=categories&act=add&cid="+xmlHttp.responseText;
                } else {
                    alert('Danh mục này không phải thể loại có menu con!');
                }
            }
        }
        function TreeFilterChanged2(value) {
            xmlHttp = GetXmlHttpObject();
            if (xmlHttp == null) {
                alert("Browser does not support HTTP Request");
                return;
            }
            var url = "ajax/check.php";
            url = url + "?id=" + value;
            url = url + "&sid=" + Math.random();
            xmlHttp.onreadystatechange = ReadyTreeFilterChanged2;
            xmlHttp.open("GET", url, true);
            xmlHttp.send(null);
        }
        function ReadyTreeFilterChanged2() {
            if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
                if (xmlHttp.responseText != "0") {
                    $('#validate').submit();
                } else {
                    alert('Danh mục này không phải thể loại có menu con!');
                }
            }
        }
        function alertWarning() {
            if (confirm("Các thông tin trong phần 'Nội dung SEO' sẽ bị trở về trạng thái ban đầu!")) {
                return CreateTitleSEO();
            }
        }
        function checkComponent(newcomp, oldcom, flag) {
            if (oldcom == 5) {
                alert('Đây là trang chủ, vui lòng không đổi thể loại!');
                location.reload();
            }
            if (oldcom == 23) {
                alert('Đây là trang liên hệ, vui lòng không đổi thể loại!');
                location.reload();
            }
            if (oldcom == 1) {
                if (!confirm(
                        "Nếu bạn đổi thể loại, các Bài viết trong danh mục này sẽ bị sai link! Cần cập nhật lại link!")) {
                    location.reload();
                }
            }
            if (oldcom == 2) {
                if (!confirm(
                        "Nếu bạn đổi thể loại, các Sản phẩm trong danh mục này sẽ bị sai link! Cần cập nhật lại link!")) {
                    location.reload();
                }
            }
            if ((oldcom == 9)) {
                if (!confirm(
                        "Nếu bạn đổi thể loại, các Danh mục con trong danh mục này sẽ bị sai link! Cần cập nhật lại link!"
                    )) {
                    location.reload();
                }
            }
            if (newcomp == 3) {
                $('.html_content_vn').show();
                if (flag == 1) {
                    $('.html_content_en').show();
                }
            } else {
                $('.html_content_vn').hide();
                $('.html_content_en').hide();
            }
        }
    </script>
    <form name="supplier" id="validate" class="form"
        action="admin.php?do=categories&amp;act=addsm&amp;cid=121&amp;root=1" method="post" enctype="multipart/form-data">
        <div class="widget">
            <div class="title"><img src="{{asset('imgroup')}}/images/admin/icons/dark/list.png" alt="" class="titleIcon">
                <h6>Nhập dữ liệu</h6>
            </div>
            <div class="formRow">
                <label>Danh mục cha</label>
                <div class="formRight">
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
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; ÁO DÀI MAY SẴN
                            </option>
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
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; CÁCH CHỌN VẢI ÁO
                                DÀI</option>
                            <option value="179" style="">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; LÀM ĐẸP</option>
                            <option value="178" style="">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; SỰ KIỆN</option>
                            <option value="153" style="">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; HỖ TRỢ</option>
                            <option value="152" style="">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; LIÊN HỆ</option>
                            <option value="187" style="">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; THỜI TRANG VNXK
                            </option>
                            <option value="167" style="">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; GIỚI THIỆU</option>
                            <option value="180" style="">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; Hướng dẫn nhận quà
                            </option>
                            <option value="181" style="">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-&gt; Cám ơn</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                    <span class="formNote">Hãy chọn những danh mục thuộc thể loại có menu con. Chú ý: 1 danh mục không
                        thể làm danh mục con của chính nó!</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Tên danh mục VN</label>
                <div class="formRight">
                    <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]" value=""
                        original-title="">
                    <span class="formNote">Nhập tên danh mục sẽ hiển thị ở trang tiếng Việt</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow" style="display:none;">
                <label>Tên danh mục EN</label>
                <div class="formRight">
                    <input type="text" name="name_en" class="tipS" value="" original-title="">
                    <span class="formNote">Nhập tên danh mục sẽ hiển thị ở trang tiếng Anh</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Chọn thể loại:</label>
                <div class="formRight">
                    <div class="selector">
                        <select name="comp" onchange="checkComponent(this.value, '', '0')">
                            <option value="1">Tin tức</option>
                            <option value="2">Sản phẩm</option>
                            <option value="3">Giới Thiệu</option>
                            <option value="9">Có menu con</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                    <span class="formNote">Mỗi thể loại có chức năng khác nhau. Ví dụ: loại Tin tức để chứa tin tức,
                        loại Sản phẩm để chứa sản phẩm, loại Có menu con để chứa các danh mục con khác.</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow html_content_vn" style="display:none;">
                <label>Nội dung chính VN: <img src="{{asset('imgroup')}}/images/admin/question-button.png" alt="Tooltip"
                        class="icon_que tipS"
                        original-title="Viết nội dung chính của danh mục hiển thị ở trang tiếng Việt"> </label>
                <div class="formRight">
                    <textarea name="content_vn" rows="8" cols="60" style="visibility: hidden; display: none;"></textarea><span id="cke_content_vn" class="cke_skin_kama cke_1 cke_editor_content_vn"
                        dir="ltr" title="" lang="vi" tabindex="0" role="application"
                        aria-labelledby="cke_content_vn_arialbl"><span id="cke_content_vn_arialbl"
                            class="cke_voice_label">Bộ soạn thảo</span><span class="cke_browser_webkit"
                            role="presentation"><span class="cke_wrapper cke_ltr" role="presentation">
                                <table class="cke_editor" border="0" cellspacing="0" cellpadding="0"
                                    role="presentation">
                                    <tbody>
                                        <tr role="presentation">
                                            <td id="cke_top_content_vn" class="cke_top" role="presentation">
                                                <div class="cke_toolbox" role="group" aria-labelledby="cke_7"
                                                    onmousedown="return false;"><span id="cke_7"
                                                        class="cke_voice_label">Editor toolbars</span><span id="cke_8"
                                                        class="cke_toolbar" aria-labelledby="cke_8_label"
                                                        role="toolbar"><span id="cke_8_label"
                                                            class="cke_voice_label">Document</span><span
                                                            class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                            role="presentation"><span class="cke_button"><a
                                                                    id="cke_9"
                                                                    class="cke_off cke_button_source" "="" href="javascript:void('Mã HTML')" title="Mã HTML" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_9_label" onkeydown="return CKEDITOR.tools.callFunction(4, event);" onfocus="return CKEDITOR.tools.callFunction(5, event);" onclick="CKEDITOR.tools.callFunction(6, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_9_label" class="cke_label">Mã HTML</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_10" class="cke_off cke_button_save" "=""
                                                                    href="javascript:void('Lưu')" title="Lưu"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_10_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(7, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(8, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(9, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_10_label"
                                                                        class="cke_label">Lưu</span></a></span><span
                                                                class="cke_button"><a id="cke_11"
                                                                    class="cke_off cke_button_newpage" "="" href="javascript:void('Trang mới')" title="Trang mới" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_11_label" onkeydown="return CKEDITOR.tools.callFunction(10, event);" onfocus="return CKEDITOR.tools.callFunction(11, event);" onclick="CKEDITOR.tools.callFunction(12, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_11_label" class="cke_label">Trang mới</span></a></span><span class="cke_button"><a id="cke_12" class="cke_off cke_button_preview" "=""
                                                                    href="javascript:void('Xem trước')" title="Xem trước"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_12_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(13, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(14, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(15, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_12_label" class="cke_label">Xem
                                                                        trước</span></a></span><span class="cke_button"><a
                                                                    id="cke_13"
                                                                    class="cke_off cke_button_print" "="" href="javascript:void('In')" title="In" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_13_label" onkeydown="return CKEDITOR.tools.callFunction(16, event);" onfocus="return CKEDITOR.tools.callFunction(17, event);" onclick="CKEDITOR.tools.callFunction(18, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_13_label" class="cke_label">In</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_14" class="cke_off cke_button_templates" "=""
                                                                    href="javascript:void('Mẫu dựng sẵn')"
                                                                    title="Mẫu dựng sẵn" tabindex="-1" hidefocus="true"
                                                                    role="button" aria-labelledby="cke_14_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(19, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(20, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(21, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_14_label" class="cke_label">Mẫu dựng
                                                                        sẵn</span></a></span></span><span
                                                            class="cke_toolbar_end"></span></span><span id="cke_15"
                                                        class="cke_toolbar" aria-labelledby="cke_15_label"
                                                        role="toolbar"><span id="cke_15_label"
                                                            class="cke_voice_label">Clipboard/Undo</span><span
                                                            class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                            role="presentation"><span class="cke_button"><a
                                                                    id="cke_16"
                                                                    class="cke_button_cut cke_disabled" "="" href="javascript:void('Cắt')" title="Cắt" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_16_label" onkeydown="return CKEDITOR.tools.callFunction(22, event);" onfocus="return CKEDITOR.tools.callFunction(23, event);" onclick="CKEDITOR.tools.callFunction(24, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_16_label" class="cke_label">Cắt</span></a></span><span class="cke_button"><a id="cke_17" class="cke_button_copy cke_disabled" "=""
                                                                    href="javascript:void('Sao chép')" title="Sao chép"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_17_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(25, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(26, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(27, this); return false;"
                                                                    aria-disabled="true"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_17_label" class="cke_label">Sao
                                                                        chép</span></a></span><span class="cke_button"><a
                                                                    id="cke_18"
                                                                    class="cke_off cke_button_paste" "="" href="javascript:void('Dán')" title="Dán" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_18_label" onkeydown="return CKEDITOR.tools.callFunction(28, event);" onfocus="return CKEDITOR.tools.callFunction(29, event);" onclick="CKEDITOR.tools.callFunction(30, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_18_label" class="cke_label">Dán</span></a></span><span class="cke_button"><a id="cke_19" class="cke_off cke_button_pastetext" "=""
                                                                    href="javascript:void('Dán theo định dạng văn bản thuần')"
                                                                    title="Dán theo định dạng văn bản thuần"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_19_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(31, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(32, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(33, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_19_label" class="cke_label">Dán theo
                                                                        định dạng văn bản thuần</span></a></span><span
                                                                class="cke_button"><a id="cke_20"
                                                                    class="cke_off cke_button_pastefromword" "="" href="javascript:void('Dán với định dạng Word')" title="Dán với định dạng Word" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_20_label" onkeydown="return CKEDITOR.tools.callFunction(34, event);" onfocus="return CKEDITOR.tools.callFunction(35, event);" onclick="CKEDITOR.tools.callFunction(36, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_20_label" class="cke_label">Dán với định dạng Word</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_21" class="cke_button_undo cke_disabled" "=""
                                                                    href="javascript:void('Khôi phục thao tác')"
                                                                    title="Khôi phục thao tác" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_21_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(37, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(38, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(39, this); return false;"
                                                                    aria-disabled="true"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_21_label" class="cke_label">Khôi phục
                                                                        thao tác</span></a></span><span
                                                                class="cke_button"><a id="cke_22"
                                                                    class="cke_button_redo cke_disabled" "="" href="javascript:void('Làm lại thao tác')" title="Làm lại thao tác" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_22_label" onkeydown="return CKEDITOR.tools.callFunction(40, event);" onfocus="return CKEDITOR.tools.callFunction(41, event);" onclick="CKEDITOR.tools.callFunction(42, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_22_label" class="cke_label">Làm lại thao tác</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_23" class="cke_toolbar" aria-labelledby="cke_23_label" role="toolbar"><span id="cke_23_label" class="cke_voice_label">Editing</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_24" class="cke_off cke_button_find" "=""
                                                                    href="javascript:void('Tìm kiếm')" title="Tìm kiếm"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_24_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(43, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(44, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(45, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_24_label" class="cke_label">Tìm
                                                                        kiếm</span></a></span><span class="cke_button"><a
                                                                    id="cke_25"
                                                                    class="cke_off cke_button_replace" "="" href="javascript:void('Thay thế')" title="Thay thế" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_25_label" onkeydown="return CKEDITOR.tools.callFunction(46, event);" onfocus="return CKEDITOR.tools.callFunction(47, event);" onclick="CKEDITOR.tools.callFunction(48, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_25_label" class="cke_label">Thay thế</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_26" class="cke_off cke_button_selectAll" "=""
                                                                    href="javascript:void('Chọn tất cả')"
                                                                    title="Chọn tất cả" tabindex="-1" hidefocus="true"
                                                                    role="button" aria-labelledby="cke_26_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(49, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(50, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(51, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_26_label" class="cke_label">Chọn tất
                                                                        cả</span></a></span><span class="cke_separator"
                                                                role="separator"></span><span class="cke_button"><a
                                                                    id="cke_27"
                                                                    class="cke_off cke_button_checkspell" "="" href="javascript:void('Kiểm tra chính tả')" title="Kiểm tra chính tả" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_27_label" onkeydown="return CKEDITOR.tools.callFunction(52, event);" onfocus="return CKEDITOR.tools.callFunction(53, event);" onclick="CKEDITOR.tools.callFunction(54, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_27_label" class="cke_label">Kiểm tra chính tả</span></a></span><span class="cke_button"><a id="cke_28" class="cke_off cke_button_scayt" "=""
                                                                    href="javascript:void('Kiểm tra chính tả ngay khi gõ chữ (SCAYT)')"
                                                                    title="Kiểm tra chính tả ngay khi gõ chữ (SCAYT)"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_28_label" aria-haspopup="true"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(55, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(56, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(57, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_28_label" class="cke_label">Kiểm tra
                                                                        chính tả ngay khi gõ chữ (SCAYT)</span><span
                                                                        class="cke_buttonarrow">&nbsp;</span></a></span></span><span
                                                            class="cke_toolbar_end"></span></span><span id="cke_29"
                                                        class="cke_toolbar" aria-labelledby="cke_29_label"
                                                        role="toolbar"><span id="cke_29_label"
                                                            class="cke_voice_label">Forms</span><span
                                                            class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                            role="presentation"><span class="cke_button"><a
                                                                    id="cke_30"
                                                                    class="cke_off cke_button_form" "="" href="javascript:void('Biểu mẫu')" title="Biểu mẫu" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_30_label" onkeydown="return CKEDITOR.tools.callFunction(58, event);" onfocus="return CKEDITOR.tools.callFunction(59, event);" onclick="CKEDITOR.tools.callFunction(60, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_30_label" class="cke_label">Biểu mẫu</span></a></span><span class="cke_button"><a id="cke_31" class="cke_off cke_button_checkbox" "=""
                                                                    href="javascript:void('Nút kiểm')" title="Nút kiểm"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_31_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(61, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(62, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(63, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_31_label" class="cke_label">Nút
                                                                        kiểm</span></a></span><span class="cke_button"><a
                                                                    id="cke_32"
                                                                    class="cke_off cke_button_radio" "="" href="javascript:void('Nút chọn')" title="Nút chọn" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_32_label" onkeydown="return CKEDITOR.tools.callFunction(64, event);" onfocus="return CKEDITOR.tools.callFunction(65, event);" onclick="CKEDITOR.tools.callFunction(66, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_32_label" class="cke_label">Nút chọn</span></a></span><span class="cke_button"><a id="cke_33" class="cke_off cke_button_textfield" "=""
                                                                    href="javascript:void('Trường văn bản')"
                                                                    title="Trường văn bản" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_33_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(67, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(68, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(69, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_33_label" class="cke_label">Trường văn
                                                                        bản</span></a></span><span class="cke_button"><a
                                                                    id="cke_34"
                                                                    class="cke_off cke_button_textarea" "="" href="javascript:void('Vùng văn bản')" title="Vùng văn bản" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_34_label" onkeydown="return CKEDITOR.tools.callFunction(70, event);" onfocus="return CKEDITOR.tools.callFunction(71, event);" onclick="CKEDITOR.tools.callFunction(72, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_34_label" class="cke_label">Vùng văn bản</span></a></span><span class="cke_button"><a id="cke_35" class="cke_off cke_button_select" "=""
                                                                    href="javascript:void('Ô chọn')" title="Ô chọn"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_35_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(73, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(74, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(75, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_35_label" class="cke_label">Ô
                                                                        chọn</span></a></span><span class="cke_button"><a
                                                                    id="cke_36"
                                                                    class="cke_off cke_button_button" "="" href="javascript:void('Nút')" title="Nút" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_36_label" onkeydown="return CKEDITOR.tools.callFunction(76, event);" onfocus="return CKEDITOR.tools.callFunction(77, event);" onclick="CKEDITOR.tools.callFunction(78, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_36_label" class="cke_label">Nút</span></a></span><span class="cke_button"><a id="cke_37" class="cke_off cke_button_imagebutton" "=""
                                                                    href="javascript:void('Nút hình ảnh')"
                                                                    title="Nút hình ảnh" tabindex="-1" hidefocus="true"
                                                                    role="button" aria-labelledby="cke_37_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(79, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(80, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(81, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_37_label" class="cke_label">Nút hình
                                                                        ảnh</span></a></span><span class="cke_button"><a
                                                                    id="cke_38"
                                                                    class="cke_off cke_button_hiddenfield" "="" href="javascript:void('Trường ẩn')" title="Trường ẩn" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_38_label" onkeydown="return CKEDITOR.tools.callFunction(82, event);" onfocus="return CKEDITOR.tools.callFunction(83, event);" onclick="CKEDITOR.tools.callFunction(84, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_38_label" class="cke_label">Trường ẩn</span></a></span></span><span class="cke_toolbar_end"></span></span><div class="cke_break"></div><span id="cke_39" class="cke_toolbar" aria-labelledby="cke_39_label" role="toolbar"><span id="cke_39_label" class="cke_voice_label">Basic Styles</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_40" class="cke_off cke_button_bold" "=""
                                                                    href="javascript:void('Đậm')" title="Đậm"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_40_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(85, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(86, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(87, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_40_label"
                                                                        class="cke_label">Đậm</span></a></span><span
                                                                class="cke_button"><a id="cke_41"
                                                                    class="cke_off cke_button_italic" "="" href="javascript:void('Nghiêng')" title="Nghiêng" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_41_label" onkeydown="return CKEDITOR.tools.callFunction(88, event);" onfocus="return CKEDITOR.tools.callFunction(89, event);" onclick="CKEDITOR.tools.callFunction(90, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_41_label" class="cke_label">Nghiêng</span></a></span><span class="cke_button"><a id="cke_42" class="cke_off cke_button_underline" "=""
                                                                    href="javascript:void('Gạch chân')" title="Gạch chân"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_42_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(91, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(92, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(93, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_42_label" class="cke_label">Gạch
                                                                        chân</span></a></span><span class="cke_button"><a
                                                                    id="cke_43"
                                                                    class="cke_off cke_button_strike" "="" href="javascript:void('Gạch xuyên ngang')" title="Gạch xuyên ngang" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_43_label" onkeydown="return CKEDITOR.tools.callFunction(94, event);" onfocus="return CKEDITOR.tools.callFunction(95, event);" onclick="CKEDITOR.tools.callFunction(96, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_43_label" class="cke_label">Gạch xuyên ngang</span></a></span><span class="cke_button"><a id="cke_44" class="cke_off cke_button_subscript" "=""
                                                                    href="javascript:void('Chỉ số dưới')"
                                                                    title="Chỉ số dưới" tabindex="-1" hidefocus="true"
                                                                    role="button" aria-labelledby="cke_44_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(97, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(98, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(99, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_44_label" class="cke_label">Chỉ số
                                                                        dưới</span></a></span><span class="cke_button"><a
                                                                    id="cke_45"
                                                                    class="cke_off cke_button_superscript" "="" href="javascript:void('Chỉ số trên')" title="Chỉ số trên" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_45_label" onkeydown="return CKEDITOR.tools.callFunction(100, event);" onfocus="return CKEDITOR.tools.callFunction(101, event);" onclick="CKEDITOR.tools.callFunction(102, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_45_label" class="cke_label">Chỉ số trên</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_46" class="cke_off cke_button_removeFormat" "=""
                                                                    href="javascript:void('Xoá định dạng')"
                                                                    title="Xoá định dạng" tabindex="-1" hidefocus="true"
                                                                    role="button" aria-labelledby="cke_46_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(103, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(104, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(105, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_46_label" class="cke_label">Xoá định
                                                                        dạng</span></a></span></span><span
                                                            class="cke_toolbar_end"></span></span><span id="cke_47"
                                                        class="cke_toolbar" aria-labelledby="cke_47_label"
                                                        role="toolbar"><span id="cke_47_label"
                                                            class="cke_voice_label">Paragraph</span><span
                                                            class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                            role="presentation"><span class="cke_button"><a
                                                                    id="cke_48"
                                                                    class="cke_off cke_button_numberedlist" "="" href="javascript:void('Danh sách có thứ tự')" title="Danh sách có thứ tự" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_48_label" onkeydown="return CKEDITOR.tools.callFunction(106, event);" onfocus="return CKEDITOR.tools.callFunction(107, event);" onclick="CKEDITOR.tools.callFunction(108, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_48_label" class="cke_label">Danh sách có thứ tự</span></a></span><span class="cke_button"><a id="cke_49" class="cke_off cke_button_bulletedlist" "=""
                                                                    href="javascript:void('Danh sách không thứ tự')"
                                                                    title="Danh sách không thứ tự" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_49_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(109, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(110, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(111, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_49_label" class="cke_label">Danh sách
                                                                        không thứ tự</span></a></span><span
                                                                class="cke_separator" role="separator"></span><span
                                                                class="cke_button"><a id="cke_50"
                                                                    class="cke_button_outdent cke_disabled" "="" href="javascript:void('Dịch ra ngoài')" title="Dịch ra ngoài" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_50_label" onkeydown="return CKEDITOR.tools.callFunction(112, event);" onfocus="return CKEDITOR.tools.callFunction(113, event);" onclick="CKEDITOR.tools.callFunction(114, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_50_label" class="cke_label">Dịch ra ngoài</span></a></span><span class="cke_button"><a id="cke_51" class="cke_off cke_button_indent" "=""
                                                                    href="javascript:void('Dịch vào trong')"
                                                                    title="Dịch vào trong" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_51_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(115, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(116, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(117, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_51_label" class="cke_label">Dịch vào
                                                                        trong</span></a></span><span class="cke_separator"
                                                                role="separator"></span><span class="cke_button"><a
                                                                    id="cke_52"
                                                                    class="cke_off cke_button_blockquote" "="" href="javascript:void('Khối trích dẫn')" title="Khối trích dẫn" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_52_label" onkeydown="return CKEDITOR.tools.callFunction(118, event);" onfocus="return CKEDITOR.tools.callFunction(119, event);" onclick="CKEDITOR.tools.callFunction(120, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_52_label" class="cke_label">Khối trích dẫn</span></a></span><span class="cke_button"><a id="cke_53" class="cke_off cke_button_creatediv" "=""
                                                                    href="javascript:void('Tạo khối các thành phần')"
                                                                    title="Tạo khối các thành phần" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_53_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(121, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(122, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(123, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_53_label" class="cke_label">Tạo khối
                                                                        các thành phần</span></a></span><span
                                                                class="cke_separator" role="separator"></span><span
                                                                class="cke_button"><a id="cke_54"
                                                                    class="cke_off cke_button_justifyleft" "="" href="javascript:void('Canh trái')" title="Canh trái" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_54_label" onkeydown="return CKEDITOR.tools.callFunction(124, event);" onfocus="return CKEDITOR.tools.callFunction(125, event);" onclick="CKEDITOR.tools.callFunction(126, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_54_label" class="cke_label">Canh trái</span></a></span><span class="cke_button"><a id="cke_55" class="cke_off cke_button_justifycenter" "=""
                                                                    href="javascript:void('Canh giữa')" title="Canh giữa"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_55_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(127, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(128, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(129, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_55_label" class="cke_label">Canh
                                                                        giữa</span></a></span><span class="cke_button"><a
                                                                    id="cke_56"
                                                                    class="cke_off cke_button_justifyright" "="" href="javascript:void('Canh phải')" title="Canh phải" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_56_label" onkeydown="return CKEDITOR.tools.callFunction(130, event);" onfocus="return CKEDITOR.tools.callFunction(131, event);" onclick="CKEDITOR.tools.callFunction(132, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_56_label" class="cke_label">Canh phải</span></a></span><span class="cke_button"><a id="cke_57" class="cke_off cke_button_justifyblock" "=""
                                                                    href="javascript:void('Canh đều')" title="Canh đều"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_57_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(133, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(134, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(135, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_57_label" class="cke_label">Canh
                                                                        đều</span></a></span><span class="cke_separator"
                                                                role="separator"></span><span class="cke_button"><a
                                                                    id="cke_58"
                                                                    class="cke_off cke_button_bidiltr" "="" href="javascript:void('Text direction from left to right')" title="Text direction from left to right" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_58_label" onkeydown="return CKEDITOR.tools.callFunction(136, event);" onfocus="return CKEDITOR.tools.callFunction(137, event);" onclick="CKEDITOR.tools.callFunction(138, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_58_label" class="cke_label">Text direction from left to right</span></a></span><span class="cke_button"><a id="cke_59" class="cke_off cke_button_bidirtl" "=""
                                                                    href="javascript:void('Text direction from right to left')"
                                                                    title="Text direction from right to left"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_59_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(139, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(140, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(141, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_59_label" class="cke_label">Text
                                                                        direction from right to
                                                                        left</span></a></span></span><span
                                                            class="cke_toolbar_end"></span></span><span id="cke_60"
                                                        class="cke_toolbar" aria-labelledby="cke_60_label"
                                                        role="toolbar"><span id="cke_60_label"
                                                            class="cke_voice_label">Links</span><span
                                                            class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                            role="presentation"><span class="cke_button"><a
                                                                    id="cke_61"
                                                                    class="cke_off cke_button_link" "="" href="javascript:void('Chèn/Sửa liên kết')" title="Chèn/Sửa liên kết" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_61_label" onkeydown="return CKEDITOR.tools.callFunction(142, event);" onfocus="return CKEDITOR.tools.callFunction(143, event);" onclick="CKEDITOR.tools.callFunction(144, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_61_label" class="cke_label">Chèn/Sửa liên kết</span></a></span><span class="cke_button"><a id="cke_62" class="cke_button_unlink cke_disabled" "=""
                                                                    href="javascript:void('Xoá liên kết')"
                                                                    title="Xoá liên kết" tabindex="-1" hidefocus="true"
                                                                    role="button" aria-labelledby="cke_62_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(145, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(146, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(147, this); return false;"
                                                                    aria-disabled="true"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_62_label" class="cke_label">Xoá liên
                                                                        kết</span></a></span><span class="cke_button"><a
                                                                    id="cke_63"
                                                                    class="cke_off cke_button_anchor" "="" href="javascript:void('Chèn/Sửa điểm neo')" title="Chèn/Sửa điểm neo" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_63_label" onkeydown="return CKEDITOR.tools.callFunction(148, event);" onfocus="return CKEDITOR.tools.callFunction(149, event);" onclick="CKEDITOR.tools.callFunction(150, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_63_label" class="cke_label">Chèn/Sửa điểm neo</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_64" class="cke_toolbar" aria-labelledby="cke_64_label" role="toolbar"><span id="cke_64_label" class="cke_voice_label">Insert</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_65" class="cke_off cke_button_image" "=""
                                                                    href="javascript:void('Hình ảnh')" title="Hình ảnh"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_65_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(151, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(152, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(153, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_65_label" class="cke_label">Hình
                                                                        ảnh</span></a></span><span class="cke_button"><a
                                                                    id="cke_66"
                                                                    class="cke_off cke_button_flash" "="" href="javascript:void('Flash')" title="Flash" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_66_label" onkeydown="return CKEDITOR.tools.callFunction(154, event);" onfocus="return CKEDITOR.tools.callFunction(155, event);" onclick="CKEDITOR.tools.callFunction(156, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_66_label" class="cke_label">Flash</span></a></span><span class="cke_button"><a id="cke_67" class="cke_off cke_button_table" "=""
                                                                    href="javascript:void('Bảng')" title="Bảng"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_67_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(157, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(158, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(159, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_67_label"
                                                                        class="cke_label">Bảng</span></a></span><span
                                                                class="cke_button"><a id="cke_68"
                                                                    class="cke_off cke_button_horizontalrule" "="" href="javascript:void('Chèn đường phân cách ngang')" title="Chèn đường phân cách ngang" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_68_label" onkeydown="return CKEDITOR.tools.callFunction(160, event);" onfocus="return CKEDITOR.tools.callFunction(161, event);" onclick="CKEDITOR.tools.callFunction(162, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_68_label" class="cke_label">Chèn đường phân cách ngang</span></a></span><span class="cke_button"><a id="cke_69" class="cke_off cke_button_smiley" "=""
                                                                    href="javascript:void('Hình biểu lộ cảm xúc (mặt cười)')"
                                                                    title="Hình biểu lộ cảm xúc (mặt cười)"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_69_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(163, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(164, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(165, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_69_label" class="cke_label">Hình
                                                                        biểu lộ cảm xúc (mặt
                                                                        cười)</span></a></span><span class="cke_button"><a
                                                                    id="cke_70"
                                                                    class="cke_off cke_button_specialchar" "="" href="javascript:void('Chèn ký tự đặc biệt')" title="Chèn ký tự đặc biệt" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_70_label" onkeydown="return CKEDITOR.tools.callFunction(166, event);" onfocus="return CKEDITOR.tools.callFunction(167, event);" onclick="CKEDITOR.tools.callFunction(168, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_70_label" class="cke_label">Chèn ký tự đặc biệt</span></a></span><span class="cke_button"><a id="cke_71" class="cke_off cke_button_pagebreak" "=""
                                                                    href="javascript:void('Chèn ngắt trang')"
                                                                    title="Chèn ngắt trang" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_71_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(169, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(170, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(171, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_71_label" class="cke_label">Chèn
                                                                        ngắt trang</span></a></span><span
                                                                class="cke_button"><a id="cke_72"
                                                                    class="cke_off cke_button_iframe" "="" href="javascript:void('IFrame')" title="IFrame" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_72_label" onkeydown="return CKEDITOR.tools.callFunction(172, event);" onfocus="return CKEDITOR.tools.callFunction(173, event);" onclick="CKEDITOR.tools.callFunction(174, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_72_label" class="cke_label">IFrame</span></a></span></span><span class="cke_toolbar_end"></span></span><div class="cke_break"></div><span id="cke_74" class="cke_toolbar" aria-labelledby="cke_74_label" role="toolbar"><span id="cke_74_label" class="cke_voice_label">Styles</span><span class="cke_toolbar_start"></span><span class="cke_rcombo" role="presentation"><span id="cke_73" class="cke_styles cke_off" role="presentation"><span id="cke_73_label" class="cke_label">Kiểu</span><a hidefocus="true" title="Phong cách định dạng" tabindex="-1" href="javascript:void('Kiểu')" role="button" aria-labelledby="cke_73_label" aria-describedby="cke_73_text" aria-haspopup="true" onkeydown="CKEDITOR.tools.callFunction( 176, event, this );" onfocus="return CKEDITOR.tools.callFunction(177, event);" onclick="CKEDITOR.tools.callFunction(175, this); return false;"><span><span id="cke_73_text" class="cke_text cke_inline_label">Kiểu</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span><span class="cke_rcombo" role="presentation"><span id="cke_75" class="cke_format cke_off" role="presentation"><span id="cke_75_label" class="cke_label">Định dạng</span><a hidefocus="true" title="Định dạng" tabindex="-1" href="javascript:void('Định dạng')" role="button" aria-labelledby="cke_75_label" aria-describedby="cke_75_text" aria-haspopup="true" onkeydown="CKEDITOR.tools.callFunction( 179, event, this );" onfocus="return CKEDITOR.tools.callFunction(180, event);" onclick="CKEDITOR.tools.callFunction(178, this); return false;"><span><span id="cke_75_text" class="cke_text cke_inline_label">Định dạng</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span><span class="cke_rcombo" role="presentation"><span id="cke_76" class="cke_font cke_off" role="presentation"><span id="cke_76_label" class="cke_label">Phông</span><a hidefocus="true" title="Phông" tabindex="-1" href="javascript:void('Phông')" role="button" aria-labelledby="cke_76_label" aria-describedby="cke_76_text" aria-haspopup="true" onkeydown="CKEDITOR.tools.callFunction( 182, event, this );" onfocus="return CKEDITOR.tools.callFunction(183, event);" onclick="CKEDITOR.tools.callFunction(181, this); return false;"><span><span id="cke_76_text" class="cke_text cke_inline_label">Phông</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span><span class="cke_rcombo" role="presentation"><span id="cke_77" class="cke_fontSize cke_off" role="presentation"><span id="cke_77_label" class="cke_label">Cỡ chữ</span><a hidefocus="true" title="Cỡ chữ" tabindex="-1" href="javascript:void('Cỡ chữ')" role="button" aria-labelledby="cke_77_label" aria-describedby="cke_77_text" aria-haspopup="true" onkeydown="CKEDITOR.tools.callFunction( 185, event, this );" onfocus="return CKEDITOR.tools.callFunction(186, event);" onclick="CKEDITOR.tools.callFunction(184, this); return false;"><span><span id="cke_77_text" class="cke_text cke_inline_label">Cỡ chữ</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_78" class="cke_toolbar" aria-labelledby="cke_78_label" role="toolbar"><span id="cke_78_label" class="cke_voice_label">Colors</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_79" class="cke_off cke_button_textcolor" "=""
                                                                    href="javascript:void('Màu chữ')" title="Màu chữ"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_79_label" aria-haspopup="true"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(187, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(188, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(189, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_79_label" class="cke_label">Màu
                                                                        chữ</span><span
                                                                        class="cke_buttonarrow">&nbsp;</span></a></span><span
                                                                class="cke_button"><a id="cke_80"
                                                                    class="cke_off cke_button_bgcolor" "="" href="javascript:void('Màu nền')" title="Màu nền" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_80_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(190, event);" onfocus="return CKEDITOR.tools.callFunction(191, event);" onclick="CKEDITOR.tools.callFunction(192, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_80_label" class="cke_label">Màu nền</span><span class="cke_buttonarrow">&nbsp;</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_81" class="cke_toolbar" aria-labelledby="cke_81_label" role="toolbar"><span id="cke_81_label" class="cke_voice_label">Tools</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_82" class="cke_off cke_button_maximize" "=""
                                                                    href="javascript:void('Phóng to tối đa')"
                                                                    title="Phóng to tối đa" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_82_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(193, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(194, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(195, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_82_label" class="cke_label">Phóng to
                                                                        tối đa</span></a></span><span
                                                                class="cke_button"><a id="cke_83"
                                                                    class="cke_off cke_button_showblocks" "="" href="javascript:void('Hiển thị các khối')" title="Hiển thị các khối" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_83_label" onkeydown="return CKEDITOR.tools.callFunction(196, event);" onfocus="return CKEDITOR.tools.callFunction(197, event);" onclick="CKEDITOR.tools.callFunction(198, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_83_label" class="cke_label">Hiển thị các khối</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_84" class="cke_off cke_button_about" "=""
                                                                    href="javascript:void('Thông tin về CKEditor')"
                                                                    title="Thông tin về CKEditor" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_84_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(199, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(200, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(201, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_84_label" class="cke_label">Thông
                                                                        tin về CKEditor</span></a></span></span><span
                                                            class="cke_toolbar_end"></span></span></div><a
                                                    title="Thu gọn thanh công cụ" id="cke_85" tabindex="-1"
                                                    class="cke_toolbox_collapser"
                                                    onclick="CKEDITOR.tools.callFunction(202)"><span>▲</span></a>
                                            </td>
                                        </tr>
                                        <tr role="presentation">
                                            <td id="cke_contents_content_vn" class="cke_contents" style="height:300px"
                                                role="presentation"><iframe style="width:100%;height:100%"
                                                    frameborder="0"
                                                    title="Bộ soạn thảo, content_vn, nhấn ALT + 0 để xem hướng dẫn."
                                                    src="" tabindex="-1" allowtransparency="true"></iframe>
                                            </td>
                                        </tr>
                                        <tr role="presentation">
                                            <td id="cke_bottom_content_vn" class="cke_bottom" role="presentation">
                                                <div class="cke_resizer cke_resizer_ltr"
                                                    title="Kéo rê để thay đổi kích cỡ"
                                                    onmousedown="CKEDITOR.tools.callFunction(3, event)"></div><span
                                                    id="cke_path_content_vn_label" class="cke_voice_label">Nhãn
                                                    thành phần</span>
                                                <div id="cke_path_content_vn" class="cke_path" role="group"
                                                    aria-labelledby="cke_path_content_vn_label"><span
                                                        class="cke_empty">&nbsp;</span></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <style>
                                    .cke_skin_kama {
                                        visibility: hidden;
                                    }
                                </style>
                            </span></span></span>
                    <script type="text/javascript">
                        //<![CDATA[
                        window.CKEDITOR_BASEPATH = 'ckeditor/';
                        //]]>
                    </script>
                    <script type="text/javascript" src="ckeditor/ckeditor.js?t=B5GJ5GG"></script>
                    <script type="text/javascript">
                        //<![CDATA[
                        CKEDITOR.replace('content_vn', {
                            "height": 300
                        });
                        //]]>
                    </script>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow html_content_en" style="display:none;">
                <label>Nội dung chính EN: <img src="{{asset('imgroup')}}/images/admin/question-button.png" alt="Tooltip"
                        class="icon_que tipS"
                        original-title="Viết nội dung chính của danh mục hiển thị ở trang tiếng Anh"> </label>
                <div class="formRight">
                    <textarea name="content_en" rows="8" cols="60" style="visibility: hidden; display: none;"></textarea><span id="cke_content_en"
                        class="cke_skin_kama cke_2 cke_editor_content_en" dir="ltr" title=""
                        lang="vi" tabindex="0" role="application"
                        aria-labelledby="cke_content_en_arialbl"><span id="cke_content_en_arialbl"
                            class="cke_voice_label">Bộ soạn thảo</span><span class="cke_browser_webkit"
                            role="presentation"><span class="cke_wrapper cke_ltr" role="presentation">
                                <table class="cke_editor" border="0" cellspacing="0" cellpadding="0"
                                    role="presentation">
                                    <tbody>
                                        <tr role="presentation">
                                            <td id="cke_top_content_en" class="cke_top" role="presentation">
                                                <div class="cke_toolbox" role="group" aria-labelledby="cke_95"
                                                    onmousedown="return false;"><span id="cke_95"
                                                        class="cke_voice_label">Editor toolbars</span><span
                                                        id="cke_96" class="cke_toolbar"
                                                        aria-labelledby="cke_96_label" role="toolbar"><span
                                                            id="cke_96_label"
                                                            class="cke_voice_label">Document</span><span
                                                            class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                            role="presentation"><span class="cke_button"><a
                                                                    id="cke_97"
                                                                    class="cke_off cke_button_source" "="" href="javascript:void('Mã HTML')" title="Mã HTML" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_97_label" onkeydown="return CKEDITOR.tools.callFunction(208, event);" onfocus="return CKEDITOR.tools.callFunction(209, event);" onclick="CKEDITOR.tools.callFunction(210, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_97_label" class="cke_label">Mã HTML</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_98" class="cke_off cke_button_save" "=""
                                                                    href="javascript:void('Lưu')" title="Lưu"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_98_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(211, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(212, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(213, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_98_label"
                                                                        class="cke_label">Lưu</span></a></span><span
                                                                class="cke_button"><a id="cke_99"
                                                                    class="cke_off cke_button_newpage" "="" href="javascript:void('Trang mới')" title="Trang mới" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_99_label" onkeydown="return CKEDITOR.tools.callFunction(214, event);" onfocus="return CKEDITOR.tools.callFunction(215, event);" onclick="CKEDITOR.tools.callFunction(216, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_99_label" class="cke_label">Trang mới</span></a></span><span class="cke_button"><a id="cke_100" class="cke_off cke_button_preview" "=""
                                                                    href="javascript:void('Xem trước')"
                                                                    title="Xem trước" tabindex="-1" hidefocus="true"
                                                                    role="button" aria-labelledby="cke_100_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(217, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(218, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(219, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_100_label" class="cke_label">Xem
                                                                        trước</span></a></span><span class="cke_button"><a
                                                                    id="cke_101"
                                                                    class="cke_off cke_button_print" "="" href="javascript:void('In')" title="In" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_101_label" onkeydown="return CKEDITOR.tools.callFunction(220, event);" onfocus="return CKEDITOR.tools.callFunction(221, event);" onclick="CKEDITOR.tools.callFunction(222, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_101_label" class="cke_label">In</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_102" class="cke_off cke_button_templates" "=""
                                                                    href="javascript:void('Mẫu dựng sẵn')"
                                                                    title="Mẫu dựng sẵn" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_102_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(223, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(224, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(225, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_102_label" class="cke_label">Mẫu
                                                                        dựng sẵn</span></a></span></span><span
                                                            class="cke_toolbar_end"></span></span><span id="cke_103"
                                                        class="cke_toolbar" aria-labelledby="cke_103_label"
                                                        role="toolbar"><span id="cke_103_label"
                                                            class="cke_voice_label">Clipboard/Undo</span><span
                                                            class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                            role="presentation"><span class="cke_button"><a
                                                                    id="cke_104"
                                                                    class="cke_button_cut cke_disabled" "="" href="javascript:void('Cắt')" title="Cắt" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_104_label" onkeydown="return CKEDITOR.tools.callFunction(226, event);" onfocus="return CKEDITOR.tools.callFunction(227, event);" onclick="CKEDITOR.tools.callFunction(228, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_104_label" class="cke_label">Cắt</span></a></span><span class="cke_button"><a id="cke_105" class="cke_button_copy cke_disabled" "=""
                                                                    href="javascript:void('Sao chép')" title="Sao chép"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_105_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(229, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(230, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(231, this); return false;"
                                                                    aria-disabled="true"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_105_label" class="cke_label">Sao
                                                                        chép</span></a></span><span class="cke_button"><a
                                                                    id="cke_106"
                                                                    class="cke_off cke_button_paste" "="" href="javascript:void('Dán')" title="Dán" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_106_label" onkeydown="return CKEDITOR.tools.callFunction(232, event);" onfocus="return CKEDITOR.tools.callFunction(233, event);" onclick="CKEDITOR.tools.callFunction(234, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_106_label" class="cke_label">Dán</span></a></span><span class="cke_button"><a id="cke_107" class="cke_off cke_button_pastetext" "=""
                                                                    href="javascript:void('Dán theo định dạng văn bản thuần')"
                                                                    title="Dán theo định dạng văn bản thuần"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_107_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(235, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(236, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(237, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_107_label" class="cke_label">Dán
                                                                        theo định dạng văn bản
                                                                        thuần</span></a></span><span class="cke_button"><a
                                                                    id="cke_108"
                                                                    class="cke_off cke_button_pastefromword" "="" href="javascript:void('Dán với định dạng Word')" title="Dán với định dạng Word" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_108_label" onkeydown="return CKEDITOR.tools.callFunction(238, event);" onfocus="return CKEDITOR.tools.callFunction(239, event);" onclick="CKEDITOR.tools.callFunction(240, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_108_label" class="cke_label">Dán với định dạng Word</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_109" class="cke_button_undo cke_disabled" "=""
                                                                    href="javascript:void('Khôi phục thao tác')"
                                                                    title="Khôi phục thao tác" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_109_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(241, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(242, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(243, this); return false;"
                                                                    aria-disabled="true"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_109_label" class="cke_label">Khôi
                                                                        phục thao tác</span></a></span><span
                                                                class="cke_button"><a id="cke_110"
                                                                    class="cke_button_redo cke_disabled" "="" href="javascript:void('Làm lại thao tác')" title="Làm lại thao tác" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_110_label" onkeydown="return CKEDITOR.tools.callFunction(244, event);" onfocus="return CKEDITOR.tools.callFunction(245, event);" onclick="CKEDITOR.tools.callFunction(246, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_110_label" class="cke_label">Làm lại thao tác</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_111" class="cke_toolbar" aria-labelledby="cke_111_label" role="toolbar"><span id="cke_111_label" class="cke_voice_label">Editing</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_112" class="cke_off cke_button_find" "=""
                                                                    href="javascript:void('Tìm kiếm')" title="Tìm kiếm"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_112_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(247, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(248, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(249, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_112_label" class="cke_label">Tìm
                                                                        kiếm</span></a></span><span class="cke_button"><a
                                                                    id="cke_113"
                                                                    class="cke_off cke_button_replace" "="" href="javascript:void('Thay thế')" title="Thay thế" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_113_label" onkeydown="return CKEDITOR.tools.callFunction(250, event);" onfocus="return CKEDITOR.tools.callFunction(251, event);" onclick="CKEDITOR.tools.callFunction(252, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_113_label" class="cke_label">Thay thế</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_114" class="cke_off cke_button_selectAll" "=""
                                                                    href="javascript:void('Chọn tất cả')"
                                                                    title="Chọn tất cả" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_114_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(253, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(254, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(255, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_114_label" class="cke_label">Chọn
                                                                        tất cả</span></a></span><span
                                                                class="cke_separator" role="separator"></span><span
                                                                class="cke_button"><a id="cke_115"
                                                                    class="cke_off cke_button_checkspell" "="" href="javascript:void('Kiểm tra chính tả')" title="Kiểm tra chính tả" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_115_label" onkeydown="return CKEDITOR.tools.callFunction(256, event);" onfocus="return CKEDITOR.tools.callFunction(257, event);" onclick="CKEDITOR.tools.callFunction(258, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_115_label" class="cke_label">Kiểm tra chính tả</span></a></span><span class="cke_button"><a id="cke_116" class="cke_off cke_button_scayt" "=""
                                                                    href="javascript:void('Kiểm tra chính tả ngay khi gõ chữ (SCAYT)')"
                                                                    title="Kiểm tra chính tả ngay khi gõ chữ (SCAYT)"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_116_label" aria-haspopup="true"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(259, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(260, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(261, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_116_label" class="cke_label">Kiểm
                                                                        tra chính tả ngay khi gõ chữ (SCAYT)</span><span
                                                                        class="cke_buttonarrow">&nbsp;</span></a></span></span><span
                                                            class="cke_toolbar_end"></span></span><span id="cke_117"
                                                        class="cke_toolbar" aria-labelledby="cke_117_label"
                                                        role="toolbar"><span id="cke_117_label"
                                                            class="cke_voice_label">Forms</span><span
                                                            class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                            role="presentation"><span class="cke_button"><a
                                                                    id="cke_118"
                                                                    class="cke_off cke_button_form" "="" href="javascript:void('Biểu mẫu')" title="Biểu mẫu" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_118_label" onkeydown="return CKEDITOR.tools.callFunction(262, event);" onfocus="return CKEDITOR.tools.callFunction(263, event);" onclick="CKEDITOR.tools.callFunction(264, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_118_label" class="cke_label">Biểu mẫu</span></a></span><span class="cke_button"><a id="cke_119" class="cke_off cke_button_checkbox" "=""
                                                                    href="javascript:void('Nút kiểm')" title="Nút kiểm"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_119_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(265, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(266, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(267, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_119_label" class="cke_label">Nút
                                                                        kiểm</span></a></span><span class="cke_button"><a
                                                                    id="cke_120"
                                                                    class="cke_off cke_button_radio" "="" href="javascript:void('Nút chọn')" title="Nút chọn" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_120_label" onkeydown="return CKEDITOR.tools.callFunction(268, event);" onfocus="return CKEDITOR.tools.callFunction(269, event);" onclick="CKEDITOR.tools.callFunction(270, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_120_label" class="cke_label">Nút chọn</span></a></span><span class="cke_button"><a id="cke_121" class="cke_off cke_button_textfield" "=""
                                                                    href="javascript:void('Trường văn bản')"
                                                                    title="Trường văn bản" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_121_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(271, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(272, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(273, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_121_label" class="cke_label">Trường
                                                                        văn bản</span></a></span><span
                                                                class="cke_button"><a id="cke_122"
                                                                    class="cke_off cke_button_textarea" "="" href="javascript:void('Vùng văn bản')" title="Vùng văn bản" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_122_label" onkeydown="return CKEDITOR.tools.callFunction(274, event);" onfocus="return CKEDITOR.tools.callFunction(275, event);" onclick="CKEDITOR.tools.callFunction(276, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_122_label" class="cke_label">Vùng văn bản</span></a></span><span class="cke_button"><a id="cke_123" class="cke_off cke_button_select" "=""
                                                                    href="javascript:void('Ô chọn')" title="Ô chọn"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_123_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(277, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(278, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(279, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_123_label" class="cke_label">Ô
                                                                        chọn</span></a></span><span class="cke_button"><a
                                                                    id="cke_124"
                                                                    class="cke_off cke_button_button" "="" href="javascript:void('Nút')" title="Nút" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_124_label" onkeydown="return CKEDITOR.tools.callFunction(280, event);" onfocus="return CKEDITOR.tools.callFunction(281, event);" onclick="CKEDITOR.tools.callFunction(282, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_124_label" class="cke_label">Nút</span></a></span><span class="cke_button"><a id="cke_125" class="cke_off cke_button_imagebutton" "=""
                                                                    href="javascript:void('Nút hình ảnh')"
                                                                    title="Nút hình ảnh" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_125_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(283, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(284, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(285, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_125_label" class="cke_label">Nút
                                                                        hình ảnh</span></a></span><span
                                                                class="cke_button"><a id="cke_126"
                                                                    class="cke_off cke_button_hiddenfield" "="" href="javascript:void('Trường ẩn')" title="Trường ẩn" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_126_label" onkeydown="return CKEDITOR.tools.callFunction(286, event);" onfocus="return CKEDITOR.tools.callFunction(287, event);" onclick="CKEDITOR.tools.callFunction(288, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_126_label" class="cke_label">Trường ẩn</span></a></span></span><span class="cke_toolbar_end"></span></span><div class="cke_break"></div><span id="cke_127" class="cke_toolbar" aria-labelledby="cke_127_label" role="toolbar"><span id="cke_127_label" class="cke_voice_label">Basic Styles</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_128" class="cke_off cke_button_bold" "=""
                                                                    href="javascript:void('Đậm')" title="Đậm"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_128_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(289, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(290, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(291, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_128_label"
                                                                        class="cke_label">Đậm</span></a></span><span
                                                                class="cke_button"><a id="cke_129"
                                                                    class="cke_off cke_button_italic" "="" href="javascript:void('Nghiêng')" title="Nghiêng" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_129_label" onkeydown="return CKEDITOR.tools.callFunction(292, event);" onfocus="return CKEDITOR.tools.callFunction(293, event);" onclick="CKEDITOR.tools.callFunction(294, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_129_label" class="cke_label">Nghiêng</span></a></span><span class="cke_button"><a id="cke_130" class="cke_off cke_button_underline" "=""
                                                                    href="javascript:void('Gạch chân')"
                                                                    title="Gạch chân" tabindex="-1" hidefocus="true"
                                                                    role="button" aria-labelledby="cke_130_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(295, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(296, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(297, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_130_label" class="cke_label">Gạch
                                                                        chân</span></a></span><span class="cke_button"><a
                                                                    id="cke_131"
                                                                    class="cke_off cke_button_strike" "="" href="javascript:void('Gạch xuyên ngang')" title="Gạch xuyên ngang" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_131_label" onkeydown="return CKEDITOR.tools.callFunction(298, event);" onfocus="return CKEDITOR.tools.callFunction(299, event);" onclick="CKEDITOR.tools.callFunction(300, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_131_label" class="cke_label">Gạch xuyên ngang</span></a></span><span class="cke_button"><a id="cke_132" class="cke_off cke_button_subscript" "=""
                                                                    href="javascript:void('Chỉ số dưới')"
                                                                    title="Chỉ số dưới" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_132_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(301, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(302, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(303, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_132_label" class="cke_label">Chỉ số
                                                                        dưới</span></a></span><span class="cke_button"><a
                                                                    id="cke_133"
                                                                    class="cke_off cke_button_superscript" "="" href="javascript:void('Chỉ số trên')" title="Chỉ số trên" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_133_label" onkeydown="return CKEDITOR.tools.callFunction(304, event);" onfocus="return CKEDITOR.tools.callFunction(305, event);" onclick="CKEDITOR.tools.callFunction(306, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_133_label" class="cke_label">Chỉ số trên</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_134" class="cke_off cke_button_removeFormat" "=""
                                                                    href="javascript:void('Xoá định dạng')"
                                                                    title="Xoá định dạng" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_134_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(307, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(308, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(309, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_134_label" class="cke_label">Xoá
                                                                        định dạng</span></a></span></span><span
                                                            class="cke_toolbar_end"></span></span><span id="cke_135"
                                                        class="cke_toolbar" aria-labelledby="cke_135_label"
                                                        role="toolbar"><span id="cke_135_label"
                                                            class="cke_voice_label">Paragraph</span><span
                                                            class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                            role="presentation"><span class="cke_button"><a
                                                                    id="cke_136"
                                                                    class="cke_off cke_button_numberedlist" "="" href="javascript:void('Danh sách có thứ tự')" title="Danh sách có thứ tự" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_136_label" onkeydown="return CKEDITOR.tools.callFunction(310, event);" onfocus="return CKEDITOR.tools.callFunction(311, event);" onclick="CKEDITOR.tools.callFunction(312, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_136_label" class="cke_label">Danh sách có thứ tự</span></a></span><span class="cke_button"><a id="cke_137" class="cke_off cke_button_bulletedlist" "=""
                                                                    href="javascript:void('Danh sách không thứ tự')"
                                                                    title="Danh sách không thứ tự" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_137_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(313, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(314, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(315, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_137_label" class="cke_label">Danh
                                                                        sách không thứ tự</span></a></span><span
                                                                class="cke_separator" role="separator"></span><span
                                                                class="cke_button"><a id="cke_138"
                                                                    class="cke_button_outdent cke_disabled" "="" href="javascript:void('Dịch ra ngoài')" title="Dịch ra ngoài" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_138_label" onkeydown="return CKEDITOR.tools.callFunction(316, event);" onfocus="return CKEDITOR.tools.callFunction(317, event);" onclick="CKEDITOR.tools.callFunction(318, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_138_label" class="cke_label">Dịch ra ngoài</span></a></span><span class="cke_button"><a id="cke_139" class="cke_off cke_button_indent" "=""
                                                                    href="javascript:void('Dịch vào trong')"
                                                                    title="Dịch vào trong" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_139_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(319, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(320, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(321, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_139_label" class="cke_label">Dịch
                                                                        vào trong</span></a></span><span
                                                                class="cke_separator" role="separator"></span><span
                                                                class="cke_button"><a id="cke_140"
                                                                    class="cke_off cke_button_blockquote" "="" href="javascript:void('Khối trích dẫn')" title="Khối trích dẫn" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_140_label" onkeydown="return CKEDITOR.tools.callFunction(322, event);" onfocus="return CKEDITOR.tools.callFunction(323, event);" onclick="CKEDITOR.tools.callFunction(324, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_140_label" class="cke_label">Khối trích dẫn</span></a></span><span class="cke_button"><a id="cke_141" class="cke_off cke_button_creatediv" "=""
                                                                    href="javascript:void('Tạo khối các thành phần')"
                                                                    title="Tạo khối các thành phần" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_141_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(325, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(326, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(327, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_141_label" class="cke_label">Tạo
                                                                        khối các thành phần</span></a></span><span
                                                                class="cke_separator" role="separator"></span><span
                                                                class="cke_button"><a id="cke_142"
                                                                    class="cke_off cke_button_justifyleft" "="" href="javascript:void('Canh trái')" title="Canh trái" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_142_label" onkeydown="return CKEDITOR.tools.callFunction(328, event);" onfocus="return CKEDITOR.tools.callFunction(329, event);" onclick="CKEDITOR.tools.callFunction(330, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_142_label" class="cke_label">Canh trái</span></a></span><span class="cke_button"><a id="cke_143" class="cke_off cke_button_justifycenter" "=""
                                                                    href="javascript:void('Canh giữa')"
                                                                    title="Canh giữa" tabindex="-1" hidefocus="true"
                                                                    role="button" aria-labelledby="cke_143_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(331, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(332, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(333, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_143_label" class="cke_label">Canh
                                                                        giữa</span></a></span><span class="cke_button"><a
                                                                    id="cke_144"
                                                                    class="cke_off cke_button_justifyright" "="" href="javascript:void('Canh phải')" title="Canh phải" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_144_label" onkeydown="return CKEDITOR.tools.callFunction(334, event);" onfocus="return CKEDITOR.tools.callFunction(335, event);" onclick="CKEDITOR.tools.callFunction(336, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_144_label" class="cke_label">Canh phải</span></a></span><span class="cke_button"><a id="cke_145" class="cke_off cke_button_justifyblock" "=""
                                                                    href="javascript:void('Canh đều')" title="Canh đều"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_145_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(337, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(338, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(339, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_145_label" class="cke_label">Canh
                                                                        đều</span></a></span><span class="cke_separator"
                                                                role="separator"></span><span class="cke_button"><a
                                                                    id="cke_146"
                                                                    class="cke_off cke_button_bidiltr" "="" href="javascript:void('Text direction from left to right')" title="Text direction from left to right" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_146_label" onkeydown="return CKEDITOR.tools.callFunction(340, event);" onfocus="return CKEDITOR.tools.callFunction(341, event);" onclick="CKEDITOR.tools.callFunction(342, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_146_label" class="cke_label">Text direction from left to right</span></a></span><span class="cke_button"><a id="cke_147" class="cke_off cke_button_bidirtl" "=""
                                                                    href="javascript:void('Text direction from right to left')"
                                                                    title="Text direction from right to left"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_147_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(343, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(344, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(345, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_147_label" class="cke_label">Text
                                                                        direction from right to
                                                                        left</span></a></span></span><span
                                                            class="cke_toolbar_end"></span></span><span id="cke_148"
                                                        class="cke_toolbar" aria-labelledby="cke_148_label"
                                                        role="toolbar"><span id="cke_148_label"
                                                            class="cke_voice_label">Links</span><span
                                                            class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                            role="presentation"><span class="cke_button"><a
                                                                    id="cke_149"
                                                                    class="cke_off cke_button_link" "="" href="javascript:void('Chèn/Sửa liên kết')" title="Chèn/Sửa liên kết" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_149_label" onkeydown="return CKEDITOR.tools.callFunction(346, event);" onfocus="return CKEDITOR.tools.callFunction(347, event);" onclick="CKEDITOR.tools.callFunction(348, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_149_label" class="cke_label">Chèn/Sửa liên kết</span></a></span><span class="cke_button"><a id="cke_150" class="cke_button_unlink cke_disabled" "=""
                                                                    href="javascript:void('Xoá liên kết')"
                                                                    title="Xoá liên kết" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_150_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(349, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(350, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(351, this); return false;"
                                                                    aria-disabled="true"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_150_label" class="cke_label">Xoá
                                                                        liên kết</span></a></span><span
                                                                class="cke_button"><a id="cke_151"
                                                                    class="cke_off cke_button_anchor" "="" href="javascript:void('Chèn/Sửa điểm neo')" title="Chèn/Sửa điểm neo" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_151_label" onkeydown="return CKEDITOR.tools.callFunction(352, event);" onfocus="return CKEDITOR.tools.callFunction(353, event);" onclick="CKEDITOR.tools.callFunction(354, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_151_label" class="cke_label">Chèn/Sửa điểm neo</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_152" class="cke_toolbar" aria-labelledby="cke_152_label" role="toolbar"><span id="cke_152_label" class="cke_voice_label">Insert</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_153" class="cke_off cke_button_image" "=""
                                                                    href="javascript:void('Hình ảnh')" title="Hình ảnh"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_153_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(355, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(356, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(357, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_153_label" class="cke_label">Hình
                                                                        ảnh</span></a></span><span class="cke_button"><a
                                                                    id="cke_154"
                                                                    class="cke_off cke_button_flash" "="" href="javascript:void('Flash')" title="Flash" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_154_label" onkeydown="return CKEDITOR.tools.callFunction(358, event);" onfocus="return CKEDITOR.tools.callFunction(359, event);" onclick="CKEDITOR.tools.callFunction(360, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_154_label" class="cke_label">Flash</span></a></span><span class="cke_button"><a id="cke_155" class="cke_off cke_button_table" "=""
                                                                    href="javascript:void('Bảng')" title="Bảng"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_155_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(361, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(362, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(363, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_155_label"
                                                                        class="cke_label">Bảng</span></a></span><span
                                                                class="cke_button"><a id="cke_156"
                                                                    class="cke_off cke_button_horizontalrule" "="" href="javascript:void('Chèn đường phân cách ngang')" title="Chèn đường phân cách ngang" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_156_label" onkeydown="return CKEDITOR.tools.callFunction(364, event);" onfocus="return CKEDITOR.tools.callFunction(365, event);" onclick="CKEDITOR.tools.callFunction(366, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_156_label" class="cke_label">Chèn đường phân cách ngang</span></a></span><span class="cke_button"><a id="cke_157" class="cke_off cke_button_smiley" "=""
                                                                    href="javascript:void('Hình biểu lộ cảm xúc (mặt cười)')"
                                                                    title="Hình biểu lộ cảm xúc (mặt cười)"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_157_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(367, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(368, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(369, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_157_label" class="cke_label">Hình
                                                                        biểu lộ cảm xúc (mặt
                                                                        cười)</span></a></span><span class="cke_button"><a
                                                                    id="cke_158"
                                                                    class="cke_off cke_button_specialchar" "="" href="javascript:void('Chèn ký tự đặc biệt')" title="Chèn ký tự đặc biệt" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_158_label" onkeydown="return CKEDITOR.tools.callFunction(370, event);" onfocus="return CKEDITOR.tools.callFunction(371, event);" onclick="CKEDITOR.tools.callFunction(372, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_158_label" class="cke_label">Chèn ký tự đặc biệt</span></a></span><span class="cke_button"><a id="cke_159" class="cke_off cke_button_pagebreak" "=""
                                                                    href="javascript:void('Chèn ngắt trang')"
                                                                    title="Chèn ngắt trang" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_159_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(373, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(374, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(375, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_159_label" class="cke_label">Chèn
                                                                        ngắt trang</span></a></span><span
                                                                class="cke_button"><a id="cke_160"
                                                                    class="cke_off cke_button_iframe" "="" href="javascript:void('IFrame')" title="IFrame" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_160_label" onkeydown="return CKEDITOR.tools.callFunction(376, event);" onfocus="return CKEDITOR.tools.callFunction(377, event);" onclick="CKEDITOR.tools.callFunction(378, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_160_label" class="cke_label">IFrame</span></a></span></span><span class="cke_toolbar_end"></span></span><div class="cke_break"></div><span id="cke_162" class="cke_toolbar" aria-labelledby="cke_162_label" role="toolbar"><span id="cke_162_label" class="cke_voice_label">Styles</span><span class="cke_toolbar_start"></span><span class="cke_rcombo" role="presentation"><span id="cke_161" class="cke_styles cke_off" role="presentation"><span id="cke_161_label" class="cke_label">Kiểu</span><a hidefocus="true" title="Phong cách định dạng" tabindex="-1" href="javascript:void('Kiểu')" role="button" aria-labelledby="cke_161_label" aria-describedby="cke_161_text" aria-haspopup="true" onkeydown="CKEDITOR.tools.callFunction( 380, event, this );" onfocus="return CKEDITOR.tools.callFunction(381, event);" onclick="CKEDITOR.tools.callFunction(379, this); return false;"><span><span id="cke_161_text" class="cke_text cke_inline_label">Kiểu</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span><span class="cke_rcombo" role="presentation"><span id="cke_163" class="cke_format cke_off" role="presentation"><span id="cke_163_label" class="cke_label">Định dạng</span><a hidefocus="true" title="Định dạng" tabindex="-1" href="javascript:void('Định dạng')" role="button" aria-labelledby="cke_163_label" aria-describedby="cke_163_text" aria-haspopup="true" onkeydown="CKEDITOR.tools.callFunction( 383, event, this );" onfocus="return CKEDITOR.tools.callFunction(384, event);" onclick="CKEDITOR.tools.callFunction(382, this); return false;"><span><span id="cke_163_text" class="cke_text cke_inline_label">Định dạng</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span><span class="cke_rcombo" role="presentation"><span id="cke_164" class="cke_font cke_off" role="presentation"><span id="cke_164_label" class="cke_label">Phông</span><a hidefocus="true" title="Phông" tabindex="-1" href="javascript:void('Phông')" role="button" aria-labelledby="cke_164_label" aria-describedby="cke_164_text" aria-haspopup="true" onkeydown="CKEDITOR.tools.callFunction( 386, event, this );" onfocus="return CKEDITOR.tools.callFunction(387, event);" onclick="CKEDITOR.tools.callFunction(385, this); return false;"><span><span id="cke_164_text" class="cke_text cke_inline_label">Phông</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span><span class="cke_rcombo" role="presentation"><span id="cke_165" class="cke_fontSize cke_off" role="presentation"><span id="cke_165_label" class="cke_label">Cỡ chữ</span><a hidefocus="true" title="Cỡ chữ" tabindex="-1" href="javascript:void('Cỡ chữ')" role="button" aria-labelledby="cke_165_label" aria-describedby="cke_165_text" aria-haspopup="true" onkeydown="CKEDITOR.tools.callFunction( 389, event, this );" onfocus="return CKEDITOR.tools.callFunction(390, event);" onclick="CKEDITOR.tools.callFunction(388, this); return false;"><span><span id="cke_165_text" class="cke_text cke_inline_label">Cỡ chữ</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_166" class="cke_toolbar" aria-labelledby="cke_166_label" role="toolbar"><span id="cke_166_label" class="cke_voice_label">Colors</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_167" class="cke_off cke_button_textcolor" "=""
                                                                    href="javascript:void('Màu chữ')" title="Màu chữ"
                                                                    tabindex="-1" hidefocus="true" role="button"
                                                                    aria-labelledby="cke_167_label" aria-haspopup="true"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(391, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(392, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(393, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_167_label" class="cke_label">Màu
                                                                        chữ</span><span
                                                                        class="cke_buttonarrow">&nbsp;</span></a></span><span
                                                                class="cke_button"><a id="cke_168"
                                                                    class="cke_off cke_button_bgcolor" "="" href="javascript:void('Màu nền')" title="Màu nền" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_168_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(394, event);" onfocus="return CKEDITOR.tools.callFunction(395, event);" onclick="CKEDITOR.tools.callFunction(396, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_168_label" class="cke_label">Màu nền</span><span class="cke_buttonarrow">&nbsp;</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_169" class="cke_toolbar" aria-labelledby="cke_169_label" role="toolbar"><span id="cke_169_label" class="cke_voice_label">Tools</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_170" class="cke_off cke_button_maximize" "=""
                                                                    href="javascript:void('Phóng to tối đa')"
                                                                    title="Phóng to tối đa" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_170_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(397, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(398, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(399, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_170_label" class="cke_label">Phóng
                                                                        to tối đa</span></a></span><span
                                                                class="cke_button"><a id="cke_171"
                                                                    class="cke_off cke_button_showblocks" "="" href="javascript:void('Hiển thị các khối')" title="Hiển thị các khối" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_171_label" onkeydown="return CKEDITOR.tools.callFunction(400, event);" onfocus="return CKEDITOR.tools.callFunction(401, event);" onclick="CKEDITOR.tools.callFunction(402, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_171_label" class="cke_label">Hiển thị các khối</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_172" class="cke_off cke_button_about" "=""
                                                                    href="javascript:void('Thông tin về CKEditor')"
                                                                    title="Thông tin về CKEditor" tabindex="-1"
                                                                    hidefocus="true" role="button"
                                                                    aria-labelledby="cke_172_label"
                                                                    onkeydown="return CKEDITOR.tools.callFunction(403, event);"
                                                                    onfocus="return CKEDITOR.tools.callFunction(404, event);"
                                                                    onclick="CKEDITOR.tools.callFunction(405, this); return false;"><span
                                                                        class="cke_icon">&nbsp;</span><span
                                                                        id="cke_172_label" class="cke_label">Thông
                                                                        tin về CKEditor</span></a></span></span><span
                                                            class="cke_toolbar_end"></span></span></div><a
                                                    title="Thu gọn thanh công cụ" id="cke_173" tabindex="-1"
                                                    class="cke_toolbox_collapser"
                                                    onclick="CKEDITOR.tools.callFunction(406)"><span>▲</span></a>
                                            </td>
                                        </tr>
                                        <tr role="presentation">
                                            <td id="cke_contents_content_en" class="cke_contents" style="height:300px"
                                                role="presentation"><iframe style="width:100%;height:100%"
                                                    frameborder="0"
                                                    title="Bộ soạn thảo, content_en, nhấn ALT + 0 để xem hướng dẫn."
                                                    src="" tabindex="-1" allowtransparency="true"></iframe>
                                            </td>
                                        </tr>
                                        <tr role="presentation">
                                            <td id="cke_bottom_content_en" class="cke_bottom" role="presentation">
                                                <div class="cke_resizer cke_resizer_ltr"
                                                    title="Kéo rê để thay đổi kích cỡ"
                                                    onmousedown="CKEDITOR.tools.callFunction(207, event)"></div><span
                                                    id="cke_path_content_en_label" class="cke_voice_label">Nhãn
                                                    thành phần</span>
                                                <div id="cke_path_content_en" class="cke_path" role="group"
                                                    aria-labelledby="cke_path_content_en_label"><span
                                                        class="cke_empty">&nbsp;</span></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </span></span></span>
                    <script type="text/javascript">
                        //<![CDATA[
                        CKEDITOR.replace('content_en', {
                            "height": 300
                        });
                        //]]>
                    </script>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="widget">
            <div class="title"><img src="{{asset('imgroup')}}/images/admin/icons/dark/record.png" alt="" class="titleIcon">
                <h6>Nội dung bài viết SEO (phân bổ từ khoá)</h6><span class="mynotes">- Phần dành cho người dùng
                    đọc</span>
            </div>
            <div class="formRow">
                <label>Chủ đề của page</label>
                <div class="formRight">
                    <input type="text" value="" name="h1_vn" id="h1_vn"
                        class="tipS validate[required]" original-title="">
                    <span class="formNote">Nội dung thẻ H1: Chủ đề chính của trang, 1 - 2 từ khóa chính, hiển thị ở
                        trang tiếng Việt</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow" style="display:none;">
                <label>Chủ đề của page EN</label>
                <div class="formRight">
                    <input type="text" value="" name="h1_en" class="tipS" original-title="">
                    <span class="formNote">Nội dung thẻ H1: Chủ đề chính của trang, 1 - 2 từ khóa chính, hiển thị ở
                        trang tiếng Anh</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Giải nghĩa chủ đề page</label>
                <div class="formRight">
                    <input type="text" value="" name="h2_vn" id="h2_vn"
                        class="tipS validate[required]" original-title="">
                    <span class="formNote">Nội dung thẻ H2: Chủ đề phụ của trang, 2 - 3 từ khoá phụ, hiển thị ở trang
                        tiếng Việt</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow" style="display:none;">
                <label>Giải nghĩa chủ đề page EN</label>
                <div class="formRight">
                    <input type="text" value="" name="h2_en" class="tipS" original-title="">
                    <span class="formNote">Nội dung thẻ H2: Chủ đề phụ của trang, 2 - 3 từ khoá phụ, hiển thị ở trang
                        tiếng Anh</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Mô tả chủ đề page:</label>
                <div class="formRight">
                    <textarea rows="8" cols="" class="tipS" name="seo_des_vn" original-title=""></textarea>
                    <span class="formNote">Nội dung bài viết SEO: Vài dòng mô tả về nội dung trang, gom các từ khóa
                        quan trọng vào, 2 - 3 từ khóa, độ dài khoảng 2 dòng, hiển thị ở trang tiếng Việt</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow" style="display:none;">
                <label>Mô tả chủ đề page EN:</label>
                <div class="formRight">
                    <textarea rows="8" cols="" class="tipS" name="seo_des_en" original-title=""></textarea>
                    <span class="formNote">Nội dung bài viết SEO: Vài dòng mô tả về nội dung trang, gom các từ khóa
                        quan trọng vào, 2 - 3 từ khóa, độ dài khoảng 2 dòng, hiển thị ở trang tiếng Anh</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="widget">
            <div class="title"><img src="{{asset('imgroup')}}/images/admin/icons/dark/record.png" alt="" class="titleIcon">
                <h6>Nội dung SEO</h6><span class="mynotes">- Phần dành cho Google đọc</span>
            </div>
            <div class="formRow">
                <label>Tạo SEO</label>
                <div class="formRight">
                    <input type="button" class="blueB" onclick="CreateTitleSEO();" value="Tạo SEO">
                    <span class="formNote">Bấm TẠO SEO để tạo Link, Tiêu đề, Mô tả, Từ khoá mẫu</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Link danh mục VN</label>
                <div class="formRight">
                    <input type="text" value="" name="unique_key_vn" id="unique_key_vn"
                        class="tipS validate[required]" original-title="">
                    <span class="formNote">Link hiển thị ở trang tiếng Việt. Quy tắc: không dấu, không ký tự đặc biệt,
                        không khoảng trắng, khoảng trắng được thay thế bằng dấu gạch ngang (-)</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow" style="display:none;">
                <label>Link danh mục EN</label>
                <div class="formRight">
                    <input type="text" value="" name="unique_key_en" class="tipS" original-title="">
                    <span class="formNote">Link hiển thị ở trang tiếng Anh. Quy tắc: không dấu, không ký tự đặc biệt,
                        không khoảng trắng, khoảng trắng được thay thế bằng dấu gạch ngang (-)</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Tiêu đề page</label>
                <div class="formRight">
                    <input type="text" value="" name="title_vn" class="tipS" original-title="">
                    <span class="formNote">Nội dung thẻ meta Title hiển thị ở trang tiếng Việt</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow" style="display:none;">
                <label>Tiêu đề page EN</label>
                <div class="formRight">
                    <input type="text" value="" name="title_en" class="tipS" original-title="">
                    <span class="formNote">Nội dung thẻ meta Title hiển thị ở trang tiếng Anh</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Từ khóa VN</label>
                <div class="formRight">
                    <input type="text" value="" name="keyword_vn" class="tipS" original-title="">
                    <span class="formNote">Nội dung từ khóa chính (Thẻ meta Keyword) hiển thị ở trang tiếng
                        Việt</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow" style="display:none;">
                <label>Từ khóa EN</label>
                <div class="formRight">
                    <input type="text" value="" name="keyword_en" class="tipS" original-title="">
                    <span class="formNote">Nội dung từ khóa chính (Thẻ meta Keyword) hiển thị ở trang tiếng Anh</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Mô tả page:</label>
                <div class="formRight">
                    <textarea rows="8" cols="" class="tipS" name="des_vn" original-title=""></textarea>
                    <span class="formNote">Nội dung thẻ meta Description hiển thị ở trang tiếng Việt</span>
                    <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;"
                        name="des_vn_char" value="">
                    ký tự <b>(Tốt nhất là 160 ký tự)</b>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow" style="display:none;">
                <label>Mô tả page EN:</label>
                <div class="formRight">
                    <textarea rows="8" cols="" class="tipS" name="des_en" original-title=""></textarea>
                    <span class="formNote">Nội dung thẻ meta Description hiển thị ở trang tiếng Anh</span>
                    <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;"
                        name="des_en_char" value="">
                    ký tự <b>(Tốt nhất là 160 ký tự)</b>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <div class="formRight">
                    <input type="hidden" name="id" value="">
                    <input type="button" class="blueB"
                        onclick="TreeFilterChanged2(document.getElementById('cat').value); return false;"
                        value="Hoàn tất">
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="widget">
            <div class="title"><img src="{{asset('imgroup')}}/images/admin/icons/dark/record.png" alt="" class="titleIcon">
                <h6>Phần mở rộng</h6>
            </div>
            <div class="formRow">
                <label>Liên kết ngoài</label>
                <div class="formRight">
                    <input type="text" name="ext_url" class="tipS" value="" original-title="">
                    <span class="formNote">Khi bấm vào danh mục sẽ chuyển đến trang liên kết này, mặc định bỏ
                        trống</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Tùy chọn:</label>
                <div class="formRight">
                    <div class="checker" id="uniform-active"><span class="checked"><input type="checkbox"
                                name="active" id="active" value="1" checked="checked"
                                style="opacity: 0;"></span></div>
                    <label for="active">Hiển thị</label>
                    <div class="checker" id="uniform-new_tab"><span class="checked"><input type="checkbox"
                                name="new_tab" id="new_tab" value="1" checked="checked"
                                style="opacity: 0;"></span></div>
                    <label for="new_tab">Mở link ngoài ra tab mới (Áp dụng cho danh mục có nhập liên kết
                        ngoài)</label>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Số thứ tự: </label>
                <div class="formRight">
                    <input type="text" class="tipS" value="0" name="num"
                        style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)"
                        original-title="">
                    <span class="formNote">Thứ tự hiển thị của danh mục, sắp xếp tăng dần từ nhỏ đến lớn</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Mô tả ngắn VN:</label>
                <div class="formRight">
                    <textarea rows="8" cols="" class="tipS" name="short_vn" original-title=""></textarea>
                    <span class="formNote">Đoạn mô tả ngắn danh mục sẽ hiển thị ở trang tiếng Việt</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow" style="display:none;">
                <label>Mô tả ngắn EN:</label>
                <div class="formRight">
                    <textarea rows="8" cols="" class="tipS" name="short_en" original-title=""></textarea>
                    <span class="formNote">Đoạn mô tả ngắn danh mục sẽ hiển thị ở trang tiếng Anh</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <div class="formRight">
                    <input type="button" class="blueB"
                        onclick="TreeFilterChanged2(document.getElementById('cat').value); return false;"
                        value="Hoàn tất">
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </form>
@endsection
