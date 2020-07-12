<?php
// 変数の初期化
$page_flg = 0;
$clean = $error = [];

// 入力値のエスケープ
if (!empty($_POST)) {
	foreach ($_POST ad $key => $value) {
		$clean[$key] = htmlspecialchars($value, ENT_QUOTES);
	}
}

if (!empty($_POST['btn_confirm'])) {

	$error = validation($clean);
	
	if (empty($error)) {
		$page_flg = 1;
	}

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
	$auto_reply_text .= '氏名:' . $_POST['name'] . "\n";
	$auto_reply_text .= 'メールアドレス:' . $_POST['email'] . "\n";

	if ($_POST['gender'] === 'male') {
		$auto_reply_text .= "性別:男性\n";
	} else {
		$auto_reply_text .= "性別:女性\n";
	}

	switch ($_POST['age']) {
		case "1":
			$auto_reply_text .= '〜１９歳';
			break;
		case "2":
			$auto_reply_text .= '２０歳〜２９歳';
			break;
		case "3":
			$auto_reply_text .= '３０歳〜３９歳';
			break;
		case "4":
			$auto_reply_text .= '４０歳〜４９歳';
			break;
		case "5":
			$auto_reply_text .= '５０歳〜５９歳';
			break;
		case "6":
			$auto_reply_text .= '６０歳〜';
			break;
	}

	$auto_reply_text .= 'お問い合わせ内容:' . nl2br($_POST['contact']) . "\n\n";
	$auto_reply_text .= 'GRAYCODE事務局' . "\n";

	// メール送信
	if (mb_send_mail($_POST['email'], $auto_reply_subject, $auto_reply_text, $header)) {
		$message = 'メールを送信致しました';
	} else {
		$message = 'メール送信に失敗しました';
	}
}

// バリデーション関数の定義
function validation($data) {
	$error = [];

	// 氏名のバリデーション
	if (empty($data['name'])) {
		$error[] = '氏名に空欄は無効です';
	}

	return $error;
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
<div class="element_wrap">
<label for="gender">性別</label>
<p id="gender"><?php
if ($_POST['gender'] === 'male') {
	echo '男性';
} else {
	echo '女性';
} ?></p>
</div>
<div class="element_wrap">
<label for="age">年齢</label>
<p id="age"><?php
switch ($_POST['age']) {
	case "1":
		echo '〜１９歳';
		break;
	case "2":
		echo '２０歳〜２９歳';
		break;
	case "3":
		echo '３０歳〜３９歳';
		break;
	case "4":
		echo '４０歳〜４９歳';
		break;
	case "5":
		echo '５０歳〜５９歳';
		break;
	case "6":
		echo '６０歳〜';
		break;
} ?></p>
</div>
<div class="element_wrap">
<label for="contact">お問い合わせ内容</label>
<p id="contact"><?php echo nl2br($_POST['contact']); ?></p>
</div>
<div class="element_wrap">
<label for="agreement">プライバシーポリシー</label>
<p id="agreement"><?php
if ($_POST['agreement'] === "1") {
	echo '同意する';
} else {
	echo '同意しない';
} ?></p>
</div>
<input type="submit" name="btn_back" value="戻る">
<input type="submit" name="btn_submit" value="送信">
<input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
<input type="hidden" name="gender" value="<?php echo $_POST['gender']; ?>">
<input type="hidden" name="age" value="<?php echo $_POST['age']; ?>">
<input type="hidden" name="contact" value="<?php echo $_POST['contact']; ?>">
<input type="hidden" name="agreement" value="<?php echo $_POST['agreement']; ?>">
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
<label><input type="radio" name="gender" value="male" <?php
if (!empty($_POST['gender']) && $_POST['gender'] === 'male') echo 'checked';
?>>男性</label>
<label><input type="radio" name="gender" value="female" <?php
if (!empty($_POST['gender']) && $_POST['gender'] === 'female') echo 'checked';
?>>女性</label>
</div>
<div class="element_wrap">
<label for="age">年齢</label>
<select id="age" name="age">
<option value="">選択して下さい</option>
<option value="1" <?php
if (!empty($_POST['age']) && $_POST['age'] === '1') echo 'selected';
?>>〜１９歳</option>
<option value="2" <?php
if (!empty($_POST['age']) && $_POST['age'] === '2') echo 'selected';
?>>２０歳〜２９歳</option>
<option value="3" <?php
if (!empty($_POST['age']) && $_POST['age'] === '3') echo 'selected';
?>>３０歳〜３９歳</option>
<option value="4" <?php
if (!empty($_POST['age']) && $_POST['age'] === '4') echo 'selected';
?>>４０歳〜４９歳</option>
<option value="5" <?php
if (!empty($_POST['age']) && $_POST['age'] === '5') echo 'selected';
?>>５０歳〜５９歳</option>
<option value="6" <?php
if (!empty($_POST['age']) && $_POST['age'] === '6') echo 'selected';
?>>６０歳〜</option>
</select>
</div>
<div class="element_wrap">
<label for="contact">お問い合わせ内容</label>
<textarea id="contact" name="contact"><?php
if (!empty($_POST['contact'])) echo $_POST['contact'];
?></textarea>
</div>
<div class="element_wrap">
<label>
<input type="checkbox" name="agreement" value="1">プライバシーポリシーに同意する
</label>
</div>
<input type="submit" name="btn_confirm" value="入力内容を確認する" <?php
if (!empty($_POST['agreement']) && $_POST['agreement'] === '1') echo 'checked';
?>>
</form>
<?php endif; ?>
</body>
</html>
