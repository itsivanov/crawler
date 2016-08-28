<?php

/**
 *
 */
class Crawler
{
  private $site;

  function __construct(IGetTegs $site)
  {
    $this->site = $site;
  }

  public function getAllLink(){

    $allUrl = $this->site->parsTegs();
    $counting = new Counting($allUrl);
    $full_links = $counting->imgTags();

    return $full_links;

  }

  public function createPreGrid()
  {
    $full_links = $this->getAllLink();
    $grid = new Grid($full_links);
    return $grid->formationGrid();
  }

  public function recordResult()
  {
     $create_grid = $this->createPreGrid();
     $date = date('d.m.Y.h.i.s');
     $path = "result/";
     $file = 'report_' . $date . '.html';
     file_put_contents($path . $file, $create_grid);
  }


}
