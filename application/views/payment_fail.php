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

    <!-- styles -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Logo -->
                <div class="logo">
                    <h1>購入情報</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">

            <div class="content-box-large panel-info">
                <div class="content-box-header panel-heading">
                    <div class="panel-title">登録に失敗しました。</div>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="infoForm" method="post"
                          action="<?= base_url() ?>paypal/create_payment_with_paypal">

                        <div class="form-group">
                            <div class="col-sm-5">
                            
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">購入決定！</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--  Page content -->
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>COPYRIGHT &copy; 2007, trade-me.jp inc,<br> All RIGHT RESERVED.</strong>
    </div>
    <!-- /.container -->
</footer>

<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/form-controls.js"></script>
</body>
</html>
