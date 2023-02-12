@extends('admin.admin')
@section('content')
<div class="wrapper">
    <div class="control_frm" style="margin-top:25px;">
<div class="bc">
<ul id="breadcrumbs" class="breadcrumbs">
    <li> <a href="admin.php?do=infos">Cấu hình website</a> </li>
    <li class="current"><a href="#" onclick="return false;">Chỉnh sửa</a></li>
</ul>
<div class="clear"></div>
</div>
</div>


<form name="supplier" id="validate" class="form" action="admin.php?do=infos&act=editsm" method="post" enctype="multipart/form-data">
<div class="widget">
<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
    <h6>Cấu hình email - <span style="color:#f00;">CHÚ Ý: Phần này rất quan trọng, cần phải cấu hình đúng để nhận được email liên hệ, đơn hàng... từ khách hàng</span></h6>
</div>
<div class="formRow">
    <label>Mail nhận thư</label>
    <div class="formRight">
        <input type="text" name="mail_contact" id="mail_contact" class="tipS validate[required,custom[email]]" value="vaiaodaiduyen@gmail.com" />
        <span class="formNote">Khi người dùng liên hệ hoặc mua hàng, sẽ gởi mail vào email này! Chỉ nhập một email duy nhất!</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Mail được BCC</label>
    <div class="formRight">
        <input type="text" name="mail_list" class="tipS" value="" />
        <span class="formNote">Các email sẽ được BCC (đơn hàng, liên hệ), viết liền không khoảng trắng và ngăn cách nhau bởi dấu chấm phẩy (;)</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Tên hiển thị</label>
    <div class="formRight">
        <input type="text" name="mail_name" class="tipS" value="Shop vải áo dài Duyên" />
        <span class="formNote">Để cho người dùng biết là mail này từ đâu gởi tới!</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Tài khoản mail</label>
    <div class="formRight">
        <input type="text" name="mail_user" id="mail_user" class="tipS validate[required,custom[email]]" value="vaiaodaiduyen@gmail.com" />
        <span class="formNote">Tài khoản mail dùng để gởi mail! Có thể dùng gmail hoặc webmail!</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Mật khẩu mail</label>
    <div class="formRight">
        <input type="password" name="mail_pass" id="mail_pass" class="tipS validate[required]" value="mattrzvkqeehksra" />
        <span class="formNote">Mật khẩu của tài khoản mail ngay bên trên</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Mail host</label>
    <div class="formRight">
        <input type="text" name="mail_host" id="mail_host" class="tipS validate[required]" value="smtp.gmail.com" />
        <span class="formNote">Host của tài khoản mail phía trên. Nếu là webmail thì host dạng <strong>(tên miền).(phần mở rộng) ví dụ: imgroup.vn</strong>. Nếu là gmail thì host là <strong>smtp.gmail.com</strong></span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Thông tin <br />mail footer VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Trong các template email tiếng Việt gởi đi (liên hệ, đặt hàng ...), phía dưới cùng có phần thông tin của công ty! Thay đổi thông tin này tại đây."> </label>
    <div class="formRight"><textarea name="mail_footer_vn" rows="8" cols="60">&lt;p&gt;
&lt;span style=&quot;color:#ff33cc;&quot;&gt;&lt;span style=&quot;font-size:18px;&quot;&gt;&lt;strong&gt;&lt;em&gt;Shop vải áo dài Duyên&lt;/em&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;
Điện thoại: 0933 338 674 - 0933 281 774&lt;/p&gt;
&lt;p&gt;
&lt;span style=&quot;font-family: arial, sans-serif; font-size: 12.8px;&quot;&gt;Website:&amp;nbsp;&lt;/span&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/&quot; style=&quot;color: rgb(17, 85, 204); font-family: arial, sans-serif; font-size: 12.8px;&quot; target=&quot;_blank&quot;&gt;vaiaodaiduyen.com&lt;/a&gt;&lt;/p&gt;
&lt;p&gt;
&lt;span style=&quot;font-family: arial, sans-serif; font-size: 12.8px;&quot;&gt;Facebook:&amp;nbsp;&lt;/span&gt;&lt;a href=&quot;http://www.facebook.com/vaiaodaiduyen&quot; style=&quot;color: rgb(17, 85, 204); font-family: arial, sans-serif; font-size: 12.8px;&quot; target=&quot;_blank&quot;&gt;https://www.facebook.com/vaiaodaiduyen1/&lt;/a&gt;&lt;/p&gt;
&lt;p&gt;
Địa chỉ: 105/1A đường Tân Sơn Nhì, quận Tân Phú, TP. Hồ Chí Minh&lt;/p&gt;
</textarea>
<script type="text/javascript">//<![CDATA[
window.CKEDITOR_BASEPATH='ckeditor/';
//]]></script>
<script type="text/javascript" src="{{asset('imgroup')}}/js/ckeditor.js?t=B5GJ5GG"></script>
<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('mail_footer_vn', {"height":300});
//]]></script>
</div>
    <div class="clear"></div>
