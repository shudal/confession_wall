<?php
namespace app\index\behavior;
use app\index\model\Unkeys;

class Filter{
  public function run($params){
  $dict=Unkeys::all();
  foreach($params as $key=>$value){
    $cont = $value['text'];
    $tai=0;
    for($k=0;$k<count($dict);++ $k){
      if(strpos($cont,$dict[$k]->keyword)!==FALSE){
        $tai=1;
        break;
      }
    }
    if($tai){
      unset($params[$key]);
    }
  }
  return $params;
  }
}
