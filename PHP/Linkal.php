<?php

// Hedef site

$url = "https://example.com";

// cURL ile sayfayı çek

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");

$html = curl_exec($ch);

if(curl_errno($ch)) {

    die("cURL Hatası: " . curl_error($ch));

}

curl_close($ch);

// m3u8 linklerini bul

preg_match_all('/https?:\/\/[^"\']+\.m3u8[^"\']*/i', $html, $matches);

if (!empty($matches[0])) {

    echo "<h3>Bulunan m3u8 linkleri:</h3>";

    foreach ($matches[0] as $link) {

        echo $link . "<br><br>";

    }

} else {

    echo "m3u8 linki bulunamadı.";

}

?>
