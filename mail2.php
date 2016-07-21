<?php header("Content-Type:text/html;charset=utf-8"); ?>
<?php //error_reporting(E_ALL | E_STRICT);
if (version_compare(PHP_VERSION, '5.1.0', '>=')) {//PHP5.1.0以上の場合のみタイムゾーンを定義
	date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定（日本以外の場合には適宜設定ください）
}
/*-------------------------------------------------------------------------------------------------------------------
* ★以下設定時の注意点　
* ・値（=の後）は数字以外の文字列（一部を除く）はダブルクオーテーション「"」、または「'」で囲んでいます。
* ・これをを外したり削除したりしないでください。後ろのセミコロン「;」も削除しないください。
* ・また先頭に「$」が付いた文字列は変更しないでください。数字の1または0で設定しているものは必ず半角数字で設定下さい。
* ・メールアドレスのname属性の値が「Email」ではない場合、以下必須設定箇所の「$Email」の値も変更下さい。
* ・name属性の値に半角スペースは使用できません。
*以上のことを間違えてしまうとプログラムが動作しなくなりますので注意下さい。
-------------------------------------------------------------------------------------------------------------------*/


//---------------------------　必須設定　必ず設定してください　-----------------------

//サイトのトップページのURL　※デフォルトでは送信完了後に「トップページへ戻る」ボタンが表示されますので
$site_top = "http://g7-meeting-takamatsu.kagawa.jp/";

// 管理者メールアドレス ※メールを受け取るメールアドレス(複数指定する場合は「,」で区切ってください 例 $to = "aa@aa.aa,bb@bb.bb";)
$to = "tkaneko@miew.co.jp";

//フォームのメールアドレス入力箇所のname属性の値（name="○○"　の○○部分）
$Email = "E-mail";

/*------------------------------------------------------------------------------------------------
以下スパム防止のための設定　
※有効にするにはこのファイルとフォームページが同一ドメイン内にある必要があります
------------------------------------------------------------------------------------------------*/

//スパム防止のためのリファラチェック（フォームページが同一ドメインであるかどうかのチェック）(する=1, しない=0)
$Referer_check = 0;

//リファラチェックを「する」場合のドメイン ※以下例を参考に設置するサイトのドメインを指定して下さい。
$Referer_check_domain = "g7-meeting-takamatsu.kagawa.jp";

//---------------------------　必須設定　ここまで　------------------------------------


//---------------------- 任意設定　以下は必要に応じて設定してください ------------------------


// 管理者宛のメールで差出人を送信者のメールアドレスにする(する=1, しない=0)
// する場合は、メール入力欄のname属性の値を「$Email」で指定した値にしてください。
//メーラーなどで返信する場合に便利なので「する」がおすすめです。
$userMail = 1;

// Bccで送るメールアドレス(複数指定する場合は「,」で区切ってください 例 $BccMail = "aa@aa.aa,bb@bb.bb";)
$BccMail = "";

// 管理者宛に送信されるメールのタイトル（件名）
$subject = "ホームページのお問い合わせ";

// 送信確認画面の表示(する=1, しない=0)
$confirmDsp = 1;

// 送信完了後に自動的に指定のページ(サンクスページなど)に移動する(する=1, しない=0)
// CV率を解析したい場合などはサンクスページを別途用意し、URLをこの下の項目で指定してください。
// 0にすると、デフォルトの送信完了画面が表示されます。
$jumpPage = 0;

// 送信完了後に表示するページURL（上記で1を設定した場合のみ）※httpから始まるURLで指定ください。
$thanksPage = "http://xxx.xxxxxxxxx/thanks.html";

// 必須入力項目を設定する(する=1, しない=0)
$requireCheck = 0;

/* 必須入力項目(入力フォームで指定したname属性の値を指定してください。（上記で1を設定した場合のみ）
値はシングルクォーテーションで囲み、複数の場合はカンマで区切ってください。フォーム側と順番を合わせると良いです */
$require = array('件名','お名前','E-mail','お問い合わせ内容');


//----------------------------------------------------------------------
//  自動返信メール設定(START)
//----------------------------------------------------------------------

