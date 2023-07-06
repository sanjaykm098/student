<?php
require 'class.php';
require 'sidebar.php';
?>
<div class="text-center">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2><span>
                        Access Denied</span></h2>
                <div class="mt-2">
                    Sorry, an error has occured, Requested page not found!
                </div>
                <div class="mt-3">
                    <a href="index.php" class="btn btn-primary btn-lg">
                        Take Me Home </a><a href="help.php" class="btn btn-default btn-lg"><span
                            class="glyphicon glyphicon-envelope"></span> Contact Teacher </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php'
    ?>