<?php
error_reporting(0);
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();
include("db.php");

?>

<html>
<head>
    <title>MoneyHelper</title>
    <link rel="stylesheet" href="main.css">
    <style type="text/css">
        header{
            height: 100px;
            background-color: #03210b;
            padding: 0;
            margin-left: 15%;
            margin-right: 15%;
            /* Включаем режим Flexbox. */
            display: flex;
            /* Распределяем элементы внутри шапки */
            /* Выравниваем элементы вертикально по центру. */
            align-items: center;
        }
        footer {
            height: 70px;
            margin-left: 15%;
            margin-right: 15%;
            background-color: #083715;
        }
        body {
            background-image: url(materials/thumb-1920-1057137.png);
            margin: 0px;
        }
        A {
            text-decoration: none;
        }
        h1 {
            color: rgb(202, 249, 130);
        }
        p {
            margin: 0;

        }
        footer {


            background-color: #03210b;
            border-top: 3px solid #232224;

        }
        .img-head {
            float: left;
            width: 50px;
            height: 50px;
            padding-left: 5%;
            padding-right: 1%;
        }
        .footer-text {
            color: rgb(202, 249, 130);
        }
        .exit {
            color: white;
            padding-left: 60%;
            font-size:20px;

        }
        .hel {

            font-size:18px;
            padding-top: 20px;
        }
        .sec {
            background-color: white;
            margin-left: 15%;
            margin-right: 15%;
            height: 1200px;
        }
        .balance {
            font-size:18px;

        }
        .tab1 {
            float: left;
        }
        .addCard{


        }
        .div1{
            color: #70B603;
            white-space: normal;
            margin-top: 15px;
            margin-left: 70px;
            margin-right: 10px;
            border: 2px solid #70B603;
            height: 200px;
            width: 250px;
            float: left;

        }
        .div2{
            color: #DC851F;
            margin-top: 15px;
            margin-left: 10px;
            margin-right: 10px;
            height: 200px;
            width: 250px;
            border: 2px solid #DC851F;
            float: left;

        }
        .div3 {
            margin-top: 15px;
            margin-left: 10px;
            margin-right: 10px;
            height: 200px;
            width: 250px;
            border: 2px solid #333333;
            float: left;

        }
        .stat{

            margin-left: 19.5%;
        }
        .divh {
            background-color: #EEE8AA;

        }
        .statTable{
            margin-left: 17.8%;

        }
        .statTrat{
            margin-left: 19.5%;
        }
        .footer-text {
            padding-left: 80%;
        }




        table {
            border-spacing: 3px; /* Расстояние между ячеек */
        }
        thead  th {
            background: #e08156; /* Цвет фона заголовка */
            color: #333; /* Цвет текста */
        }
        td, th {
            padding: 5px; /* Поля в ячейках */
            background: #9ACD32; /* Цвет фона ячеек */
            color: black; /* Цвет текста */
        }
    </style>
</head>
<body>

<header>
    <img class="img-head" src="materials/money.png" alt="Error">
    <h1 style="color:#b3dd7b">MoneyHelper</h1>
    <a style="color: rgb(112, 182, 3)" href='exit.php' class="exit">Выход</a>
</header>



</body>
<script>
    function go(mpage)
    {
            if(mpage === 1) {
                sessionStorage.setItem('key', '1');

            }
            else if (mpage === 2) {
                sessionStorage.setItem('key', '2');

            }
            else if (mpage == 3) {
                sessionStorage.setItem('key', '3');
            }
        }

</script>


<?php

$id = $_SESSION['id'];
$tr = 0;
$trJs = 0;

$testCR = mysqli_query($db, "Select id from card where user_id='$id'");
if (mysqli_num_rows($testCR) < 3) {
    for ($i=0;$i<3;$i++) {
        $max = mysqli_query($db, "SELECT MAX(id) FROM card");
        $allMax = mysqli_fetch_array($max);
        $max2 = $allMax[0] + 1;

        $sql = mysqli_query($db, "Insert into card (id,money,user_id) values ('$max2','0','$id')");
    }
}

