<?php

  ini_set('display_errors', 'on');
  error_reporting(E_ALL);
  mb_internal_encoding('UTF-8');

  require_once 'helpers/WordHandler.php';
  require_once 'helpers/TagHelper.php';
  require_once 'ArticlePreviewBuilder.php';

  $articleText = file_get_contents('article_text.txt');
  $articleLink = 'https://example.com/articles/100500';

  $obj = new ArticlePreviewBuilder(200, 3);
  $articlePreview = $obj->createPreview($articleText, $articleLink);

  echo $articlePreview;

?>