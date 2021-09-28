<?php

namespace Validators;

class UserValidator
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
