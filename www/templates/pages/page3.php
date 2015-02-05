I need content here\
<div class="row">
    <div class="col-xs-12 col-sm-offset-2 sol-sm-8">
        <img style="max-width: 100%; " src="<?php echo SITE_DIR; ?>images/cdcopy.jpg" />
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-offset-2 sol-sm-8 col-md-offset-4 col-sm-4">
        <table border="0" class="table">
            <tr>
                <td>Product price</td>
                <td style="text-align: right;">$49.95</td>
            </tr>
            <tr>
                <td>Taxes</td>
                <td style="text-align: right;">0</td>
            </tr>
            <tr>
                <td><b>TOTAL</b></td>
                <td style="text-align: right;"><strong>$49.95</strong></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 text-center">
        <a href="<?php echo SITE_DIR; ?>pages.php?page=2"><img src="<?php echo SITE_DIR; ?>images/buynow.png" /> </a>
    </div>
</div>
<div class="modal fade" id="pop_up">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <br>
                <div class="text-center">
                    <h4 class="modal-title" id="popup_title">Get Your Personal FREE e-Guide</h4>
                </div>
                <div class="row" id="popup_content">
                    <div class="col-xs-12 col-xs-offset-0 col-sm-offset-2 col-sm-8">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" name="name" placeholder="Your First Name...">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control input-lg" name="email" placeholder="Your Email...">
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="image-button"><img src="<?php echo SITE_DIR; ?>images/get-button.png" /></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>