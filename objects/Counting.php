<?php
/**
 *  Class responsible for counting
 */
class Counting implements ICounter, ISorting
{
  private $arrUrl = array();

  function __construct($arrUrl)
  {
    $this->arrUrl = $arrUrl;
  }

/**
* Type img tag selection
*
* @return array
*/
  public function imgTags()
  {
    if(empty($this->arrUrl)){
      return false;
    }

    $dataArray = array();
         for($n = 0; $n < count($this->arrUrl); $n++)
         {
             $begin_time = time();
             $html = file_get_contents(trim($this->arrUrl[$n]));
             $count_tags = preg_match_all('/<img[^>]+>/i', $html);
             $end_time = time();

             $processing_time = $end_time - $begin_time;

             $dataArray[$n]['url'] = $this->arrUrl[$n];
             $dataArray[$n]['count'] = $count_tags;
             $dataArray[$n]['time'] = $processing_time;
         }
         for($i = 0; $i < count($dataArray); $i++){
              uasort($dataArray, 'self::sortingArray');
          }
          return $dataArray;
  }
/**
* Sorting the array
*
* @param $a array
* @param $b array
*
* @return integer
*/
  public function sortingArray($a, $b)
  {
      if ($a['count'] == $b['count']){
        return 0;
      }
      return ($a['count'] < $b['count']) ? -1 : 1;
  }

}