</div>
<div class="formRow" style="display:none;">
    <label>Thông tin <br />mail footer EN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Trong các template email tiếng Anh gởi đi (liên hệ, đặt hàng ...), phía dưới cùng có phần thông tin của công ty! Thay đổi thông tin này tại đây."> </label>
    <div class="formRight"><textarea name="mail_footer_en" rows="8" cols="60">&lt;p&gt;
Công ty&lt;br /&gt;
Địa chỉ&lt;br /&gt;
Điện thoại&lt;br /&gt;
E-mail&lt;/p&gt;
</textarea>
<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('mail_footer_en', {"height":300});
//]]></script>
</div>
    <div class="clear"></div>
</div>
</div>
<div class="widget">
<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
    <h6>Google Analytics & Webmaster Tools</h6>
</div>
<div class="formRow">
    <label>Các đoạn mã script:</label>
    <div class="formRight">
        <textarea rows="10" cols="" class="tipS" name="google_analytics"><script>
(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,"script","//www.google-analytics.com/analytics.js","ga");

ga("create", "UA-59046071-1", "auto");
ga("send", "pageview");

</script>




<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-T6W2GL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({"gtm.start":
new Date().getTime(),event:"gtm.js"});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!="dataLayer"?"&l="+l:"";j.async=true;j.src=
"//www.googletagmanager.com/gtm.js?id="+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,"script","dataLayer","GTM-T6W2GL");</script>
<!-- End Google Tag Manager -->

