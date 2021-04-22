<?php 
  require_once 'header.php';

echo <<<_END
  <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
        $('#used').html('&nbsp;')
        return
      }

      $.post
      (
        'checkuser.php',
        { user : user.value },
        function(data)
        {
          $('#used').html(data)
        }
      )
    }
  </script>  
_END;

  $error = $user = $pass = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
      $error = 'Не все поля заполнены<br><br>';
    else
    {
      $result = queryMysql("SELECT * FROM members WHERE user='$user'");

      if ($result->num_rows)
        $error = 'Имя занято другим субъектом<br><br>';
      else
      {
        queryMysql("INSERT INTO members VALUES('$user', '$pass')");
        die('<h4>Профиль создан</h4>Авторизируйтесь.</div></body></html>');
      }
    }
  }

echo <<<_END
      <form method='post' action='signup.php'>$error
      <div data-role='fieldcontain'>
        <label></label>
        <h1>Введите свою информацию для регистрации</h1>
      </div>
      <div data-role='fieldcontain'>
        <label id='txt'>Имя субъекта</label>
        <input type='text' maxlength='16' name='user' value='$user'
          onBlur='checkUser(this)'>
        <label></label><div id='used'>&nbsp;</div>
      </div>
      <div data-role='fieldcontain'>
        <label id='txt'>Пароль</label>
        <input type='password' maxlength='16' name='pass' value='$pass'>
      </div>
      <div data-role='fieldcontain'>
        <label id='txt'>Повторите пароль</label>
        <input id='rpass' type='password' maxlength='16' name='rpass' value='$rpass'>
      </div>
        <script>
          if ('$rpass !== $pass') {
            alert("Пароли не совпадают!");
          }
        </script>
      <div data-role='fieldcontain'>
        <label></label>
        <input data-transition='slide' type='submit' value='Зарегистрироваться'>
      </div>
    </div>
  </body>
</html>
_END;
?>