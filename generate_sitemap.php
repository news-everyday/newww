<?php
$server = $_SERVER['SERVER_NAME'];
$protocol = 'http';
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
   $protocol = 'https';
}

$template = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
content
</urlset>';

$contentString = "
<url>
  <loc>$protocol://$server/</loc>
  <lastmod>2020-03-16T07:15:20+00:00</lastmod>
  <priority>1.00</priority>
</url>";

if (file_exists('catalog')){
    $content = file_get_contents(__DIR__ . '/catalog/content.json');
    $content = json_decode($content, 1);

    foreach ($content['texts'] as $key => $item) {
        $contentString .= "
<url>
  <loc>$protocol://$server/?article=$key&amp;a=3</loc>
  <lastmod>2020-03-16T07:15:20+00:00</lastmod>
  <priority>0.80</priority>
</url>";
    }
    $contentString .= "
<url>
  <loc>$protocol://$server/?a=2</loc>
  <lastmod>2020-03-16T07:15:20+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>$protocol://$server/?a=4</loc>
  <lastmod>2020-03-16T07:15:20+00:00</lastmod>
  <priority>0.80</priority>
</url>";


} else {

    $contentString = "
<url>
  <loc>$protocol://$server/?a=2</loc>
  <lastmod>2020-03-16T07:15:20+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>$protocol://$server/?a=3</loc>
  <lastmod>2020-03-16T07:15:20+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>$protocol://$server/?a=4</loc>
  <lastmod>2020-03-16T07:15:20+00:00</lastmod>
  <priority>0.80</priority>
</url>";
}

$siteMap = str_replace('content', $contentString, $template);

if (file_put_contents('sitemap.xml', $siteMap))
    echo 'sitemap.xml was generated'; 
else
    echo 'Some error was occurred';

