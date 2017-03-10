<!DOCTYPE html>
<html>
<head>
    <title>APPLICATION WEBSITE PHP MVC</title>
    <meta charset="UTF-8">

    <!-- VENDOR -->
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="<?= WEBHOST; ?>public/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= WEBHOST; ?>public/css/style.css">
    <!-- scripts -->
    <script type="text/javascript" src="<?= WEBHOST; ?>public/lib/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?= WEBHOST; ?>public/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= WEBHOST; ?>public/img/coding.png" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-responsive" aria-expanded="false">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand"><img class="logo-icon img-responsive" src="<?= WEBHOST; ?>public/img/coding.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-responsive">
                    <ul class="nav navbar-nav">
                        <li><a href="">Home</a></li>
                        <li><a href="">View</a></li>
                        <li><a href="">Document</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container">
                <div class="panel panel-default panel-notice">
                    <span class="info-custom"> <em> // pop-up info ?</em> </span>
                </div>
                <?php include $this->view; ?>
            </div>
        </div>
        <div class="footer">
        </div>
    </div>
</body>


</html>
