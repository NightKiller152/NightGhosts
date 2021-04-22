<?php // 
  session_start();

  echo <<<_INIT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <link rel='stylesheet' href='jquery.mobile-1.4.5.min.css'>
      <link rel='stylesheet' href='styles.css'>
      <script src='javascript.js'></script>
      <script src='jquery-2.2.4.min.js'></script>
      <script src='jquery.mobile-1.4.5.min.js'></script>

  _INIT;

    require_once 'functions.php';

    $rnum = rand(1, 999);
    $userstr = 'Добро пожаловать субъект №'. $rnum;

    if (isset($_SESSION['user'])) 
    {
        $user = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr = "Вы вошли как субъект: $user";
    }
    else $loggedin = FALSE;

  echo <<<_MAIN
      <title>NightGhosts: $userstr</title>
    </head>
    <body>
      <div data-role='page'>
          <div data-role='header'>
              <div id='logo'
                class='center'>Night Gh<img id='ghost' src='ghost.gif'>sts</div>
              <div class='username'>$userstr</div>
          </div>
          <div data-role='content'>

  _MAIN;
   
    if ($loggedin)
    {
  echo <<<_LOGGEDIN
      <div class='center'>
        <a data-role='button' data-inline='true' data-icon='home'
           data-transmission="slide" href='members.php?view=$user'>Профиль</a>
        <a data-role='button' data-inline='true'
           data-transmission="slide" href='members.php'>Субъекты</a>
        <a data-role='button' data-inline='true'
           data-transmission="slide" href='friends.php'>Братья</a>
        <a data-role='button' data-inline='true'
           data-transmission="slide" href='messages.php'>Послания</a>
        <a data-role='button' data-inline='true'
           data-transmission="slide" href='profile.php'>Изменить Профиль</a>
        <a data-role='button' data-inline='true'
           data-transmission="slide" href='logout.php'>Выйти</a>
      </div> 

  _LOGGEDIN;    
    }
    else 
    {
  echo <<<_GUEST
      <div class='center'>
        <a data-role='button' data-inline='true' data-icon='home'
           data-transmission="slide" href='index.php'>Главная Страница</a>
        <a data-role='button' data-inline='true' data-icon='plus'
           data-transmission="slide" href='signup.php'>Присоединиться</a>
        <a data-role='button' data-inline='true' data-icon='check'
           data-transmission="slide" href='login.php'>Войти</a>
      </div>
      <p class='info'>(Вы должны войти чтобы пользоваться сайтом)</p>

  _GUEST;
    }
?>