// 差出人に送信内容確認メール（自動返信メール）を送る(送る=1, 送らない=0)
// 送る場合は、フォーム側のメール入力欄のname属性の値が上記「$Email」で指定した値と同じである必要があります
$remail = 1;

//自動返信メールの送信者欄に表示される名前　※あなたの名前や会社名など（もし自動返信メールの送信者名が文字化けする場合ここは空にしてください）
$refrom_name = "G7香川・高松情報通信大臣会合推進協議会";

// 差出人に送信確認メールを送る場合のメールのタイトル（上記で1を設定した場合のみ）
$re_subject = "G7香川┃ 送信ありがとうございました";

//フォーム側の「名前」箇所のname属性の値　※自動返信メールの「○○様」の表示で使用します。
//指定しない、または存在しない場合は、○○様と表示されないだけです。あえて無効にしてもOK
$dsp_name = 'name';

//自動返信メールの冒頭の文言 ※日本語部分のみ変更可
$remail_text = <<< TEXT

お問い合わせありがとうございました。
いただいた内容を確認のうえ返信いたしますので、今しばらくお待ちください。

ご送信いただいた内容は下記の通りです。

TEXT;


//自動返信メールに署名（フッター）を表示(する=1, しない=0)※管理者宛にも表示されます。
$mailFooterDsp = 1;

//上記で「1」を選択時に表示する署名（フッター）（FOOTER～FOOTER;の間に記述してください）
$mailSignature = <<< FOOTER

＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿________________
G7香川・高松情報通信大臣会合推進協議会
(香川県交流推進部交流推進課 サミット閣僚会合推進室内)
￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
〒760-0017
香川県高松市番町四丁目1番10号

　E-mail: info@g7-meeting-takamatsu.kagawa.jp
　URL: http://g7-meeting-takamatsu.kagawa.jp/
＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿

FOOTER;


//----------------------------------------------------------------------
//  自動返信メール設定(END)
//----------------------------------------------------------------------

//メールアドレスの形式チェックを行うかどうか。(する=1, しない=0)
//※デフォルトは「する」。特に理由がなければ変更しないで下さい。メール入力欄のname属性の値が上記「$Email」で指定した値である必要があります。
$mail_check = 1;

//------------------------------- 任意設定ここまで ---------------------------------------------


// 以下の変更は知識のある方のみ自己責任でお願いします。


//----------------------------------------------------------------------
//  関数実行、変数初期化
//----------------------------------------------------------------------
$encode = "UTF-8";//このファイルの文字コード定義（変更不可）

if(isset($_GET)) $_GET = sanitize($_GET);//NULLバイト除去//
if(isset($_POST)) $_POST = sanitize($_POST);//NULLバイト除去//
if(isset($_COOKIE)) $_COOKIE = sanitize($_COOKIE);//NULLバイト除去//
if($encode == 'SJIS') $_POST = sjisReplace($_POST,$encode);//Shift-JISの場合に誤変換文字の置換実行
$funcRefererCheck = refererCheck($Referer_check,$Referer_check_domain);//リファラチェック実行

//変数初期化
$sendmail = 0;
$empty_flag = 0;
$post_mail = '';
$errm ='';
$header ='';

if($requireCheck == 1) {
	$requireResArray = requireCheck($require);//必須チェック実行し返り値を受け取る
	$errm = $requireResArray['errm'];
	$empty_flag = $requireResArray['empty_flag'];
}
//メールアドレスチェック
if(empty($errm)){
	foreach($_POST as $key=>$val) {
		if($val == "confirm_submit") $sendmail = 1;
		if($key == $Email) $post_mail = h($val);
		if($key == $Email && $mail_check == 1 && !empty($val)){
			if(!checkMail($val)){
				$errm .= "<p class=\"error_messe\">【".$key."】はメールアドレスの形式が正しくありません。</p>\n";
				$empty_flag = 1;
			}
		}
	}
}
//差出人に届くメールをセット
if($remail == 1) {
	$userBody = mailToUser($_POST,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode);
	$reheader = userHeader($refrom_name,$to,$encode);
	$re_subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($re_subject,"JIS",$encode))."?=";
}
//管理者宛に届くメールをセット
	$adminBody = mailToAdmin($_POST,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp);
	$header = adminHeader($userMail,$post_mail,$BccMail,$to);
	$subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS",$encode))."?=";
  
