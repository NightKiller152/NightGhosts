<?php
  session_start();
  require_once 'header.php';

  echo "<div class='center'>Добро пожаловать на NightGhosts, ";

  if ($loggedin) echo "Субъект $user, вы вошли на сайт"; 
  
  else echo 'войдите или зарегистрируйтесь!';

  echo <<<_END
      </div><br>
    </div>
    <div data-role="footer" target'_blank'>
      <h4>GitHub: <i><a href='https://github.com/NightKiller152'>NightKiller152</a></i></h4>
    </div>
  </body>
</html>
_END;
?>