<?php
$fp = fsockopen('example.com', 80, $errno, $errstr, 30);
fwrite($fp, "GET /index.html HTTP/1.0\r\n\r\n");

echo '---- HEADER START ----' . PHP_EOL;
while (!feof($fp)) {
  $data = fgets($fp, 128);
  if ($data == "\r\n") {
    echo '---- HEADER END ----' . PHP_EOL . '---- BODY START ----' . PHP_EOL;
    continue;
  }
  echo $data;
}
echo '---- BODY END ----' . PHP_EOL;
fclose($fp);