if(($confirmDsp == 0 || $sendmail == 1) && $empty_flag != 1){
  mail($to,$subject,$adminBody,$header);
  if($remail == 1) mail($post_mail,$re_subject,$userBody,$reheader);
}
else if($confirmDsp == 1){ 

/*　▼▼▼送信確認画面のレイアウト※編集可　オリジナルのデザインも適用可能▼▼▼　*/
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>日本臨床肛門病学会</title>
<link href="./css/base_c.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<a name="pTop" id="pTop"></a>
<noscript>
  <div id="nsBelt">
    <div class="nsMsg">すべての機能をご利用いただくには Javascript を有効にして下さい。
    </div>
  </div>
</noscript>
<div id="container">
<!--header-->
  <a name="jumpToContents" id="jumpToContents" class="hidden"></a>
      <div id="wrap">
        <div id="header2">
      <div class="head-trans">
        <a href="./index.html">日本語</a>｜<a href="./english/index.html">English</a></div>
        <div id="headerInner" class="innerBox">
          <div id="div_1"><!--SP menu-->
		  <div class="header-title">
          <span class="resizeimage">
		  　　<p style="font-size:200%;padding:0 30px">日本臨床肛門病学会<p>

          </span>
		  </div>
          <div class="menu-bt"><input type="button" style="gMenu" id="sp-menu1"
            onclick="document.getElementById('div_2').style.display='block'; document.getElementById('div_1').style.display='none'"></input></div>
          </div>
		  <div class="clearfix"></div>
          <div id="div_2" style="display:none">
		  <div class="header-title">
          <span class="resizeimage">
          <img src="./main_content/head_sp.png" class="miniimage" alt="G7香川高松情報通信大臣会合" />
          <a href="./index.html"><img src="./main_content/head_pc.png" class="bigimage" alt="G7香川高松情報通信大臣会合" /></a>
          </span>
		  </div>
          <div class="menu-bt"><input type="button" style="gMenu" id="sp-menu2"
            onclick="document.getElementById('div_2').style.display='none'; document.getElementById('div_1').style.display='block'"></input></div>
		  <div class="clearfix"></div>
          <div id="sideTower" class="sideTower-in">
            <div class="sideWidget">
                <ul>
                  <li><a href="index.html">ホーム</a></li>
                  <li><a href="message.html">理事長挨拶<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="about.html">設立趣意<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="msc.html" class="multi-li">役員一覧<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="exhibition.html">定款<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="sict.html">入会案内<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="http://www.soumu.go.jp/soutsu/shikoku/koho/teleporter/20160202.html" target="_blank">研究会開催記録<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="venues.html">学会員施設一覧<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                </ul>
            </div>
          </div><!--SP menu-->
          </div>
        </div>
        <div id="main">
          <div id="container2" class="innerBox">
            <div id="sideTower-pc" class="sideTower-in">
              <div class="sideWidget">
                <ul>
                  <li><a href="index.html">ホーム</a></li>
                  <li><a href="message.html">理事長挨拶</a></li>
                  <li><a href="about.html">設立趣意</a></li>
                  <li><a href="msc.html" class="multi-li">役員一覧</a></li>
                  <li><a href="exhibition.html">定款</a></li>
                  <li><a href="sict.html">入会案内</a></li>
                  <li><a href="http://www.soumu.go.jp/soutsu/shikoku/koho/teleporter/20160202.html" target="_blank">研究会開催記録</a></li>
                  <li><a href="venues.html">学会員施設一覧</a></li>
                </ul>
              </div>
              <ul class="side-ban">
                  <li></li>
                  <li></li>
                  <li></li>
              </ul>
            </div><!--#sideTower-->
            <!--#content-->
            <div id="content" class="content1">
			    <div class="bread">
     				 <a href="/index.html">臨床肛門学会</a> &gt; 
    			</div>

              <div id="content-main">
                <div id="free-area">
                  <h1>お問い合わせ</h1>
<!-- ▲ Headerやその他コンテンツなど　※自由に編集可 ▲-->

<!-- ▼************ 送信内容表示部　※編集は自己責任で ************ ▼-->

<div id="formWrap">
<?php if($empty_flag == 1){ ?>
<div align="center">
<h5>入力にエラーがあります。<br>下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h5>
<?php echo $errm; ?><br><br><input class="mt-30 mailform_modoru2" type="button" value=" " onClick="history.back()">
</div>
<?php }else{ ?>
<div align="center" class="mb30">
	<h4>以下の内容で間違いがなければ、「送信」ボタンを押してください。</h4></div>
	<form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="POST" class="check">
		<table class="mailform_table2 mb10 mcenter">
			<?php echo confirmOutput($_POST);//入力内容を表示?>
		</table>
		<p align="center">
			<input type="hidden" name="mail_set" value="confirm_submit">
			<input type="hidden" name="httpReferer" value="<?php echo h($_SERVER['HTTP_REFERER']);?>">
			<input class="mt40 mb30 mr20 mailform_sousin"type="submit" value="送信する">
			<input class="mt40 mb30 mailform_modoru"type="button" value="戻る" onClick="history.back()">
		</p>
	</form>
<?php } ?>
</div><!-- /formWrap -->

<!-- content -->
<!-- ▲ *********** 送信内容確認部　※編集は自己責任で ************ ▲-->

<!-- ▼ Footerその他コンテンツなど　※編集可 ▼-->
</article>
</div>
<!-- footer START -->
                </div><!--free-area-->
              </div><!--#content-main-->
            </div><!--#content-->
            <!--#footerSection-->
            <div id="siteBottom" class="clearfix">
              <div class="footer-link">
                <img src="./main_content/icon-link.png" alt="link_icon" /> ■お問い合わせ
                <div class="footerbox2">
                  　　日本臨床肛門病学会事務局<br />
				  　　〒102-0075　東京都千代田区三番町２<br />
				  　　三番町ＫＳビル<br />
				  　　TEL：03-3263-8697<br />
				  　　FAX: 03-3263-8687<br />
				  　　E-Mail:rinkoken@secretariat.ne.jp<br />
                </div>
			  </div>
			  <div class="footer-link">
                <img src="./main_content/icon-link.png" alt="link_icon" /> ■リンク
                <div class="footerbox2">
                  　　-リンク1<br />
				  　　-リンク2<br />
				  　　-リンク3<br />

                </div>
              </div>
            </div>
          </div><!--container2-->
        </div><!--main -->
      </div><!--wrap-->
<!--footer-->
  <a name="jumpToFooter" id="jumpToFooter"></a>
</div><!--container-->
</div>
</body>
</html><?php
/* ▲▲▲送信確認画面のレイアウト　※オリジナルのデザインも適用可能▲▲▲　*/
}

