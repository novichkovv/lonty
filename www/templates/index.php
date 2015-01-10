<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.12.14
 * Time: 1:59
 */
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_DIR; ?>css/style.css">
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo SITE_DIR; ?>js/script.js"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        After 25 years of research, Don Colbert  MD finds answers to restoring your youth.
    </title>
    <link rel="shortcut icon" href="<?php echo SITE_DIR; ?>images/favicon.png" />
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo SITE_DIR; ?>">3rsystem.com</a>
        </div>
        <div class="navbar-collapse collapse">

        </div><!--/.navbar-collapse -->
    </div>
</div>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <div class="row" id="header_row">
            <div class="col-sm-8">
                <h1 id="title">After 25 years of research, Don Colbert  MD finds answers to restoring your youth.</h1>
                <div id="subtitle">Breakthrough New System referred as the 3 R's</div>
            </div>
            <div class="col-sm-4">
                <div class="text-right">
                    <img src="<?php echo SITE_DIR; ?>images/drcolbert.jpg" />
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <div class="container" id="main-container">
            <div id="iframe" class="col-xs-12">
                <video loop controls src="images/video.mp4" type="video/mp4" autoplay="autoplay" style="width: 100%;"></video>
            </div>

            <!--        <iframe id="iframe" width="640" height="390" src="//www.youtube.com/embed/ECKB7Rfg2GE?autoplay=1&modestbranding=1" frameborder="0" allowfullscreen ></iframe>-->
        </div>
        <a href="<?php echo SITE_DIR; ?>pages.php"><img src="<?php echo SITE_DIR; ?>images/arrowbutton.png" id="next_page_btn"/></a>
        <footer>
            <p>&copy; Company 2014</p>
        </footer>
    </div> <!-- /container -->
</div>

<script type="text/javascript">
</script>
</body>
</html>