if (isset($_POST['addCard'])) {

    $max = mysqli_query($db, "SELECT MAX(id) FROM card");
    $allMax = mysqli_fetch_array($max);
    $max2 = $allMax[0] + 1;

    $sql = mysqli_query($db, "Insert into card (id,money,user_id) values ('$max2','0','$id')");


}

if (isset($_POST['addMoney'])) {
    $i = 0;
    $sele = mysqli_query($db, "SELECT id FROM card where user_id = '$id'");

    $tr = $_POST["myselect"];

    $sum = (int)($_POST['addMoney2']);
    $cardBalance = mysqli_query($db, "SELECT money FROM card where id = '$tr' ");
    $array = mysqli_fetch_array($cardBalance);
    $newBalance = $array[0] + $sum;
    $allmoney = mysqli_query($db, "Update card set money = '$newBalance' where id = '$tr' ");

    $maxB = mysqli_query($db, "SELECT MAX(id) FROM positivebalance");
    $allMaxB = mysqli_fetch_array($maxB);
    $maxB2 = $allMaxB[0] + 1;
    $today = date("Y-m-d H:i:s");
    $arxiv = mysqli_query($db, "Insert into positivebalance (id,money,date_,id_card) values ('$maxB2','$sum','$today','$tr')");

    foreach ($sele as $result ) {
        $i++;
       if($result['id'] == $tr) {
           $trJS = $i-1;
       }
    }
}
if (isset($_POST['deleteMoney'])) {
    $i = 0;

    $sele = mysqli_query($db, "SELECT id FROM card where user_id = '$id'");
    $tr = $_POST["myselect"];
    $cat = $_POST["myselect2"];
    $sum2 = (int)($_POST['deleteMoney2']);
    $cardBalance2 = mysqli_query($db, "SELECT money FROM card where id = '$tr' ");
    $array2 = mysqli_fetch_array($cardBalance2);
    $newBalance2 = $array2[0] - $sum2;
    if($newBalance2<0) {
        $newBalance2 =$array2[0];
        $sum2 = 0;
        $cat = "Ошибка";
    }
    $allmoney2 = mysqli_query($db, "Update card set money = '$newBalance2' where id = '$tr' ");

    $maxB3 = mysqli_query($db, "SELECT MAX(id) FROM negativebalance");
    $allMaxB2 = mysqli_fetch_array($maxB3);
    $maxB4 = $allMaxB2[0] + 1;
    $today = date("Y-m-d H:i:s");
    $arxiv = mysqli_query($db, "Insert into negativebalance (id,money,category,date_,id_card) values ('$maxB4','$sum2','$cat','$today','$tr')");

    foreach ($sele as $result ) {
        $i++;
        if($result['id'] == $tr) {
            $trJS = $i-1;
        }
    }
}

if (isset($_POST['sendMoney'])) {
    $i = 0;

    $sele = mysqli_query($db, "SELECT id FROM card where user_id = '$id'");
    $tr = $_POST["myselect"];
    $sum3 = (int)($_POST['sendMoney1']);
    $recipient = (int)($_POST['sendMoney2']);
    $cardBalance3 = mysqli_query($db, "SELECT money FROM card where id = '$tr' ");
    $array3 = mysqli_fetch_array($cardBalance3);

    $test = mysqli_query($db,"SELECT id FROM card WHERE id='$recipient'");
    $test2 = mysqli_fetch_array($test);


    $newBalance3 = $array3[0] - $sum3;

    if($newBalance3<0 || empty($test2['id'])) {
        $newBalance3 =$array3[0];
        $sum3 = 0;
    }
    else {
        $cardBalance4 = mysqli_query($db, "SELECT money FROM card where id = '$recipient' ");
        $array4 = mysqli_fetch_array($cardBalance4);
        $newBalance4 = $array4[0] + $sum3;

        $delMon = mysqli_query($db, "Update card set money = '$newBalance3' where id = '$tr' ");
        $addMon = mysqli_query($db, "Update card set money = '$newBalance4' where id = '$recipient' ");

        $maxB3 = mysqli_query($db, "SELECT MAX(id) FROM transfer");
        $allMaxB2 = mysqli_fetch_array($maxB3);
        $maxB4 = $allMaxB2[0] + 1;
        $today = date("Y-m-d H:i:s");
        $arxiv = mysqli_query($db, "Insert into transfer (id,money,id_sender,id_recipient,date_) values ('$maxB4','$sum3','$tr','$recipient','$today')");
    }

    foreach ($sele as $result ) {
        $i++;
        if($result['id'] == $tr) {
            $trJS = $i-1;
        }
    }
}


