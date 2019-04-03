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
                    <h1>個人情報</h1>
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
                    <div class="panel-title">送付先を入力してください。</div>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="infoForm" method="post"
                          action="<?= base_url() ?>paypal/create_payment_with_paypal">

                        <!-- 郵便番号 -->
                        <div class="form-group">
                            <label for="zipcode" class="col-sm-2 control-label">郵便番号*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="zipcode" name="zipcode">
                            </div>
                        </div>
                        <!-- 住所 -->
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">住所*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="address" name="address" id="address"
                                          rows="3"></textarea>
                            </div>
                        </div>
                        <!-- 氏名 -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">氏名*</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <!-- メアド -->
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">メアド*</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">ファンクラブ会員番号？</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="fanClubId" name="fanClubId">
                            </div>
                        </div>

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
        <strong>COPYRIGHT &copy; <?php echo date('Y') ?> Reserved by Libertybell.</strong>
    </div>
    <!-- /.container -->
</footer>

<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/form-controls.js"></script>
</body>
</html>
