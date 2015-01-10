<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 11.12.14
 * Time: 19:51
 */
session_start();
require_once('config.php');
if(!isset($_POST['export']))
{
    echo ('
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="'.SITE_DIR.'css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="'.SITE_DIR.'css/style.css">
<link rel="stylesheet" type="text/css" href="'.SITE_DIR.'css/dataTables.css">
<link  rel="stylesheet" type="text/css">
<style>
.demo-container {
	box-sizing: border-box;
	width: 100%;
	height: 450px;
	padding: 20px 15px 15px 15px;
	margin: 15px auto 30px auto;
	border: 1px solid #ddd;
	background: #fff;
	background: linear-gradient(#f6f6f6 0, #fff 50px);
	background: -o-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -ms-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -moz-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -webkit-linear-gradient(#f6f6f6 0, #fff 50px);
	box-shadow: 0 3px 10px rgba(0,0,0,0.15);
	-o-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-ms-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-moz-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-webkit-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.demo-placeholder {
	width: 100%;
	height: 100%;
	font-size: 14px;
	line-height: 1.2em;
}

.legend table {
	border-spacing: 5px;
}
#preloader_back {
background-color: #918C91;
position: fixed;
top: 0;
left: 0;
right: 0;
bottom: 0;
z-index: 9999;
}
#preloader {
margin: 50px auto;
position: fixed;
left:0;
right: 0;
}
</style>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/dataTables.js"></script>
<script type="text/javascript" src="js/dataTables.js"></script>
<script type="text/javascript" src="js/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/jquery.flot.time.js"></script>
    </head>
    <body>
    ');
}
if(!$_SESSION['login'])
{
    echo ('
    <br><br><br><br><br><br><br>
    <div class="row" style="margin: 30px;">
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

    $con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = 'SELECT count(ID) count FROM wp_users WHERE sdate > "2014-12-27 00:00:00"';
    $res = mysqli_query($con,$query);
    $row = $res->fetch_assoc();
    $count = $row['count'];
    $query = 'SELECT * FROM wp_users ORDER BY ID DESC';
    $res = mysqli_query($con, $query);
    $query = 'select count(ID) count, DATE_FORMAT(sdate,"%Y, %m, %d") date from wp_users where sdate > "2014-12-01 00:00:00" group by date(sdate) order by sdate';
    $r = mysqli_query($con, $query);
    while($tmp = $r->fetch_assoc())
    {
        $graph[$tmp['date']] = $tmp['count'];
    }
    $graph = json_encode($graph);
    $query = 'select count(ID) count, DATE_FORMAT(sdate,"%Y, %m, %d") date from wp_users where sdate > "2014-12-01 00:00:00" and sent="100" group by date(sdate) order by sdate';
    $r = mysqli_query($con, $query);
    while($tmp = $r->fetch_assoc())
    {
        $unsigned[$tmp['date']] = $tmp['count'];
    }
    $unsigned = json_encode($unsigned);
    if(isset($_POST['export']))
    {
        $string = 'firstname;email;date' . "\n";

        while($row = $res->fetch_assoc())
        {
            $string .= $row['username'] . ';' . $row['email'] . ';' . date('Y-m-d H:i', strtotime($row['sdate'])) . "\n";

        }
        header('Content-type:application/csv');
        header('Content-Disposition:attachment;filename=detox_subscribers_'.date('y-m-d').'.csv');
        echo $string;
        exit;
    }
    echo '
    <div id="preloader_back">
    <img id="preloader" src="'.SITE_DIR.'images/712.gif">
    </div>
    <div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>
		</div>
<br><br><br>
    <div class="row">

        <div class="col-md-12 col-md-offset-0 col-sm-12">
        <h3>Total new subscribers quantity: ' . $count . '</h3>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">"Can Do" Challenge Subscribers</h3>
                </div>
                <div class="panel-body">
                <div class="table">
                <table class="table table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>phone</th>
                            <th>Email</th>
			    <th>Emails sent</th>
                            <th>Sign Up Date</th>
                        </tr>
                    </thead>
                    <tbody>
    ';
    while($row = $res->fetch_assoc())
    {
         echo '
                        <tr>
                            <td>
                                ' . $row['display_name'] . '
                            </td>
                            <td>
                                ' . $row['user_login'] . '
                            </td>
                            <td>
                                ' . $row['phone'] . '
                            </td>
                            <td>
                                ' . $row['user_email'] . '
                            </td>
				            <td>
                                ' . $row['sent'] . '
                            </td>
                            <td>
                                ' . date('M d, Y H:i', strtotime($row['sdate'])) . '
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
var table = jQuery('#data_table').DataTable({
    "aaSorting" : [],
    fnDrawCallback: function () {
        jQuery("#preloader_back").remove();
    }
});
    table.on( 'draw', function () {
        jQuery("#preloader_back").remove();
    } );
    $(function() {
        var arr = <?php echo $graph; ?>;
        var n = 0;
        var d2 = [];
        for(var i in arr)
        {
            d2.push([new Date(i).getTime(), arr[i]]);
            if(n == 0)var date_start = new Date(i).getTime();
            n ++;
        }
        var date_end = new Date(i).getTime();

        var arr2 = <?php echo $unsigned; ?>;
        var d1 = [];
        for(var i in arr)
        {
            d1.push([new Date(i).getTime(), arr2[i] ? arr2[i] : 0]);
        }

        // A null signifies separate line segments



        $.plot("#placeholder", [{  data: d2, label: 'Subscribers'},{data: d1, label: 'Unsubscribed' } ]  ,{
        xaxis: {
                    min: date_start,
                    max: date_end,
                    mode: "time",
                    tickSize: [1,"day"],
                    monthNames: [ "jan", "feb","mar","apr","may","jun","jul","aug","sen","oct","nov","dec"],
                    tickLength: 0,
                    axisLabel: 'Day',
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 11,
                    axisLabelPadding: 5
                },
                colors: [ "#6db6ee",
                    "red",
                    "#993eb7",
                    "#3ba3aa"],
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: { colors: [ { opacity: 0.2 }, { opacity: 0.2 } ] },
                        lineWidth: 1.5 },
                    points: {
                        show: true,
                        radius: 2.5,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        lineWidth: 1.1 }
                },
                grid: { hoverable: true, clickable: true },
                legend: {
                    show: true
                }
            }
        );
        function showTooltip(x, y, contents, areAbsoluteXY) {
            var rootElt = 'body';

            $('<div id="tooltip" class="chart-tooltip">' + contents + '</div>').css( {
                top: y - 50,
                left: x - 9,
                opacity: 0.9,
                position: 'absolute',
                'background-color':"#eee",
                padding: "10px 3px"
            }).prependTo(rootElt).show();
        };

        var previousPoint = null;
        $("#placeholder").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));

            if ($("#placeholder").length > 0) {
                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                            y = item.datapoint[1].toFixed(2);
                        var date = new Date(parseInt(x));
                        var day = date.getDate();
                        var month = [];
                        month[0] = "January";
                        month[1] = "February";
                        month[2] = "March";
                        month[3] = "April";
                        month[4] = "May";
                        month[5] = "June";
                        month[6] = "July";
                        month[7] = "August";
                        month[8] = "September";
                        month[9] = "October";
                        month[10] = "November";
                        month[11] = "December";
                        var m = month[date.getMonth()];
                        showTooltip(item.pageX, item.pageY,
                            item.series.label + " on " + (parseInt(day)<10 ? '0' + day : day) + ', ' + m + ": <b>" + parseInt(y) + "</b>", false);
                    }
                }
                else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            }
        });
        // Add the Flot version string to the footer

        //$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
    });
