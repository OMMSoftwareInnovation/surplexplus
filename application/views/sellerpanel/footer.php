  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Daterange -->
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/datepicker/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/sellerpanel/bower_components/datepicker/js/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/sellerpanel/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/sellerpanel/dist/js/demo.js"></script>
<!-- Alertify JS -->
<script src="<?php echo base_url() ?>assets/report/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/report/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/report/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/report/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/report/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/report/buttons.print.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

    $(function() {
      var now = new Date();

    $('input[name="daterange"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
         timePicker24Hour: true,
        timePickerIncrement: 5,
        minDate:  new Date(now.getTime() + (24*2*1000*60*60)),
        timePicker: true,
        locale: {format: 'YYYY/MM/DD hh:mm'}
    });
});
    $(function() {
      var now = new Date();

    $('input[name="daterange1"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
          timePicker24Hour: true,
        timePickerIncrement: 1,
        minDate:  new Date(now.getTime() + (24*2*1000*60*61.229)),
        timePicker: true,
        locale: {format: 'YYYY/MM/DD hh:mm'}
    });
});

$(document).ready(function(){

// updating the view with notifications using ajax

function load_unseen_notification(view = '')

{

 $.ajax({

  url:"<?php echo site_url('sellercontroller/fetch_notification');?>",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)

  {
   $('.menu').html(data.notification);

   if(data.unseen_notification > 0)
   {
    $('#ntf').html(data.unseen_notification);
   }

  }

 });

}

load_unseen_notification();

// submit form and get new records


// load new notifications

 $("#ntff").click(function (event) {
        //Do stuff when clicked
    
   // alert("Fsf");
  $('#ntf').html('');

 load_unseen_notification('yes');

});

setInterval(function(){

 load_unseen_notification();;

}, 5000);

});

  $(function () {
    $('#example1').DataTable()
  })
</script>

</body>
</html>
