<?php
	 include_once('BookSingleton.php');
  include_once('HTMLPage.php');
  include_once('HTMLPageBuilder.php');
  include_once('HTMLPageDirector.php');


  define('BR', '<'.'BR'.'>');


  echo 'BEGIN TESTING BUILDER PATTERN'.BR;
  echo BR;


  $pageBuilder = new HTMLPageBuilder();
  $pageDirector = new HTMLPageDirector($pageBuilder);
  $pageDirector->buildPage();
  $page = $pageDirector->GetPage();
  echo $page->showPage();


  echo BR.BR;
  echo 'END TESTING BUILDER PATTERN'.BR;