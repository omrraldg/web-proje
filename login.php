<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

function endsWith($haystack, $needle) {
  return substr($haystack, -strlen($needle)) === $needle;
}

if (
  !filter_var($username, FILTER_VALIDATE_EMAIL) ||
  !(endsWith($username, "@sakarya.edu.tr") || endsWith($username, "@ogr.sakarya.edu.tr"))
) {
  header("Location: login.html?error=invalid_email");
  exit();
}

$only_id = explode("@", $username)[0];
$expected_password = $only_id;

if ($password === $expected_password) {
  echo "<!DOCTYPE html>
  <html lang='tr'>
  <head>
    <meta charset='UTF-8'>
    <title>Giriş Başarılı</title>
    <script>
      // localStorage'a yaz ve yönlendirmeyi 3 saniye sonra yap
      localStorage.setItem('username', '$only_id');
      setTimeout(() => {
        window.location.href = 'index.html';
      }, 3000);
    </script>
    <style>
      body {
        font-family: sans-serif;
        background-color: #f8f9fa;
        text-align: center;
        padding-top: 100px;
      }
      h2 {
        color: green;
      }
    </style>
  </head>
  <body>
    <h2>Hoşgeldiniz, $only_id!</h2>
    <p>3 saniye içinde ana sayfaya yönlendiriliyorsunuz...</p>
  </body>
  </html>";
  exit();
} else {
  header("Location: login.html?error=invalid_login");
  exit();
}
?>
