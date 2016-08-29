<?php

class Grid implements IGrid
{
  private $dataArray = array();

  public function __construct($dataArray)
  {

    $this->dataArray = $dataArray;

  }
/**
* Formation of information output table
*
* @return string
*/
  public function formationGrid()
  {
      $data = '<table border="1">';
      $data .= '<tr>' .
                      '<td>URL</td>' .
                      '<td>Number of images tags</td>' .
                      '<td>Duration</td>' .
                      '</tr>';
      foreach($this->dataArray as $item)
      {
          $data .= '<tr>' .
                       '<td>' . $item['url'] .  '</td>' .
                       '<td>' . $item['count'] . '</td>' .
                       '<td>' . $item['time'] . '</td>' .
                   '</tr>';
      }

      return $data .= '</table>';
  }

}
