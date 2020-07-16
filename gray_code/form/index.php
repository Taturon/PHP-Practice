<?php
// セッションの開始・再開
session_start();

// ファイルアップロード先の定義
define('FILE_DIR', 'images/test/');

// 変数の初期化
$page_flg = 0;
$clean = $error = [];

// 入力値のエスケープ
if (!empty($_POST)) {
	foreach ($_POST as $key => $value) {
		$clean[$key] = htmlspecialchars($value, ENT_QUOTES);
	}
}

if (!empty($clean['btn_confirm'])) {

	$error = validation($clean);
	
	// ファイルのアップロード
	if (!empty($_FILES['attachment_file']['tmp_name'])) {
		$upload_res = move_uploaded_file($_FILES['attachment_file']['tmp_name'], FILE_DIR . $_FILES['attachment_file']['name']);

		if (!$upload_res) {
			$error[] = 'ファイルのアップロードに失敗しました';
		} else {
			$clean['attachment_file'] = $_FILES['attachment_file']['name'];
		}
	}

	if (empty($error)) {
		$page_flg = 1;

		// セッションの設定
		$_SESSION['page'] = true;
	}

} elseif (!empty($clean['btn_submit'])) {

	if (!empty($_SESSION['page']) && $_SESSION['page'] === true) {
		$page_flg = 2;

		// セッションの削除
		unset($_SESSION['page']);

		// 変数の設定
		$header = null;
		$body = null;
		$auto_reply_subject = null;
		$auto_reply_text = null;
		date_default_timezone_set('Asia/Tokyo');

		// 日本語使用宣言
		mb_language("ja");
		mb_internal_encoding('UTF-8');

		// ヘッダー情報を設定
		$header = "MIME-Version: 1.0\n";
		$header .= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
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

		// テキストメッセージをセット
		$body = "__BOUNDARY__\n";
		$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
		$body .= $auto_reply_text . "\n";
		$body .= "__BOUNDARY__\n";

		// ファイル添付
		if (!empty($clean['attachment_file'])) {
			$body .= "Content-Type: application/octet-stream; name=\"{$clean['attachment_file']}\"\n";
			$body .= "Content-Disposition: attachment; filename=\"{$clean['attachment_file']}\"\n";
			$body .= "Content-Transfer-Encoding: base64\n";
			$body .= "\n";
			$body .= chunk_split(base64_encode(file_get_contents(FILE_DIR . $clean['attachment_file'])));
			$body .= "--__BOUNDARY__\n";
		}

		// メール送信
		if (mb_send_mail($clean['email'], $auto_reply_subject, $body, $header)) {
			$message = 'メールを送信致しました';
		} else {
			$message = 'メール送信に失敗しました';
		}

	} else {
		$page_flag = 0;
	}
}

// バリデーション関数の定義
function validation($data) {
	$error = [];

	// 氏名のバリデーション
	if (empty($data['name'])) {
		$error[] = '氏名に空欄は無効です';
	} elseif (mb_strlen($data['name']) > 20) {
		$error[] = '氏名は20文字以内で入力してください';
	}

	// メールアドレスのバリデーション
	if (empty($data['email'])) {
		$error[] = 'メールアドレスに空欄は無効です';
	} elseif (!(bool)filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		$error[] = 'メールアドレスが有効ではありません';
	}

	// 性別のバリデーション
	if (empty($data['gender'])) {
		$error[] = '性別の選択は必須です';
	} elseif ($data['gender'] !== 'male' && $data['gender'] !== 'female') {
		$error[] = '性別の入力値が不正です';
	}

	// 年齢のバリデーション
	if (empty($data['age'])) {
		$error[] = '年齢の選択は必須です';
	} elseif ((int)$data['age'] < 1 || (int)$data['age'] > 6) {
		$error[] = '年齢の入力値が不正です';
	}

	// お問い合わせ内容のバリデーション
	if (empty($data['contact'])) {
		$error[] = 'お問い合わせ内容に空欄は無効です';
	}

	// プライバシポリシー同意のバリデーション
	if (empty($data['contact'])) {
		$error[] = 'プライバシポリシーをご確認ください';
	} elseif ((int)$data['agreement'] !== 1) {
		$error[] = 'プライバシポリシー同意の入力値が不正です';
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
<p id="name"><?php echo $clean['name']; ?></p>
</div>
<div class="element_wrap">
<label for="email">メールアドレス</label>
<p id="email"><?php echo $clean['email']; ?></p>
</div>
<div class="element_wrap">
<label for="gender">性別</label>
<p id="gender"><?php
if ($clean['gender'] === 'male') {
	echo '男性';
} else {
	echo '女性';
} ?></p>
</div>
<div class="element_wrap">
<label for="age">年齢</label>
<p id="age"><?php
switch ($clean['age']) {
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
<p id="contact"><?php echo nl2br($clean['contact']); ?></p>
</div>
<?php if (!empty($clean['attachment_file'])): ?>
<div class="element_wrap">
<label>画像ファイルの添付</label>
<p><img src="<?php echo FILE_DIR . $clean['attachment_file']; ?>"></p>
</div>
<?php endif; ?>
<div class="element_wrap">
<label for="agreement">プライバシーポリシー</label>
<p id="agreement"><?php
if ($clean['agreement'] === "1") {
	echo '同意する';
} else {
	echo '同意しない';
} ?></p>
</div>
<input type="submit" name="btn_back" value="戻る">
<input type="submit" name="btn_submit" value="送信">
<input type="hidden" name="name" value="<?php echo $clean['name']; ?>">
<input type="hidden" name="email" value="<?php echo $clean['email']; ?>">
<input type="hidden" name="gender" value="<?php echo $clean['gender']; ?>">
<input type="hidden" name="age" value="<?php echo $clean['age']; ?>">
<input type="hidden" name="contact" value="<?php echo $clean['contact']; ?>">
<?php if (!empty($clean['attachment_file'])): ?>
<input type="hidden" name="attachment_file" value="<?php echo $clean['attachment_file']; ?>">
<?php endif; ?>
<input type="hidden" name="agreement" value="<?php echo $clean['agreement']; ?>">
</form>
<?php elseif ($page_flg === 2): ?>
<p><?php echo $message; ?></p>
<?php else: ?>
<?php if (!empty($error)): ?>
<ul class="error_list">
<?php foreach ($error as $value): ?>
<li><?php echo $value; ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<form method="POST" action="" enctype="multipart/form-data">
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
<label for="file">画像ファイルの添付</label>
<input type="file" id="file" name="attachment_file">
</div>
<div class="element_wrap">
<label>
<input type="checkbox" name="agreement" value="1" <?php
if (!empty($_POST['agreement']) && $_POST['agreement'] === '1') echo 'checked';
?>>プライバシーポリシーに同意する
</label>
</div>
<input type="submit" name="btn_confirm" value="入力内容を確認する">
</form>
<?php endif; ?>
</body>
</html>
