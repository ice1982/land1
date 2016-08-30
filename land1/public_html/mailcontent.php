<?php

$boundary = md5(date('r', time())); // рандомное число

$headers = "From: " . $from . "\r\n"; // см. наиболее часто используемые заголовки
$headers .= "Reply-To: " . $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"_1_$boundary\"";

$filesArray = scandir('catalogue');

$finfo = finfo_open(FILEINFO_MIME_TYPE); // возвращает mime-тип
$message2 = '';

foreach ($filesArray as $key => $value) {
    $attachment = chunk_split(base64_encode(file_get_contents('catalogue/' . $value)));
    $filetype = finfo_file($finfo, 'catalogue/' . $value);
    if($filetype == 'application/pdf' || $filetype == 'image/jpeg'){
        $message2 .= "
--_1_$boundary
Content-Type: \"$filetype\"; name=\"$value\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment

$attachment";
    }
}
finfo_close($finfo);


$message = "
--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

--_2_$boundary
Content-Type: text/html; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit

$message

--_2_$boundary--
$message2";
$message .= "--_1_$boundary--";