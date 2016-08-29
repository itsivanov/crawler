<?php
include_once 'config.php';

spl_autoload_register('autoloader');

if ($argc != 2) {
    echo "Get: php index.php [http://site.com].\n";
    exit(1);
}

try{

  $web_site_name = $argv[1];
  $siteEx = new Extraction($web_site_name);
  $crawler = new Crawler($siteEx);
  $allUrl = $crawler->getAllLink();
  $counting = new Counting($allUrl);
  $full_links = $counting->imgTags();
  $grid = new Grid($full_links);
  $create_grid = $grid->formationGrid();
  $crawler->recordResult($create_grid);
  
  echo "Your request is complete.\r\n";
  echo "See the catalog result/report_dd.mm.yyyy.html \r\n";

}catch(Exception $e) {
  echo $e->getMessage();
}
