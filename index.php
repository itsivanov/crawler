<?php
include_once 'config.php';

spl_autoload_register('autoloader');


if ($argc != 2) {
    echo "Get: php hello.php [http://site.com].\n";
    exit(1);
}
$web_site_name = $argv[1];
$siteEx = new Extraction($web_site_name);
$crawler = new Crawler($siteEx);
$links = $crawler->recordResult();
echo 'Your request is complete.';
echo 'See the catalog result/file.html';
