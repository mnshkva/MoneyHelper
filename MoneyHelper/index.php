<?php

session_start();
?>
<html>
<head>
    <style type="text/css">
        body {
            background-image: url(materials/thumb-1920-1057137.png);
            margin: 0px;
        }
        .fig{
            text-align: center; /* Выравнивание по центру */
        }
    </style>
    <title>Авторизация</title>
</head>
<body>
<h2 style="text-align: center; color: white; font-size: 40px;text-decoration: underline;">Авторизация</h2>
<form action="testreg.php" method="post">

    <p style="text-align: center">
        <label style="align-content: center; font-size: 30px; color: white" >Ваш логин:<br></label>
        <input style="text-align: center" name="login" type="text" size="30" maxlength="15">
    </p>


    <p style="text-align: center; font-size: 30px; color: white">

        <label>Ваш пароль:<br></label>
        <input name="password" type="password" size="30" maxlength="15">
    </p>


    <p style="text-align: center;size: 30px">
        <input size="30px" type="submit" name="submit" value="Войти">


        <br>

        <a href="reg.php" style='text-decoration: none; font-size: 20px; color: white;text-decoration: underline;color: #800000		'>Зарегистрироваться</a>
    </p></form>
<?php

if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    echo "<p style='text-align: center;font-size: 20px; color: white'>Вы вошли на сайт MoneyHelper, как гость. Авторизуйтесь, чтобы зайти в приложение.<br><a href='#' style='text-decoration: none;text-decoration: underline;color: #800000	'>Войти в приложение</a></p>";
}
else
{
    echo "<p style='text-align: center;font-size: 20px; color: white'>Вы вошли на сайт Moneyhelper, как " .$_SESSION['login']."<br><a  href='main.php' style='text-decoration: none; color: #800000;text-decoration: underline'>ВОЙТИ В ПРИЛОЖЕНИЕ</a></p>";
}
?>
<p style="text-align: center; font-size: 25px">
    <a   href='exit.php' style='text-decoration: none;color: #800000;text-decoration: underline;'>Выход</a>
</p>
<p class="fig"><img src="materials/Screenshot_3.jpg"
                    width="403" height="233" alt="Фотография"></p>


</body>
</html>
