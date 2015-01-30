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
        Dr Colbert's Change Your Health in 21 Days
    </title>
    <link rel="shortcut icon" href="<?php echo SITE_DIR; ?>images/favicon.png" />
</head>
<body>
<a href="<?php echo SITE_DIR; ?>"><img id="header_image" src="<?php echo SITE_DIR; ?>images/header2.jpg" alt="header"/></a>
<div id="content">
    <div class="container">
        <div class="container" id="main-container">
            <div id="article">
               <?php @require_once( ROOT_DIR . 'templates' . DS . 'pages' . DS . 'page' . $_GET['page'] . '.php' ); ?>
            </div>
        </div>
        <?php
        $dir = opendir(ROOT_DIR . 'templates' . DS . 'pages' . DS);
        $count = 0;
        while($file = readdir($dir)){
            if($file == '.' || $file == '..' || $file == '.svn' || is_dir('path/to/dir' . $file)){
                continue;
            }
            $count++;
        }
        ?>
        <?php if($count > $_GET['page']): ?>
        <a href="<?php echo SITE_DIR; ?>pages.php?page=<?php echo ($_GET['page'] + 1); ?>"><img src="<?php echo SITE_DIR; ?>images/arrowbutton.png" id="next_page_btn"/></a>
        <?php endif; ?>
        <?php if($count >= $_GET['page']): ?>
            <br /><br />
        <?php endif; ?>

    </div> 
</div>
<footer>
    <p><a href="http://drcolbert.com">&copy; Divine Health inc. 2015</a></p>
</footer>

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