if(($jumpPage == 0 && $sendmail == 1) || ($jumpPage == 0 && ($confirmDsp == 0 && $sendmail == 0))) { 

/* ▼▼▼送信完了画面のレイアウト　編集可 ※送信完了後に指定のページに移動しない場合のみ表示▼▼▼　*/
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>日本臨床肛門病学会</title>
<link href="./css/base_c.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<a name="pTop" id="pTop"></a>
<noscript>
  <div id="nsBelt">
    <div class="nsMsg">すべての機能をご利用いただくには Javascript を有効にして下さい。
    </div>
  </div>
</noscript>
<div id="container">
<!--header-->
  <a name="jumpToContents" id="jumpToContents" class="hidden"></a>
      <div id="wrap">
        <div id="header2">
      <div class="head-trans">
        <a href="./index.html">日本語</a>｜<a href="./english/index.html">English</a></div>
        <div id="headerInner" class="innerBox">
          <div id="div_1"><!--SP menu-->
		  <div class="header-title">
          <span class="resizeimage">
		  　　<p style="font-size:200%;padding:0 30px">日本臨床肛門病学会<p>

          </span>
		  </div>
          <div class="menu-bt"><input type="button" style="gMenu" id="sp-menu1"
            onclick="document.getElementById('div_2').style.display='block'; document.getElementById('div_1').style.display='none'"></input></div>
          </div>
		  <div class="clearfix"></div>
          <div id="div_2" style="display:none">
		  <div class="header-title">
          <span class="resizeimage">
          <img src="./main_content/head_sp.png" class="miniimage" alt="G7香川高松情報通信大臣会合" />
          <a href="./index.html"><img src="./main_content/head_pc.png" class="bigimage" alt="G7香川高松情報通信大臣会合" /></a>
          </span>
		  </div>
          <div class="menu-bt"><input type="button" style="gMenu" id="sp-menu2"
            onclick="document.getElementById('div_2').style.display='none'; document.getElementById('div_1').style.display='block'"></input></div>
		  <div class="clearfix"></div>
          <div id="sideTower" class="sideTower-in">
            <div class="sideWidget">
                <ul>
                  <li><a href="index.html">ホーム</a></li>
                  <li><a href="message.html">理事長挨拶<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="about.html">設立趣意<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="msc.html" class="multi-li">役員一覧<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="exhibition.html">定款<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="sict.html">入会案内<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="http://www.soumu.go.jp/soutsu/shikoku/koho/teleporter/20160202.html" target="_blank">研究会開催記録<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                  <li><a href="venues.html">学会員施設一覧<img src="main_content/sm-arrow.png" alt="" width="8" height="12" align="right"  style="padding-right:10px"></a></li>
                </ul>
            </div>
          </div><!--SP menu-->
          </div>
        </div>
        <div id="main">
          <div id="container2" class="innerBox">
            <div id="sideTower-pc" class="sideTower-in">
              <div class="sideWidget">
                <ul>
                  <li><a href="index.html">ホーム</a></li>
                  <li><a href="message.html">理事長挨拶</a></li>
                  <li><a href="about.html">設立趣意</a></li>
                  <li><a href="msc.html" class="multi-li">役員一覧</a></li>
                  <li><a href="exhibition.html">定款</a></li>
                  <li><a href="sict.html">入会案内</a></li>
                  <li><a href="http://www.soumu.go.jp/soutsu/shikoku/koho/teleporter/20160202.html" target="_blank">研究会開催記録</a></li>
                  <li><a href="venues.html">学会員施設一覧</a></li>
                </ul>
              </div>
              <ul class="side-ban">
                  <li></li>
                  <li></li>
                  <li></li>
              </ul>
            </div><!--#sideTower-->
            <!--#content-->
            <div id="content" class="content1">
			    <div class="bread">
     				 <a href="/index.html">臨床肛門学会</a> &gt; 
    			</div>

              <div id="content-main">
                <div id="free-area">
                  <h1>お問い合わせ</h1>
<?php if($empty_flag == 1){ ?>
<h5>入力にエラーがあります。<br>下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h5>
<div style="color:red"><?php echo $errm; ?></div>
<br><br><input class="mailform_modoru2" type="button" value=" " onClick="history.back()">
                </div><!--free-area-->
              </div><!--#content-main-->
            </div><!--#content-->
            <!--#footerSection-->
            <div id="siteBottom" class="clearfix">
              <div class="footer-link">
                <img src="./main_content/icon-link.png" alt="link_icon" /> ■お問い合わせ
                <div class="footerbox2">
                  　　日本臨床肛門病学会事務局<br />
				  　　〒102-0075　東京都千代田区三番町２<br />
				  　　三番町ＫＳビル<br />
				  　　TEL：03-3263-8697<br />
				  　　FAX: 03-3263-8687<br />
				  　　E-Mail:rinkoken@secretariat.ne.jp<br />
                </div>
			  </div>
			  <div class="footer-link">
                <img src="./main_content/icon-link.png" alt="link_icon" /> ■リンク
                <div class="footerbox2">
                  　　-リンク1<br />
				  　　-リンク2<br />
				  　　-リンク3<br />

                </div>
              </div>
            </div>
          </div><!--container2-->
        </div><!--main -->
      </div><!--wrap-->
<!--footer-->
  <a name="jumpToFooter" id="jumpToFooter"></a>
</div><!--container-->
</div>
</body>
</html><!--　▼送信後画面▼　-->
<?php }else{ ?>
<p align="center">送信ありがとうございました。<br>
送信は正常に完了しました。<br><br>
<a href="index.html">トップページへ戻る&emsp;&raquo;</a></p>


<!--  CV率を計測する場合ここにAnalyticsコードを貼り付け -->
                </div><!--free-area-->
              </div><!--#content-main-->
            </div><!--#content-->
            <!--#footerSection-->
            <div id="siteBottom" class="clearfix">
              <div class="footer-link">
                <img src="./main_content/icon-link.png" alt="link_icon" /> ■お問い合わせ
                <div class="footerbox2">
                  　　日本臨床肛門病学会事務局<br />
				  　　〒102-0075　東京都千代田区三番町２<br />
				  　　三番町ＫＳビル<br />
				  　　TEL：03-3263-8697<br />
				  　　FAX: 03-3263-8687<br />
				  　　E-Mail:rinkoken@secretariat.ne.jp<br />
                </div>
			  </div>
			  <div class="footer-link">
                <img src="./main_content/icon-link.png" alt="link_icon" /> ■リンク
                <div class="footerbox2">
                  　　-リンク1<br />
				  　　-リンク2<br />
				  　　-リンク3<br />

                </div>
              </div>
            </div>
          </div><!--container2-->
        </div><!--main -->
      </div><!--wrap-->
<!--footer-->
  <a name="jumpToFooter" id="jumpToFooter"></a>
</div><!--container-->
</div>
</body>
</html><?php 
/* ▲▲▲送信完了画面のレイアウト 編集可 ※送信完了後に指定のページに移動しない場合のみ表示▲▲▲　*/
  }
}
//確認画面無しの場合の表示、指定のページに移動する設定の場合、エラーチェックで問題が無ければ指定ページヘリダイレクト
else if(($jumpPage == 1 && $sendmail == 1) || $confirmDsp == 0) { 
	if($empty_flag == 1){ ?>
<div align="center">
	<h5>入力にエラーがあります。<br>下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h5>
	<div style="color:red"><?php echo $errm; ?></div>
	<br><br><input type="button" value=" 前画面に戻る " onClick="history.back()"></div>
<?php 
	}else{ header("Location: ".$thanksPage); }
}