if (isset($_POST['delMoney'])) {
    $i = 0;
    $tr = $_POST["myselect"];
    $sele = mysqli_query($db, "SELECT id FROM card where user_id = '$id'");

    foreach ($sele as $result ) {
        $i++;
        if($result['id'] == $tr) {
            $trJS = $i-1;
        }
    }
}
if (isset($_POST['addMoney2'])) {
    $i = 0;
    $tr = $_POST["myselect"];
    $sele = mysqli_query($db, "SELECT id FROM card where user_id = '$id'");

    foreach ($sele as $result ) {
        $i++;
        if($result['id'] == $tr) {
            $trJS = $i-1;
        }
    }
}
if (isset($_POST['senMoney'])) {
    $i = 0;
    $tr = $_POST["myselect"];
    $sele = mysqli_query($db, "SELECT id FROM card where user_id = '$id'");

    foreach ($sele as $result ) {
        $i++;
        if($result['id'] == $tr) {
            $trJS = $i-1;
        }
    }
}
if (isset($_POST['stat'])) {
    $tr = $_POST["myselect"];
    $health = mysqli_query($db, "SELECT SUM(money) FROM negativebalance where category = 'Здоровье' and id_card='$tr' GROUP BY category");
    $health2 = mysqli_fetch_array($health);
    $clothes = mysqli_query($db, "SELECT SUM(money) FROM negativebalance where category = 'Одежда' and id_card='$tr' GROUP BY category");
    $clothes2 = mysqli_fetch_array($clothes);
    $nutrition = mysqli_query($db, "SELECT SUM(money) FROM negativebalance where category = 'Питание' and id_card='$tr' GROUP BY category");
    $nutrition2 = mysqli_fetch_array($nutrition);
    $entertainment = mysqli_query($db, "SELECT SUM(money) FROM negativebalance where category = 'Развлечения' and id_card='$tr' GROUP BY category");
    $entertainment2 = mysqli_fetch_array($entertainment);
    $services= mysqli_query($db, "SELECT SUM(money) FROM negativebalance where category = 'Услуги' and id_card='$tr' GROUP BY category");
    $services2 = mysqli_fetch_array($services);
    $personalexpenses = mysqli_query($db, "SELECT SUM(money) FROM negativebalance where category = 'Личный расходы' and id_card='$tr' GROUP BY category");
    $personalexpenses2 = mysqli_fetch_array($personalexpenses);
    $house = mysqli_query($db, "SELECT SUM(money) FROM negativebalance where category = 'Дом' and id_card='$tr' GROUP BY category");
    $house2 = mysqli_fetch_array($house);
    $car = mysqli_query($db, "SELECT SUM(money) FROM negativebalance where category = 'Автомобиль' and id_card='$tr' GROUP BY category");
    $car2 = mysqli_fetch_array($car);

    if (mysqli_num_rows($health) == 0) {
        $healthR=0;
    }
    else {
        $healthR = $health2[0];
    }
    if (mysqli_num_rows($clothes) == 0) {
        $clothesR=0;
    }
    else $clothesR = $clothes2[0];
    if (mysqli_num_rows($nutrition) == 0) {
        $nutritionR=0;
    }
    else $nutritionR = $nutrition2[0];
    if (mysqli_num_rows($entertainment) == 0) {
        $entertainmentR=0;
    }
    else $entertainmentR = $entertainment2[0];

    if (mysqli_num_rows($services) == 0) {
        $servicesR=0;
    }
    else {
        $servicesR = $services2[0];
    }
    if (mysqli_num_rows($personalexpenses) == 0) {
        $personalexpensesR=0;
    }
    else $personalexpensesR = $personalexpenses2[0];
    if (mysqli_num_rows($house) == 0) {
        $houseR=0;
    }
    else $houseR = $house2[0];
    if (mysqli_num_rows($car) == 0) {
        $carR=0;
    }
    else $carR = $car2[0];



    $allCat = $healthR + $clothesR + $nutritionR + $entertainmentR + $servicesR  + $personalexpensesR  + $houseR  + $carR ;
    if ($allCat == 0) {
        $allCat=1;
    }
    $healthP = $healthR*100/$allCat;
    $clothesP = $clothesR*100/$allCat;
    $nutritionP = $nutritionR*100/$allCat;
    $entertainmentP = $entertainmentR*100/$allCat;
    $servicesP = $servicesR*100/$allCat;
    $personalexpensesP = $personalexpensesR*100/$allCat;
    $houseP = $houseR*100/$allCat;
    $carP = $carR*100/$allCat;
}