<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement("script");
fbds.async = true;
fbds.src = "//connect.facebook.net/en_US/fbds.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
_fbq.push(["addPixelId", "1583746501874767"]);
})();
window._fbq = window._fbq || [];
window._fbq.push(["track", "PixelInitialized", {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1583746501874767&ev=PixelInitialized" /></noscript>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version="2.0";n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,"script","https://connect.facebook.net/en_US/fbevents.js");

fbq("init", "994153397322050");
fbq("track", "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=994153397322050&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<script type="text/javascript">
var gr_goal_params = {
param_0 : "",
param_1 : "",
param_2 : "",
param_3 : "",
param_4 : "",
param_5 : ""
};</script>
<script type="text/javascript" src="https://app.getresponse.com/goals_log.js?p=813204&u=BnfmJ"></script>


<meta name="p:domain_verify" content="8467651e06d34eb393975dec322a51a1"/>



<meta name="p:domain_verify" content="8467651e06d34eb393975dec322a51a1"/>



</textarea>
        <span class="formNote">Google Analytics, Remarketing, Zopim, Livechat..., tất cả đều thêm ở đây, sẽ hiển thị trong thẻ đóng của body.</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Mã Verify <br /> Webmaster Tool:</label>
    <div class="formRight">
        <textarea rows="10" cols="" class="tipS" name="webmaster"><meta name="google-site-verification" content="2m_uLzBDLTcnc69ZQ1GSU-QG1mIbRJG1QvzVH_q3zKU" />

<meta name="p:domain_verify" content="8467651e06d34eb393975dec322a51a1"/></textarea>
        <span class="formNote">Đoạn mã verify Webmaster Tool dùng để xác minh trang web</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>File sitemap.xml:</label>
    <div class="formRight">
        sitemap.xml                    <a href="admin.php?do=infos&act=delete_img&id=1&img_del=sitemap" title="Xoá file">Xoá file</a>
            <br />
                        <input type="file" name="sitemap" class="file_1" size="50" />
        <div class="clear"></div>
        <span class="formNote">File sitemap.xml dùng để khai báo cho Google về cấu trúc của website. Tạo file sitemap.xml <a href="http://www.xml-sitemaps.com/" target="_blank"><strong>tại đây</strong></a></span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>File Robots.txt:</label>
    <div class="formRight">
        Robots.txt                    <a href="admin.php?do=infos&act=delete_img&id=1&img_del=robot" title="Xoá file">Xoá file</a>
            <br />
                        <input type="file" name="robot" class="file_1" size="50" />
        <div class="clear"></div>
        <span class="formNote">File Robots.txt dùng để chỉ định cho Google các trang cần index hoặc không index!</span>
    </div>
    <div class="clear"></div>
</div>
</div>
<div class="widget">
<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
    <h6>Logo & Favicon</h6>
</div>
<div class="formRow">
    <label>Tên logo VN</label>
    <div class="formRight">
        <input type="text" name="logoname_vn" class="tipS" value="vaiaodaiduyen.com" />
        <span class="formNote">Tên hiển thị tại logo ở trang tiếng Việt</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow" style="display:none;">
    <label>Tên logo EN</label>
    <div class="formRight">
        <input type="text" name="logoname_en" class="tipS" value="vaiaodaiduyen.com" />
        <span class="formNote">Tên hiển thị tại logo ở trang tiếng Anh</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Hình logo:</label>
    <div class="formRight">
                            <img src="/upload/images/logo.png" width="100" alt="" />
            <a href="admin.php?do=infos&act=delete_img&id=1&img_del=logo" title="Xoá ảnh">Xoá ảnh</a>
            <br />
                        <input type="file" name="logo" class="file_1" size="50" />
        <div class="clear"></div>
        <span class="formNote">Hình logo website (ảnh PNG, GIF, JPEG, JPG). Kích thước chuẩn: 770x120 (px)</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Hình favicon:</label>
    <div class="formRight">
                            <img src="/upload/images/favicon.jpg" width="20" alt="" />
            <a href="admin.php?do=infos&act=delete_img&id=1&img_del=favicon" title="Xoá ảnh">Xoá ảnh</a>
            <br />
                        <input type="file" name="favicon" class="file_1" size="50" />
        <div class="clear"></div>
        <span class="formNote">Hình favicon hiển thị ở phía trên tab của trình duyệt (ảnh PNG, ICO, JPEG, JPG). Kích thước chuẩn: 16x16 (px)</span>
    </div>
    <div class="clear"></div>
</div>
</div>
<div class="widget">
<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
    <h6>Cấu hình phân trang</h6>
</div>
<div class="formRow">
  <label>Sản phẩm:</label>
  <div class="formRight">
      <input type="text" name="paging_product" style="width:20px; text-align:center;" value="15" class="tipS" onkeypress="return OnlyNumber(event)" />
    <span class="formNote">Nhập số lượng sản phẩm bạn muốn hiển thị trong 1 trang</span>
  </div>
  <div class="clear"></div>
</div>
<div class="formRow">
  <label>Tin tức:</label>
  <div class="formRight">
      <input type="text" name="paging_article" style="width:20px; text-align:center;" value="15" class="tipS" onkeypress="return OnlyNumber(event)" />
    <span class="formNote">Nhập số lượng tin tức bạn muốn hiển thị trong 1 trang</span>
  </div>
  <div class="clear"></div>
</div>
<div class="formRow">
  <label>Danh mục:</label>
  <div class="formRight">
      <input type="text" name="paging_submenu" style="width:20px; text-align:center;" value="15" class="tipS" onkeypress="return OnlyNumber(event)" />
    <span class="formNote">Nhập số lượng danh mục bạn muốn hiển thị trong 1 trang</span>
  </div>
  <div class="clear"></div>
</div>
<div class="formRow">
  <label>Bình luận:</label>
  <div class="formRight">
      <input type="text" name="paging_comment" style="width:20px; text-align:center;" value="9" class="tipS" onkeypress="return OnlyNumber(event)" />
    <span class="formNote">Nhập số lượng bình luận bạn muốn hiển thị trong 1 sản phẩm/tin tức.</span>
  </div>
  <div class="clear"></div>
</div>
<div class="formRow">
  <label>Sản phẩm liên quan:</label>
  <div class="formRight">
      <input type="text" name="num_relate_product" style="width:20px; text-align:center;" value="9" class="tipS" onkeypress="return OnlyNumber(event)" />
    <span class="formNote">Nhập số lượng sản phẩm liên quan ở cuối mỗi sản phẩm chi tiết.</span>
  </div>
  <div class="clear"></div>
</div>
<div class="formRow">
  <label>Tin liên quan:</label>
  <div class="formRight">
      <input type="text" name="num_relate_article" style="width:20px; text-align:center;" value="1" class="tipS" onkeypress="return OnlyNumber(event)" />
    <span class="formNote">Nhập số lượng tin tức liên quan ở cuối mỗi tin tức chi tiết.</span>
  </div>
  <div class="clear"></div>
</div>
</div>
<div class="widget">
<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
    <h6>Bảo trì website</h6>
</div>
<div class="formRow">
  <label>Bảo trì:</label>
  <div class="formRight">
    <input type="checkbox" name="bao_tri" id="check1" value="1"  />
    <label for="check1">Bảo trì</label>
    <div class="clear"></div>
    <span class="formNote">Check để tạm đóng website, phần quản lý CMS vẫn vào được bình thường!</span>
  </div>
  <div class="clear"></div>
</div>
<div class="formRow">
 <label>Bắt đầu:</label>
  <div class="formRight">
                  <span class="f11">Chọn giờ: </span><input type="text" class="timepicker" name="gio_bat_dau"size="10" value="3:0:0" />
    <span class="f11">Chọn ngày: </span><input type="text" class="datepicker" name="bat_dau" value="12-3-2013" readonly="readonly" />
    <div class="clear"></div>
    <span class="formNote">Thời gian bắt đầu bảo trì, định dạng ngày-tháng-năm!</span>
  </div>
    <div class="clear"></div>
 </div>
<div class="formRow">
 <label>Kết thúc:</label>
  <div class="formRight">
                  <span class="f11">Chọn giờ: </span><input type="text" class="timepicker" name="gio_ket_thuc" size="10" value="15:0:0" />
    <span class="f11">Chọn ngày: </span><input type="text" class="datepicker" name="ket_thuc" value="4-4-2013" readonly="readonly" />
    <div class="clear"></div>
    <span class="formNote">Thời gian kết thúc bảo trì, định dạng ngày-tháng-năm, thời gian kết thúc phải sau thời gian bắt đầu!</span>
  </div>
    <div class="clear"></div>
 </div>
</div>
<div class="widget">
<div class="title"><img src="./images/admin/icons/dark/record.png" alt="" class="titleIcon" />
    <h6>Các cấu hình khác</h6>
</div>
<div class="formRow">
    <label>Banner bên trái: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title=""> </label>
    <div class="formRight"><textarea name="banner_left_vn" rows="8" cols="60"></textarea>
<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('banner_left_vn', {"height":300});
//]]></script>
</div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Banner bên phải: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title=""> </label>
    <div class="formRight"><textarea name="banner_right_vn" rows="8" cols="60"></textarea>
<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('banner_right_vn', {"height":300});
//]]></script>
</div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Google map:</label>
    <div class="formRight">
        <textarea rows="5" cols="" class="tipS" name="googlemap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1599651119623!2d106.63068462628311!3d10.799057596392949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x404fa3d83777520e!2zU2hvcCB24bqjaSDDoW8gZMOgaSBEdXnDqm4!5e0!3m2!1svi!2s!4v1479443666550" width="600" height="500" frameborder="0" style="border:0" allowfullscreen></iframe></textarea>
        <span class="formNote">Đoạn mã iframe lấy từ Google Map dùng hiển thị bản đồ của công ty!</span>
    </div>
    <div class="clear"></div>
</div>
<div class="formRow">
    <label>Trang 404: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Khi người dùng vào 1 link không tồn tại sẽ chuyển đến trang này!"> </label>
    <div class="formRight"><textarea name="404page" rows="8" cols="60">&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/ao-dai-cuoi-hoi-da-hoi/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI CƯỚI HỎI DẠ HỘI&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/ao-dai-cuoi-hoi-da-hoi/&quot;&gt;&lt;img alt=&quot;Vải áo dài cưới hỏi dạ hội&quot; src=&quot;/kcfinder/upload/images/ao-dai-cuoi-hoi-da-hoi%281%29.jpg&quot; style=&quot;width: 500px; height: 747px;&quot; title=&quot;Vải áo dài cưới hỏi dạ hội&quot; /&gt;&lt;/a&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;text-align: center; font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;text-align: center; font-size: 18px;&quot;&gt;&lt;strong&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-theu/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI &amp;nbsp;THÊU&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-theu/&quot;&gt;&lt;img alt=&quot;Vải áo dài thêu&quot; src=&quot;/kcfinder/upload/images/THEU.jpg&quot; style=&quot;width: 500px; height: 750px;&quot; title=&quot;Vải áo dài thêu&quot; /&gt;&lt;/a&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-ve/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI VẼ&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-ve/&quot;&gt;&lt;img alt=&quot;Vải áo dài vẽ&quot; src=&quot;/kcfinder/upload/images/ve.jpg&quot; style=&quot;width: 500px; height: 751px;&quot; title=&quot;Vải áo dài vẽ&quot; /&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;strong style=&quot;font-size: 18px;&quot;&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-lua/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI LỤA&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-lua/&quot;&gt;&lt;img alt=&quot;Vải áo dài lụa&quot; src=&quot;/kcfinder/upload/images/LUA.jpg&quot; style=&quot;width: 500px; height: 751px;&quot; title=&quot;Vải áo dài lụa&quot; /&gt;&lt;/a&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;strong style=&quot;font-size: 18px;&quot;&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-dinh-da-ket-cuom/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI&amp;nbsp;ĐÍNH&amp;nbsp;ĐÁ KẾT CƯỜM&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-dinh-da-ket-cuom/&quot;&gt;&lt;img alt=&quot;Vải áo dài đính đá kết cườm&quot; src=&quot;/kcfinder/upload/images/CUOM.jpg&quot; style=&quot;width: 500px; height: 740px;&quot; title=&quot;Vải áo dài đính đá kết cườm&quot; /&gt;&lt;/a&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;strong style=&quot;font-size: 18px;&quot;&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-lua-tron/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI LỤA TRƠN&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-lua-tron/&quot;&gt;&lt;img alt=&quot;Vải áo dài lụa trơn&quot; src=&quot;/kcfinder/upload/images/vai-ao-dai-lua-tron.jpeg&quot; style=&quot;width: 500px; height: 750px;&quot; title=&quot;Vải áo dài lụa trơn&quot; /&gt;&lt;/a&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;strong style=&quot;font-size: 18px;&quot;&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-lua-thun/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI LỤA THUN&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-lua-thun/&quot;&gt;&lt;img alt=&quot;Vải áo dài lụa thun&quot; src=&quot;/kcfinder/upload/images/vai-ao-dai-lua-thun.jpg&quot; style=&quot;width: 500px; height: 750px;&quot; title=&quot;Vải áo dài lụa thun&quot; /&gt;&lt;/a&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;strong style=&quot;font-size: 18px;&quot;&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-nhung-dap-nhung/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI&amp;nbsp;ĐẮP NHUNG&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-nhung-dap-nhung/&quot;&gt;&lt;img alt=&quot;Vải áo dài đắp nhung&quot; src=&quot;/kcfinder/upload/images/vai-ao-dai-nhung-dap-nhung.jpg&quot; style=&quot;width: 500px; height: 750px;&quot; title=&quot;Vải áo dài đắp nhung&quot; /&gt;&lt;/a&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;strong style=&quot;font-size: 18px;&quot;&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-gam/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI GẤM&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-gam/&quot;&gt;&lt;img alt=&quot;Vải áo dài gấm&quot; src=&quot;/kcfinder/upload/images/vai-ao-dai-gam.jpg&quot; style=&quot;width: 500px; height: 750px;&quot; title=&quot;Vải áo dài gấm&quot; /&gt;&lt;/a&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;strong style=&quot;font-size: 18px;&quot;&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-cach-tan/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI CÁCH TÂN&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-cach-tan/&quot;&gt;&lt;img alt=&quot;Vải áo dài cách tân&quot; src=&quot;/kcfinder/upload/images/vai-ao-dai-cach-tan.jpg&quot; style=&quot;width: 500px; height: 750px;&quot; title=&quot;Vải áo dài cách tân&quot; /&gt;&lt;/a&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;V&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;font color=&quot;#0000ff&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;b&gt;ẢI&amp;nbsp;ÁO DÀI MẸ VÀ BÉ&lt;/b&gt;&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;
&lt;font color=&quot;#0000ff&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;b&gt;&amp;nbsp; &amp;nbsp;&lt;img alt=&quot;Vải áo dài Mẹ và Bé&quot; src=&quot;/kcfinder/upload/images/IMG_20180402_113109.jpg&quot; style=&quot;width: 500px; height: 892px;&quot; title=&quot;Vải áo dài Mẹ và Bé&quot; /&gt;&lt;/b&gt;&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;
&lt;p&gt;
&lt;span style=&quot;text-align: center; color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;text-align: center; font-size: 28px;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(0, 0, 255);&quot;&gt;⇒&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;text-align: center; color: rgb(0, 0, 255);&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;strong style=&quot;text-align: center; font-size: 18px;&quot;&gt;&lt;a href=&quot;http://vaiaodaiduyen.com/vai-ao-dai/vai-ao-dai-cach-tan/&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;VẢI&amp;nbsp;ÁO DÀI CÁCH TÂN&lt;/span&gt;&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;
</textarea>
<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('404page', {"height":300});
//]]></script>
</div>
    <div class="clear"></div>
</div>
        <div class="formRow">
    <label>Copyright VN</label>
    <div class="formRight"><textarea name="copyright_vn" rows="8" cols="60">&lt;p&gt;
© &lt;strong&gt;Bản quyền thuộc về &lt;span style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-size: 16px;&quot;&gt;&lt;span id=&quot;cke_bm_484S&quot; style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span id=&quot;cke_bm_486S&quot; style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span id=&quot;cke_bm_487S&quot; style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span id=&quot;cke_bm_489S&quot; style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span id=&quot;cke_bm_488S&quot; style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;vaiaodaiduyen.com&lt;span id=&quot;cke_bm_489E&quot; style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span id=&quot;cke_bm_488E&quot; style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span id=&quot;cke_bm_487E&quot; style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span id=&quot;cke_bm_486E&quot; style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span id=&quot;cke_bm_484E&quot; style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;display: none;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;
</textarea>
<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('copyright_vn', {"height":300});
//]]></script>
</div>
    <div class="clear"></div>
</div>

<div class="formRow">
    <label>Link fanpage</label>
    <div class="formRight">

          <input type="text" name="facebook" class="tipS" value="https://www.facebook.com/vaiaodaiduyen1/" />
    </div>
    <div class="clear"></div>
</div>

<div class="formRow">
    <label>sdt</label>
    <div class="formRight">
    <input type="text" name="sdt" class="tipS" value="3326574015399495624" />
    </div>
    <div class="clear"></div>
</div>

<div class="formRow" style="display:none;">
    <label>Copyright EN</label>
    <div class="formRight"><textarea name="copyright_en" rows="8" cols="60"></textarea>
<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('copyright_en', {"height":300});
//]]></script>
</div>
    <div class="clear"></div>
</div>
<div class="formRow">
  <label>Tùy chọn: </label>
  <div class="formRight">
      <div style="float:left;">
        <input type="checkbox" name="showcomment" id="showcomment" value="1"  />
        <label for="showcomment">Hiện khung bình luận</label>
        <input type="checkbox" name="checkcomment" id="checkcomment" value="1"  />
        <label for="checkcomment">Kiểm duyệt bình luận <img src="./images/admin/question-button.png" alt="Upload hình" class="icon_que tipS" original-title="Kiểm duyệt bình luận của người dùng trước khi hiển thị." /></label>
        <input type="checkbox" name="showslider" id="showslider" value="1" checked="checked"/>
        <label for="showslider">Hiện slider trang chủ</label>
        <input type="checkbox" name="showlanguage" id="showlanguage" value="1"  />
        <label for="showlanguage">Web 2 ngôn ngữ</label>
        <input type="checkbox" name="noindex" id="noindex" value="1"  />
        <label for="noindex">Noindex website <img src="./images/admin/question-button.png" alt="Upload hình" class="icon_ques tipS" original-title="Check nếu bạn KHÔNG MUỐN Google index website của bạn (trong trường hợp website còn để dữ liệu mẫu)!" /></label>
    </div>
    <div style="float:left;">
                        <input type="checkbox" name="hide_right_sidebar" id="hide_right_sidebar" value="1" checked="checked"/>
        <label for="hide_right_sidebar">Ẩn cột phải (chỉ áp dụng cho trang chủ và sản phẩm)</label>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div class="formRow">
    <div class="formRight">
        <input type="hidden" name="id" value="1" />
        <input type="submit" class="blueB" value="Hoàn tất" />
    </div>
    <div class="clear"></div>
</div>
</div>
</form>        </div>
    </div>
@endsection
