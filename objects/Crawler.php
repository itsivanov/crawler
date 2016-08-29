<?php

/**
 * Class Crawler App
 */

class Crawler
{
  private $site;

  function __construct(IGetTegs $site)
  {
    $this->site = $site;
  }
/**
*  Filtering all links
*  @return array
*/
  public function getAllLink(){

    $allUrl = $this->site->parsTegs();
    return $allUrl;
  }

/**
* Record the result to a file
* @param string
*
*/
  public function recordResult($create_grid)
  {
     $date = date('d.m.Y.h.i.s');
     $path = "result/";
     $file = 'report_' . $date . '.html';
     file_put_contents($path . $file, $create_grid);
  }


}
