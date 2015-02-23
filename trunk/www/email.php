<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 20.02.15
 * Time: 18:40
 */
if(isset($_POST['unsubscribe_btn']))
{
    require_once('model.php');
    $row = [];
    $row['email'] = $_POST['email'];
    $row['udate'] = date('Y-m-d H:i:s');
    $model = new model('unsubscribers');
    $model->insert($row);
    header('Location: ?success');
}

?>
<html>
    <head>
        <title>Email</title>
    </head>
    <body style="background: url('images/bg.png') #E7A7E2 no-repeat center;">
        <div style="width: 700px; margin: auto;">
            <div style="
            color: white;
            font-family: Arial;
            font-size: 26px;
            border: 1px solid #000000;
            box-shadow: 0 0 7px #000000;
            /*padding: 0 30px;*/
            height: 102px;
            margin: 20px auto;
            background: #f1396d;
            background: -moz-linear-gradient(left, #ed2d87 0%, #f28ebb 100%);
            background: -webkit-gradient(linear, left top, right top, color-stop(0%,#ed2d87), color-stop(100%,#f28ebb));
            background: -webkit-linear-gradient(left, #f2717e 0%,#f28ebb 100%);
            background: -o-linear-gradient(left, #ed2d87 0%,#f28ebb 100%);
            background: -ms-linear-gradient(left, #ed2d87 0%,#f28ebb 100%);
            background: linear-gradient(to right, #ed2d87 0%,#f28ebb 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ed2d87', endColorstr='#f28ebb',GradientType=1 );
        ">
                <div style="clear: both; border: 1px solid #f6a1ff;">
                    <img src="images/logo-garcinia.png" style="float: left;" />
                    <div style="margin: 39px 0 30px 177px; text-align: center;">&NonBreakingSpace;</div>
                </div>

            </div>
        </div>


        <div style="
            text-align: center;
            padding: 40px;
            border-radius: 10px;
            width: 700px; margin: auto;
            background: #eda2db;
            background: -moz-linear-gradient(left, #eda2db 0%, #f28ebb 100%);
            background: -webkit-gradient(linear, left top, right top, color-stop(0%,#eda2db), color-stop(100%,#f28ebb));
            background: -webkit-linear-gradient(left, #eda2db 0%,#f28ebb 100%);
            background: -o-linear-gradient(left, #eda2db 0%,#f28ebb 100%);
            background: -ms-linear-gradient(left, #eda2db 0%,#f28ebb 100%);
            background: linear-gradient(to right, #eda2db 0%,#f28ebb 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ed2d87', endColorstr='#f28ebb',GradientType=1 );">
            <h3 style="color: #6b3481;
                 font-size: 35px;
                  text-transform: uppercase;
                  font-family: tahoma;
                  text-shadow: 0 0 2px #ffffff;
                  margin-top: 0;
                  text-align: center;
                "><?php echo !isset($_GET['success']) ? 'To unsubscribe to Trim-RX newsletters enter email below' : 'You have successfully unscubscribed'; ?></h3>
            <?php if(!isset($_GET['success'])): ?>
            <form method="post">
                <input type="email" name="email" style="width: 200px; height: 30px;" placeholder="Email here.."><br /><br />
                <input type="submit" name="unsubscribe_btn" style="
            border: none;
            padding: 9px 25px;
            color: #fff;
            background-color: #cf43a3;
            border-radius: 5px;
            ">
            </form>
            <?php endif; ?>
        </div>
    </body>
</html>