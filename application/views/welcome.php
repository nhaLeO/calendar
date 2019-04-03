<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>超パーソナルライズド</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/boostrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <img class="w-img-banner"
                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS12wHVBZzZHSCIhJlGfViPxxDJ-Ih2uBudn0lJZ5u7CnAyLQQTbw"
                             alt="Photo">
                        <div class="w-title"><?php echo lang('w_title_1') ?>
                        </div>
                        <div class="w-title" style="margin-bottom: 20px;"><?php echo lang('w_title_2') ?>
                        </div>

                        <!-- <a class="btn btn-block w-btn-ch btn-bit">
                            <i class="fa fa-caret-down"></i><?php echo lang('w_choose') ?>
                        </a> -->
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <img class="w-img-menu"
                                     src="data:image/jpeg;base64,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"
                                     alt="Photo">

                            </div>
                            <!-- /.col -->

                            <!-- fix for small devices only -->
                            <div class="clearfix visible-sm-block"></div>

                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <button type="button" class="btn btn-block btn-default"
                                        onclick="window.location.href='a-full/white'"><?php echo lang('w_a_full_white') ?></button>
                                <div class="w-body"><?php echo lang('w_white_body') ?>: 594mm x 841mm</div>
                                <div> <p class="w-body-price">6,800円（消費税抜き） </p> <p class="w-note"><?php echo lang('w_postage_tax') ?></p> </div> 
                            </div>
                            <!-- /.col -->
                            <!-- <div class="col-md-5 col-sm-6 col-xs-12">
                                <button type="button" class="btn btn-block btn-default"
                                        onclick="window.location.href='b-full/white'"><?php echo lang('w_b_full_white') ?></button>
                                <div class="w-body"><?php echo lang('w_white_body') ?>: 728mm x 1030mm</div>
								<div> <p class="w-body-price">￥8.980 </p> <p class="w-note"><?php echo lang('w_postage_tax') ?></p></div>                                
                            </div> -->
                            <!-- /.col -->
                        </div> 
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>  
            </section>
        <!-- /.content -->
        </div>
    <!-- /.container -->
    </div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>COPYRIGHT &copy; <?php echo date('Y') ?> Reserved by Libertybell.</strong>
    </div>
    <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->

</body>
</html>
