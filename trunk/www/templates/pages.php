<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 10.01.15
 * Time: 17:25
 */
?>
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
            <div id="article">
                <div class="image-left">
                    <img src="<?php echo SITE_DIR; ?>images/drcolbert2.jpg" />
                </div>
                <h2>De Finibus Bonorum et Malorum</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
            </div>
        </div>
        <a href="<?php echo SITE_DIR; ?>pages.php"><img src="<?php echo SITE_DIR; ?>images/arrowbutton.png" id="next_page_btn"/></a>
        <footer>
            <p>&copy; Company 2014</p>
        </footer>
    </div> 
</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter25978993 = new Ya.Metrika({id:25978993,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/25978993" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