$allcard = mysqli_query($db, "Select id from card where user_id = '$id'");

$tim = $_SESSION['id'];
$summ = mysqli_query($db, "SELECT SUM(money) FROM card where user_id='$tim' GROUP BY user_id");
$summ2 = mysqli_fetch_array($summ);
if (mysqli_num_rows($summ) == 0) {
    $summ=0;
}
else {
    $summ = $summ2[0];
}

?>
<section class="sec">
    <div>
        <p style="color: red;font-weight: bold " class="hel"> Вы вошли на сайт, как  <?PHP echo $_SESSION['login']?></p>

    </div>

    <div>
        <br>
            <p class="balance"><br> Баланс  <?PHP echo $summ ?>$</p>

            <?php

            print "<table border = 1 class = 'tab1' style='margin-left: 0%;' >";
            print "<tr><td>Ваши счета</td> <td>Сумма</td></tr>";
            $res = mysqli_query($db,"SELECT * FROM card where user_id = '$id'");
            if (is_array($res) || is_object($res)) {
                foreach ($res as $result ) {
                    print "<tr><td>".'Счет №'.($result['id'])."</td>";
                    print "<td>".($result['money']).'$'. "</td>";

                }
            }

            print "</table>";


            ?>

            </div>



    </div>
        <form name = "main" action="main.php" method="POST">
            <div class="addCard">
                <p style="margin-left: 19.5%;"> Если вы желаете добавить новый счет, нажмите "Добавить счет"</p><br>
                <input style="margin-left: 50px;"  name="addCard" type="submit" value="Добавить счет">
            </div>

            <div>
                <div style="text-align: center;font-size: 20px"><br><br><br><br><br>Операции</div>
            <div>
                <div style="float: left;margin-left: 70px;margin-right: 10px; " <p>Пожалуйста, выберите счет с которого будет производиться операция</p></div>
            <select id = "card" name="myselect"  onchange="myFunction()">
                <?php

                if($allcard&& mysqli_num_rows($allcard))
                {
                    while($rd=mysqli_fetch_object($allcard))
                    {
                        echo("<option value='$rd->id'>$rd->id</option>");
                    }
                }
                ?>
            </select>
            </div>

            <div class="div1" >

                <div class="divh"><p style="color: #70B603; text-align: center;" >ДОХОД</p></div>
                <p style="text-align: center">Введите сумму пополнения и нажмите "Пополнить счет"</p>
                <input style="margin-top: 20px;text-align: center;position: relative;left: 50%;transform: translate(-50%, 0);" name="addMoney2" type="text" size="20" placeholder="Введите сумму">
                <input style="margin-top: 20px;position: relative;left: 50%;transform: translate(-50%, 0);" name="addMoney" type="submit" value="Пополнить счет"">
            </div>
            <div class="div2">
                <div class="divh"><p style="color: #DC851F; text-align: center;" >РАСХОД</p></div>
                <p style="text-align: center">Введите сумму расхода, выберите категорию и нажмите "Списать"</p>
                <input style="margin-top: 20px;text-align: center;position: relative;left: 50%;transform: translate(-50%, 0);" name="deleteMoney2" type="text" size="20" placeholder="Введите сумму">
                <div>
                    <select style="margin-top: 20px;text-align: center;position: relative;left: 50%;transform: translate(-50%, 0);" name="myselect2"">
                    <option value='Здоровье'>Здоровье</option>
                    <option value='Одежда'>Одежда</option>
                    <option value='Питание'>Питание</option>
                    <option value='Развлечения'>Развлечения</option>
                    <option value='Услуги'>Услуги</option>
                    <option value='Личные расходы'>Личные расходы</option>
                    <option value='Дом'>Дом</option>
                    <option value='Автомобиль'>Автомобиль</option>
                    </select>
                </div>

                <div>
                    <input style="margin-top: 20px;text-align: center;position: relative;left: 50%;transform: translate(-50%, 0);"name="deleteMoney" type="submit" value="Списать" >
                </div>

            </div>
            <div class="div3">
                <div class="divh"><p style="color: #333333; text-align: center;" >ПЕРЕВОД</p></div>
                <p style="text-align: center">Введите сумму перевода, выберите получателя и нажмите "Перевести"</p>
                <div>
                <input style="margin-top: 20px;text-align: center;position: relative;left: 50%;transform: translate(-50%, 0);" name="sendMoney1" type="text" size="20" placeholder="Введите сумму">
                </div>
                <input style="margin-top: 20px;text-align: center;position: relative;left: 50%;transform: translate(-50%, 0);" name="sendMoney2" type="text" size="20" placeholder="Получатель">
                <input style="margin-top: 20px;text-align: center;position: relative;left: 50%;transform: translate(-50%, 0);" name="sendMoney" type="submit" value="Перевести">
            </div>
            <div class = stat>
                <div style="margin-top: 40px;font-weight: bold"><p><br><br><br><br><br><br><br><br><br><br><br><br>История последних операций</p></div>

                <input  name="delMoney" type="submit" value="Расходы" onclick="go(1)">
                <input  name="addMoney2" type="submit" value="Доходы" onclick="go(2)">
                <input  name="senMoney" type="submit" value="Переводы" onclick="go(3)">

            </div>
            <div>
                <table class="statTable" border = 1 style="display: none;" id="i_page1">
                    <tr><td>ID расходов</td> <td>Сумма</td> <td>Катагория</td> <td>Дата</td></tr>
                    <?php
                    if($tr == 0) {
                        $tr=1;
                    }
                    $bl = 0;
                    $expenses = mysqli_query($db, "Select id,money,category,date_ from negativebalance where id_card = '$tr' ORDER BY id DESC");
                    foreach ($expenses as $result ) {
                        $bl++;
                        if ($bl<10) {
                            echo "<tr><td>".($result['id'])."</td>";
                            echo "<td>".($result['money'])."</td>";
                            echo "<td>".($result['category'])."</td>";
                            echo "<td>".($result['date_'])."</td>";
                        }
                        else {
                            $bl=0;
                            break;
                        }

                    }

                    ?>
                </table>


                <table class="statTable" border = 1 style="display: none;" id="i_page2">
                    <tr><td>ID доходов</td> <td>Сумма</td> <td>Дата</td></tr>
                    <?php
                    if($tr == 0) {
                        $tr=1;
                    }
                    $bl = 0;
                    $expenses = mysqli_query($db, "Select id,money,date_ from positivebalance where id_card = '$tr' ORDER BY id DESC");
                    foreach ($expenses as $result ) {
                        $bl++;
                        if ($bl<10) {
                            echo "<tr><td>".($result['id'])."</td>";
                            echo "<td>".($result['money'])."</td>";
                            echo "<td>".($result['date_'])."</td>";
                        }
                        else {
                            $bl=0;
                            break;
                        }

                    }

                    ?>
                </table>


                <table class="statTable" id="i_page3" style="display: none;" border = 1  >
                    <tr><td>ID перевода</td> <td>Сумма</td> <td>Получатель</td> <td>Дата</td></tr>
                    <?php
                    if($tr == 0) {
                        $tr=1;
                    }
                    $bl = 0;
                    $expenses = mysqli_query($db, "Select id,money,id_recipient,date_ from transfer where id_sender = '$tr' ORDER BY id DESC");
                    foreach ($expenses as $result ) {
                        $bl++;
                        if ($bl<10) {
                            echo "<tr><td>".($result['id'])."</td>";
                            echo "<td>".($result['money'])."</td>";
                            echo "<td>".($result['id_recipient'])."</td>";
                            echo "<td>".($result['date_'])."</td>";
                        }
                        else {
                            $bl = 0;
                            break;
                        }
                    }

                    ?>
                </table>

            </div>



            </div>
            </div>
            <div class = 'statTrat'>
                <input  name="stat" type="submit" value="Получить статистику по тратам">
                <div id="air" style="width: 500px; height: 400px;"></div>
            </div>
        </form>


    </div>


