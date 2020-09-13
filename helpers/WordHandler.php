<?php

  namespace Helpers;
  
  class WordHandler
  {

    //Если в строке присутствует хотя бы одна буква или цифра - это слово, иначе - не слово.
    private static function isWord($str)
    {
      return preg_match('#[\wа-яА-ЯЁё]+#', $str) ? true : false;
    }

    //  1. Берём форматированный текст.
    //  2. Разбиваем его в массив строк (в качестве разделителя - пробел).
    //  3. Делаем array_reverse, чтобы удобнее было перебирать.
    //  4. В новый массив добавлям абсолютно все строки по порядку, а не только слова(решил сделать так, что если последние
    // n строк не являются словами, берётся следущая строка и так далее, пока не наберётся слов в количестве $wordCount).
    //  5. Когда счётчик слов достигнет $wordCount - цикл закончит работу.
    //  6. Делается обратный array_reverse нового массива, который затем преобразуется в строку из которой будет
    // сформирован текст ссылки.
    
    public static function getLastWords($text, $wordCount)
    {
      $i = 0;
      $newArr = [];

      $arr = array_reverse(explode(' ', $text));

      foreach ($arr as $str) {
        if ($i < $wordCount) {
          if (self::isWord($str)) {
            $i++;
          }
          $newArr[] = $str;
        } else
            break;
      }
    
      $newArr = array_reverse($newArr);
      $resultString = implode(' ', $newArr);

      return $resultString;   
    }
  }

?>

