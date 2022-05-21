<!-- header -->
<?php $this->load->view('includes/header') ?>
<!-- end header -->

        <!-- menu -->
        <?php $this->load->view('includes/menu') ?>
        <!-- end menu -->

        <!-- page-wrapper -->
        <div id="page-wrapper">       
            <?php echo $contents; ?>
        </div>
        <!-- /# end page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

</body>

</html>

<script>
  setInterval(function() {
    $.ajax({
      url: 'Telat_pengembalian/ingatkan', 
      dataType: 'json', 
      success: function (response) {
        console.log(response);
      }
    })
  }, 10000);
</script>