</section>


    <!--  <input name ="id" type=\"text\" size=\"20\" placeholder=id style="margin-left: 24%"> -->
<!--  <input name="changeCard" type="submit" value="Сменить кошелек" />-->
<script>
    function myFunction() {
        document.getElementById('i_page1').style.display="none";
        document.getElementById('i_page2').style.display="none";
        document.getElementById('i_page3').style.display="none";
    }


    window.addEventListener('load', function() {

        document.getElementById('card').querySelectorAll('option')['<?php echo $trJS;?>'].selected = true;







        if(sessionStorage.getItem('key') === '1') {
            document.getElementById('i_page1').style.display="table";
            document.getElementById('i_page2').style.display="none";
            document.getElementById('i_page3').style.display="none";
        }
        else if (sessionStorage.getItem('key') === '2') {
            document.getElementById('i_page1').style.display="none";
            document.getElementById('i_page2').style.display="table";
            document.getElementById('i_page3').style.display="none";
        }
        else if (sessionStorage.getItem('key') === '3') {
            document.getElementById('i_page1').style.display="none";
            document.getElementById('i_page2').style.display="none";
            document.getElementById('i_page3').style.display="table";
        }

    });
</script>


<script src="https://www.google.com/jsapi"></script>
<script>
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var health =parseInt('<?php echo $healthP;?>',10);
        var clothes =parseInt('<?php echo $clothesP;?>',10);
        var nutrition=parseInt('<?php echo $nutritionP;?>',10);
        var entertainment=parseInt('<?php echo $entertainmentP;?>',10);
        var services=parseInt('<?php echo $servicesP;?>',10);
        var personalexpenses=parseInt('<?php echo $personalexpensesP;?>',10);
        var house=parseInt('<?php echo $houseP;?>',10);
        var car=parseInt('<?php echo $carP;?>',10);
        var data = google.visualization.arrayToDataTable([
            ['Категория', 'Сумма'],
            ['Здоровье',     health],
            ['Одежда', clothes],
            ['Питание',    nutrition],
            ['Развлечения', entertainment],
            ['Услуги', services],
            ['Личные расходы', personalexpenses],
            ['Дом', house],
            ['Автомобиль', car]
        ]);
        var options = {
            backgroundColor: '#FFFFFF',
            is3D: true,
            pieResidueSliceLabel: 'Остальное'
        };
        var chart = new google.visualization.PieChart(document.getElementById('air'));
        chart.draw(data, options);
    }
