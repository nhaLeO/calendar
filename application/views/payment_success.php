<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>超パーソナルライズド</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/boostrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">

    <!-- styles -->
    <link rel="stylesheet" href="../assets/css/styles.css">

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
                    <div class="panel-title">購入に成功しました。メール送信に成功しました。</div>
                </div>

                <div class="panel-body">
                    <div class="form-horizontal">

                        <!-- ID -->
                        <div class="form-group">
                            <label for="id" class="col-sm-2 control-label">購入ID</label>
                            <div class="col-sm-10">
                                <label class="col-sm-4 control-label"><?php echo $saleId;?></label>
                            </div>
                        </div>
                        <!-- 作成日時 -->
                        <div class="form-group">
                            <label for="created" class="col-sm-2 control-label">作成日時</label>
                            <div class="col-sm-10">
                            <label class="col-sm-4 control-label"><?php echo $CreateTime;?></label>
                            </div>
                        </div>
                        <!-- ステータス -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">ステータス</label>
                            <div class="col-sm-10">
                            <label class="col-sm-4 control-label"><?php echo $State;?></label>
                            </div>
                        </div>
                        <!-- 合計金額 -->
                        <div class="form-group">
                            <label for="money" class="col-sm-2 control-label">金額</label>
                            <div class="col-sm-10">
                            <label class="col-sm-4 control-label">￥<?php echo $Total;?></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-success" 
                                onclick="window.location.href='../calendar'">戻る</button>
                            </div>
                        </div>
                    </div>
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
