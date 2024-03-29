<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 23.02.15
 * Time: 15:17
 */
session_start();
require_once('model.php');
if(!isset($_POST['export']))
{
    echo ('
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="'.SITE_DIR.'css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="'.SITE_DIR.'css/style.css">
<link rel="stylesheet" type="text/css" href="'.SITE_DIR.'css/dataTables.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/dataTables.js"></script>
    </head>
    <body>
    ');
}
if(!$_SESSION['login'])
{
    echo ('
    <br><br><br><br><br><br><br>
    <div class="row">
        <form name="login" action="controller.php" method="post">
        <div class="col-xs-offset-4 col-xs-4">
            <div class="panel panel-warning">
                <div class="panel-heading text-center">
                    <h4 class="panel-title">Log In</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>
                            Login
                        </label>
                        <input type="text" name="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            Password
                        </label>
                        <input type="password" name="password"  class="form-control">
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-success" name="login_btn" value="login">
                    <a href="' . SITE_DIR . '" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
    ');
}
if($_SESSION['login'] == 'admin')
{

    $model = new model('unsubscribers');


    $unsubscribers = $model->getAll('udate DESC');
    if(isset($_POST['export']))
    {
        $string = 'id;email;date' . "\n";

        foreach($unsubscribers as $row)
        {
            $string .= $row['id'] . ';' . $row['email'] . ';' . date('Y-m-d H:i', strtotime($row['udate'])) . "\n";

        }
        header('Content-type:application/csv');
        header('Content-Disposition:attachment;filename=detox_subscribers_'.date('y-m-d').'.csv');
        echo $string;
        exit;
    }
    echo date('Y-m-d H:i:s');
    echo '
<br><br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Unsubscribers</h3>
                </div>
                <div class="panel-body">
                <div class="table">
                <table class="table table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Unsubscribe Date</th>
                        </tr>
                    </thead>
                    <tbody>
    ';
    foreach($unsubscribers as $row)
    {
        echo '
                        <tr>
                            <td>
                                ' . $row['id'] . '
                            </td>
                            <td>
                                ' . $row['email'] . '
                            </td>
                            <td>
                                ' . date('M d, Y H:i', strtotime($row['udate'])) . '
                            </td>
                        </tr>
         ';
    }
    echo '
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
<div class="col-md-8 col-md-offset-2 col-md-offset-1 col-sm-10">
        <form action="" method="post">
            <button class="btn btn-lg btn-default" type="submit" name="export"><i class="glyphicon glyphicon-download-alt"></i> Export in CSV</button>
        </form>
</div>
    </div>
    ';
}


?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
        jQuery('#data_table').DataTable({
            "aaSorting" : []
        });
    });
</script>
</body>
</html>