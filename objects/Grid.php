<?php
/**
 *
 */
class Grid implements IGrid
{
  private $dataArray = array();

  public function __construct($dataArray)
  {

    $this->dataArray = $dataArray;

  }

  public function formationGrid()
  {
      $data = '<table>';
      $data .= '<tr>' .
                      '<td>Link</td>' .
                      '<td>Count images (sorting ASC)</td>' .
                      '<td>Duration of page processing (seconds)</td>' .
                      '</tr>';
      foreach($this->dataArray as $item)
      { 
          $data .= '<tr>' .
                       '<td>' . $item['link'] .  '</td>' .
                       '<td>' . $item['count'] . '</td>' .
                       '<td>' . $item['time'] . '</td>' .
                   '</tr>';
      }

      return $data .= '</table>';
  }

}