// 以下の変更は知識のある方のみ自己責任でお願いします。

//----------------------------------------------------------------------
//  関数定義(START)
//----------------------------------------------------------------------
function checkMail($str){
	$mailaddress_array = explode('@',$str);
	if(preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/", "$str") && count($mailaddress_array) ==2){
		return true;
	}else{
		return false;
	}
}
function h($string) {
	global $encode;
	return htmlspecialchars($string, ENT_QUOTES,$encode);
}
function sanitize($arr){
	if(is_array($arr)){
		return array_map('sanitize',$arr);
	}
	return str_replace("\0","",$arr);
}
//Shift-JISの場合に誤変換文字の置換関数
function sjisReplace($arr,$encode){
	foreach($arr as $key => $val){
		$key = str_replace('＼','ー',$key);
		$resArray[$key] = $val;
	}
	return $resArray;
}
//送信メールにPOSTデータをセットする関数
function postToMail($arr){
	$resArray = '';
	foreach($arr as $key => $val){
		$out = '';
		if(is_array($val)){
			foreach($val as $item){ 
				$out .= $item . ', '; 
			}
			$out = rtrim($out,', ');
		}else{
			$out = $val;
		}
		if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
		if($out != "confirm_submit" && $key != "httpReferer") {
			$resArray .= "【 ".$key." 】 ".$out."\n";
		}
	}
	return $resArray;
}
//確認画面の入力内容出力用関数
function confirmOutput($arr){
	$html = '';
	foreach($arr as $key => $val) {
		$out = '';
		if(is_array($val)){
			foreach($val as $item){ 
				$out .= $item . ', '; 
			}
			$out = rtrim($out,', ');
		}else { $out = $val; }//チェックボックス（配列）追記ここまで
		if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
		$out = nl2br(h($out));//※追記 改行コードを<br>タグに変換
		$key = h($key);
		
		$html .= "<tr><th>".$key."</th><td>".$out;
		$html .= '<input type="hidden" name="'.$key.'" value="'.str_replace(array("<br>","<br>"),"",$out).'" />';
		$html .= "</td></tr>\n";
	}
	return $html;
}
//管理者宛送信メールヘッダ
function adminHeader($userMail,$post_mail,$BccMail,$to){
	$header = '';
	if($userMail == 1 && !empty($post_mail)) {
		$header="From: $post_mail\n";
		if($BccMail != '') {
		  $header.="Bcc: $BccMail\n";
		}
		$header.="Reply-To: ".$post_mail."\n";
	}else {
		if($BccMail != '') {
		  $header="Bcc: $BccMail\n";
		}
		$header.="Reply-To: ".$to."\n";
	}
		$header.="Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
		return $header;
}
//管理者宛送信メールボディ
function mailToAdmin($arr,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp){
	$adminBody="「".$subject."」から送信がありました\n\n";
	$adminBody .="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$adminBody.= postToMail($arr);//POSTデータを関数からセット
	$adminBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$adminBody.="送信された日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
	$adminBody.="送信者のIPアドレス：".@$_SERVER["REMOTE_ADDR"]."\n";
	$adminBody.="送信者のホスト名：".getHostByAddr(getenv('REMOTE_ADDR'))."\n";
	if($confirmDsp != 1){
		$adminBody.="問い合わせのページURL：".@$_SERVER['HTTP_REFERER']."\n";
	}else{
		$adminBody.="問い合わせのページURL：".@$arr['httpReferer']."\n";
	}
	if($mailFooterDsp == 1) $adminBody.= $mailSignature;
	return mb_convert_encoding($adminBody,"JIS",$encode);
}

