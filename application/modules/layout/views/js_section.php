        

    <!-- Bootstrap js-->
    <script src="<?php echo base_url();?>assets/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="<?php echo base_url();?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?php echo base_url();?>assets/js/sidebar-menu.js"></script>
    <script src="<?php echo base_url();?>assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo base_url();?>assets/js/chart/chartist/chartist.js"></script>
    <script src="<?php echo base_url();?>assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="<?php echo base_url();?>assets/js/chart/knob/knob.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/chart/knob/knob-chart.js"></script>
    <script src="<?php echo base_url();?>assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?php echo base_url();?>assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="<?php echo base_url();?>assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/dashboard/default.js"></script>
    <script src="<?php echo base_url();?>assets/js/notify/index.js"></script>
    <script src="<?php echo base_url();?>assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?php echo base_url();?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="<?php echo base_url();?>assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script src="<?php echo base_url();?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/jquery-validation-1.19.3/dist/jquery.validate.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            window.setTimeout(function() {
                $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                    $(this).remove();
                });
            }, 1000);
        });
    </script>

  </body>
</html>