//    $(function () {
//        var paid = [];
//
//
//        paid.push([(new Date(2014, 12, 8)).getTime(), 155]);
//
//
//        paid.push([(new Date(2014, 12, 9)).getTime(), 517]);
//
//
//        paid.push([(new Date(2014, 12, 10)).getTime(), 392]);
//
//
//        paid.push([(new Date(2014, 12, 11)).getTime(), 784]);
//
//
//        paid.push([(new Date(2014, 12, 12)).getTime(), 461]);
//
//
//        paid.push([(new Date(2014, 12, 13)).getTime(), 194]);
//
//
//        paid.push([(new Date(2014, 12, 14)).getTime(), 123]);
//
//
//        paid.push([(new Date(2014, 12, 15)).getTime(), 124]);
//
//
//        paid.push([(new Date(2014, 12, 16)).getTime(), 289]);
//
//
//        paid.push([(new Date(2014, 12, 17)).getTime(), 244]);
//
//
//        paid.push([(new Date(2014, 12, 18)).getTime(), 1024]);
//
//
//        paid.push([(new Date(2014, 12, 19)).getTime(), 615]);
//
//
//        paid.push([(new Date(2014, 12, 20)).getTime(), 281]);
//
//
//        paid.push([(new Date(2014, 12, 21)).getTime(), 186]);
//
//
//        paid.push([(new Date(2014, 12, 22)).getTime(), 153]);
//
//
//        paid.push([(new Date(2014, 12, 23)).getTime(), 475]);
//
//
//        paid.push([(new Date(2014, 12, 24)).getTime(), 292]);
//
//
//        paid.push([(new Date(2014, 12, 25)).getTime(), 436]);
//
//
//        var plot = $.plot($("#simple_graph"),
//            [ { data: paid, label: "Paid" } ],
//            {
//                colors: [ "#6db6ee", "#95c832", "#993eb7", "#3ba3aa"],
//                series: {
//                    lines: {
//                        show: true,
//                        fill: true,
//                        fillColor: { colors: [ { opacity: 0.2 }, { opacity: 0.2 } ] },
//                        lineWidth: 1.5 },
//                    points: {
//                        show: true,
//                        radius: 2.5,
//                        fill: true,
//                        fillColor: "#ffffff",
//                        symbol: "circle",
//                        lineWidth: 1.1 }
//                },
//                grid: { hoverable: true, clickable: true },
//                legend: {
//                    show: true
//                },
//                xaxis: {
//                    min: (new Date(2014, 12, 8)).getTime(),
//                    max: (new Date(2014, 12, 25)).getTime(),
//                    mode: "time",
//                    tickSize: [1,"day"],
//                    monthNames: ["дек", "янв", "фев","мар","апр","май","июн","июл","авг","сен","окт","ноя"],
//                    tickLength: 0,
//                    axisLabel: 'Day',
//                    axisLabelUseCanvas: true,
//                    axisLabelFontSizePixels: 11,
//                    axisLabelPadding: 5
//                }
//            });
//
//        function showTooltip(x, y, contents, areAbsoluteXY) {
//            var rootElt = 'body';
//
//            $('<div id="tooltip" class="chart-tooltip">' + contents + '</div>').css( {
//                top: y - 50,
//                left: x - 9,
//                opacity: 0.9
//            }).prependTo(rootElt).show();
//        };
//
//        var previousPoint = null;
//        $("#simple_graph").bind("plothover", function (event, pos, item) {
//            $("#x").text(pos.x.toFixed(2));
//            $("#y").text(pos.y.toFixed(2));
//
//            if ($("#simple_graph").length > 0) {
//                if (item) {
//                    if (previousPoint != item.dataIndex) {
//                        previousPoint = item.dataIndex;
//
//                        $("#tooltip").remove();
//                        var x = item.datapoint[0].toFixed(2),
//                            y = item.datapoint[1].toFixed(2);
//                        var date = new Date(parseInt(x));
//                        var day = date.getDate();
//                        month = date.getMonth();
//                        showTooltip(item.pageX, item.pageY,
//                            item.series.label + " за " + (parseInt(day)<10 ? '0' + day : day) + '/' + (parseInt(month)<10 ? '0' + month : month) + ": " + parseInt(y));
//                    }
//                }
//                else {
//                    $("#tooltip").remove();
//                    previousPoint = null;
//                }
//            }
//        });
//
//        $("#simple_graph").bind("plotclick", function (event, pos, item) {
//            if (item) {
//                $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
//                plot.highlight(item.series, item.datapoint);
//            }
//        });
//    });

});
</script>
</body>
</html>