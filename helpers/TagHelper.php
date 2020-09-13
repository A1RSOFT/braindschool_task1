<?php

  namespace Helpers;
  
  class TagHelper
  {
    public static function createOpeningTag($name, $attributes = [])
    {
      $attrsStr = self::getAttrsStr($attributes);
      return "<$name$attrsStr>";
    }
    
    public static function createOpeningAndClosingTags($name, $attributes = [], $text = '')
    {
      return self::createOpeningTag($name, $attributes) . $text . "</$name>";
    }

    private static function getAttrsStr($attributes)
    {
      $result = '';

      if (!empty($attributes)) {
        foreach ($attributes as $name => $value) {
          if ($value === true) {
            $result .= " $name";
          } else {
            $result .= " $name=\"$value\"";
          }
        }
      }

      return $result;
    }
  }

?>