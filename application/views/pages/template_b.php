                        </div>
                        
                        <!-- Get div[id=calendar-preview] and paste here -->
                        <div id="calendar-preview" class="row row-centered">
                            <div class="col-md-12" id="pre-calendar-head">
                                <!-- Calendar head here! -->

                                <h1 style="text-align:center">BackStreet Boys</h1>
                                
                                <div class="row">
                                    <div class="col-md-12" style="display: inline-flex;padding:15px 30px">
                                        <div id="calendar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<script>
    var today = new Date();
    var year = today.getFullYear();
    
    $(function () {
        var currentYear = new Date().getFullYear();

        $('#calendar').calendar({
            enableContextMenu: false,
            enableRangeSelection: false,
        });
    });

</script>

</body>
</html>
