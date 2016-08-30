<?php
include_once 'config.php';

spl_autoload_register('autoloader');

if ($argc != 2) {
    echo "Get: php index.php [http://site.com].\n";
    exit(1);
}

try{

  $webSiteName = $argv[1];
  $siteEx = new Extraction($webSiteName);
  $crawler = new Crawler($siteEx);
  $allUrl = $crawler->getAllLink();
  $counting = new Counting($allUrl);
  $fullLinks = $counting->imgTags();
  $grid = new Grid($fullLinks);
  $createGrid = $grid->formationGrid();
  $crawler->recordResult($createGrid);

  echo "Your request is complete.\r\n";
  echo "See the catalog result/report_dd.mm.yyyy.html \r\n";

}catch(Exception $e) {
  echo $e->getMessage();
}
