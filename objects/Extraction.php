<?php
/**
 *  Class responsible for parsing tegs
 */

class Extraction implements IGetTegs
{
  private $site;

  public function __construct($site)
  {
    $this->site = $site;

  }

  /**
  *  link selection
  *
  * @return array
  */
  public function parsTegs()
  {

         $html = file_get_contents($this->site);

         preg_match_all("/<[Aa][\s]{1}[^>]*[Hh][Rr][Ee][Ff][^=]*=[ '\"\s]*([^ \"'>\s#]+)[^>]*>/", $html, $matches);

         $urls = array_values(array_unique($matches[1]));
         $count_url = count($urls);

         for($i = 0; $i < $count_url; $i++)
         {
             if(substr(trim($urls[$i]), 0, 4) != 'http')
                 unset($urls[$i]);
         }
         return array_values($urls);
  }

}
