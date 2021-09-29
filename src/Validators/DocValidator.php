<?php

namespace Validators;

class DocValidator
{

    static function check($data)
    {
  
      foreach ($data as $key => $val) {
  
        if ($val == "") {
  
          return false;
        }
      }
      return true;
    }
 
}