</script>
<footer id="contact">
    <div>
        <div style="float: left;width: 250px;">
            <p style="padding-left: 20%;color: #6F8E3D; font-weight: bold">Наш Telegram-бот:</p>
            <p style="padding-left: 20%;color: #6F8E3D">
                Достаточно перейти
                по ссылке:
                https://t.me/MoneyHelper_bot
            </p>
        </div>
    <div>
        <div style="float: left;width: 250px;">
            <p style="padding-left: 20%;color: #6F8E3D; font-weight: bold">Как нас найти:</p>
            <p style="padding-left: 20%;color: #6F8E3D">г. Харьков пр Героев Сталинграда,3,корп 4, оф 21</p>

        </div>
        <div style="float: left;width: 300px;padding-left: 5%">
            <p style="padding-left: 10%;color: #6F8E3D; font-weight: bold">Связаться с нами:</p>
            <p style="padding-left: 10%;color: #6F8E3D">+380 (93) 123 45 67</p>
            <p style="padding-left: 10%;color: #6F8E3D">+380 (63) 890 34 56</p>
            <p style="padding-left: 10%;color: #6F8E3D">moneyhelper@gmail.com</p>
        </div>
        <div style="float: left;width: 300px;padding-left: 85%">
            <p style="color: black;font-size: small">©MoneyHelper™2020</p>
        </div>



</footer>


