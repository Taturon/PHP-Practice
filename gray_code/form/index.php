<?php
// 変数の初期化
$page_flg = 0;

if (!empty($_POST['btn_confirm'])) {
	$page_flg = 1;
} elseif (!empty($_POST['btn_submit'])) {
	$page_flg = 2;

	// 変数の設定
	$header = null;
	$auto_reply_subject = null;
	$auto_reply_text = null;
	date_default_timezone_set('Asia/Tokyo');

	// ヘッダー情報を設定
	$header = "MIME-Version: 1.0\n";
	$header .= "From: GRYCODE <noreply@gray-code.con>\n";
	$header .= "Reply-To: GRYCODE <noreply@gray-code.con>\n";

	// 件名を設定
	$auto_reply_subject = 'お問い合わせありがとうございます';

	// 本文を設定
	$auto_reply_text = 'この度は、お問い合わせ頂き誠にありがとうございます。下記の内容でお問い合わせを受け付けました。\n\n';
	$auto_reply_text .= 'お問い合わせ日時:' . date('Y-m-d H:i') . "\n";
	$auto_reply_text .= '氏名:' . $_POST['name'];
	$auto_reply_text .= 'メールアドレス:' . $_POST['email'];
	$auto_reply_text .= 'タツロン®️';

	// メール送信
	if (mb_send_mail($_POST['email'], $auto_reply_subject, $auto_reply_text, $header)) {
		$message = 'メールを送信致しました';
	} else {
		$message = 'メール送信に失敗しました';
	}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ひと言掲示板</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<h1>お問い合わせフォーム</h1>
<?php if ($page_flg === 1): ?>
<form method="POST">
<div class="element_wrap">
<label for="name">氏名</label>
<p id="name"><?php echo $_POST['name']; ?></p>
</div>
<div class="element_wrap">
<label for="email">メールアドレス</label>
<p id="email"><?php echo $_POST['email']; ?></p>
</div>
<input type="submit" name="btn_back" value="戻る">
<input type="submit" name="btn_submit" value="送信">
<input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
</form>
<?php elseif ($page_flg === 2): ?>
<p><?php echo $message; ?></p>
<?php else: ?>
<form method="POST">
<div class="element_wrap">
<label for="name">氏名</label>
<input id="name" type="text" name="name" value="<?php
if (!empty($_POST['name'])) echo $_POST['name'];
?>">
</div>
<div class="element_wrap">
<label for="email">メールアドレス</label>
<input id="email" type="text" name="email" value="<?php
if (!empty($_POST['email'])) echo $_POST['email'];
?>">
</div>
<div class="element_wrap">
<label>性別</label>
<label><input type="radio" name="gender" value="male">男性</label>
<label><input type="radio" name="gender" value="female">女性</label>
</div>
<div class="element_wrap">
<label for="age">年齢</label>
<select id="age" name="age">
<option value="">選択して下さい</option>
<option value="1">〜１９歳</option>
<option value="2">２０歳〜２９歳</option>
<option value="3">３０歳〜３９歳</option>
<option value="4">４０歳〜４９歳</option>
<option value="5">５０歳〜５９歳</option>
<option value="6">６０歳〜</option>
</select>
</div>
<div class="element_wrap">
<label for="contact">お問い合わせ内容</label>
<textarea id="contact" name="contact"></textarea>
</div>
<div class="element_wrap">
<label>
<input type="checkbox" name="agreement" value="1">プライバシーポリシーに同意する
</label>
</div>
<input type="submit" name="btn_confirm" value="入力内容を確認する">
</form>
<?php endif; ?>
</body>
</html>