//ユーザ宛送信メールヘッダ
function userHeader($refrom_name,$to,$encode){
	$reheader = "From: ";
	if(!empty($refrom_name)){
		$default_internal_encode = mb_internal_encoding();
		if($default_internal_encode != $encode){
			mb_internal_encoding($encode);
		}
		$reheader .= mb_encode_mimeheader($refrom_name)." <".$to.">\nReply-To: ".$to;
	}else{
		$reheader .= "$to\nReply-To: ".$to;
	}
	$reheader .= "\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
	return $reheader;
}
//ユーザ宛送信メールボディ
function mailToUser($arr,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode){
	$userBody = '';
	if(isset($arr[$dsp_name])) $userBody = h($arr[$dsp_name]). " 様\n";
	$userBody.= $remail_text;
	$userBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$userBody.= postToMail($arr);//POSTデータを関数からセット
	$userBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$userBody.="送信日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
	if($mailFooterDsp == 1) $userBody.= $mailSignature;
	return mb_convert_encoding($userBody,"JIS",$encode);
}
//必須チェック関数
function requireCheck($require){
	$res['errm'] = '';
	$res['empty_flag'] = 0;
	foreach($require as $requireVal){
		$existsFalg = '';
		foreach($_POST as $key => $val) {
			if($key == $requireVal && empty($val)) {
				$res['errm'] .= "<p class=\"error_messe\">【".$key."】は必須入力項目です。</p>\n";
				$res['empty_flag'] = 1;
				$existsFalg = 1;
				break;
			}elseif($requireVal == $key){
				$existsFalg = 1;
				break;
			}
		}
		if($existsFalg != 1){
				$res['errm'] .= "<p class=\"error_messe\">【".$requireVal."】が未選択です。</p>\n";
				$res['empty_flag'] = 1;
		}
	}
	
	return $res;//連想配列で値を返す
}
//リファラチェック
function refererCheck($Referer_check,$Referer_check_domain){
	if($Referer_check == 1 && !empty($Referer_check_domain)){
		if(strpos($_SERVER['HTTP_REFERER'],$Referer_check_domain) === false){
			return exit('<p align="center">リファラチェックエラー。フォームページのドメインとこのファイルのドメインが一致しません</p>');
		}
	}
}
function copyright(){
	echo '<a style="display:block;text-align:center;margin:15px 0;font-size:11px;color:#aaa;text-decoration:none" href="http://www.php-factory.net/" target="_blank"></a>';
}
//----------------------------------------------------------------------
//  関数定義(END)
//----------------------------------------------------------------------
?>