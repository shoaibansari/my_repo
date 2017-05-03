
</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<!--<script src="<?=base_url()?>assets/js/jquery.min.js"></script>-->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/detect.js"></script>
<script src="<?=base_url()?>assets/js/fastclick.js"></script>
<script src="<?=base_url()?>assets/js/jquery.slimscroll.js"></script>
<script src="<?=base_url()?>assets/js/jquery.blockUI.js"></script>
<script src="<?=base_url()?>assets/js/waves.js"></script>
<script src="<?=base_url()?>assets/js/wow.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.nicescroll.js"></script>
<script src="<?=base_url()?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?=base_url()?>assets/plugins/peity/jquery.peity.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="<?=base_url()?>assets/pages/jquery.dashboard_3.js"></script>
<script src="<?=base_url()?>assets/js/jquery.core.js"></script>
<script src="<?=base_url()?>assets/js/jquery.app.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );

    window.setTimeout(function() {
    $(".alert-success").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove(); 
    });
}, 2000);

    window.setTimeout(function() {
    $(".alert-danger").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove(); 
    });
}, 2000);

</script>



</body>
</html>