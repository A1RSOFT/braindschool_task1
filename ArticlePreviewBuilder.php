<?php

  use Helpers\TagHelper;
  use Helpers\WordHandler;

  class ArticlePreviewBuilder
  {
    private $previewLength;
    private $lastWordsForLinkCount;

    public function __construct($previewLength, $lastWordsForLinkCount)
    {
      $this->previewLength = $previewLength;
      $this->lastWordsForLinkCount = $lastWordsForLinkCount;
    }

    public function createPreview($text, $link)
    {
    // Обрезаем текст до $previewLength. Если длина исходного текста меньше или равна $previewLength, то
    // подстрока будет равна исходной строке. Функцией trim убираем пробельные символы в начале и конце строки.
    $text = trim(mb_substr($text, 0, $this->previewLength));

    // Записываем в переменную $lastWords последние слова $text в количестве $lastWordsForLinkCount
    $lastWords = WordHandler::getLastWords($text, $this->lastWordsForLinkCount);

    // Записываем в переменную $textWithoutLastWords $text с обрезанными $lastWords
    $textWithoutLastWords = mb_substr($text, 0, mb_strlen($text) - mb_strlen($lastWords));

    // Формируем ссылку с переданным $link. В качестве текста ссылки использууем $lastWords
    $linkWords = TagHelper::createOpeningAndClosingTags('a', ['href' => $link], $lastWords . "\u{2026}");

    // Конкатенируем и возвращаем preview статьи
    return $textWithoutLastWords . ' ' . $linkWords;
    }
  }

?>