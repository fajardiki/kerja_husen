<br />
<div class="panel panel-default">
    <div class="panel-heading">
      <div class="row">
          <div class="col-lg-12">
              Dashboard
          </div>
      </div>
    </div>

    <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <canvas id="myChart" width="400" height="150"></canvas>
          </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <!-- <i class="fa fa-comments fa-5x"></i> -->
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countpetugas; ?></div>
                                <div>Unit Pelayanan</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('poli'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-book fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countpoli; ?></div>
                                <div>Poli</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('berkas'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa  fa-share-square fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $countpeminjaman; ?></div>
                                <div>Peminjaman</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('peminjaman'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-check-square   fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Pengembalian</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('pengembalian'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="panel panel-info2">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Laporan</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('laporan/peminjaman'); ?>" class="text-info">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="panel panel-danger2">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-power-off fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Logout</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('login/logout') ?>" class="text-danger2">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>

</div>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>
<!-- chartjs -->
<script src="<?php echo base_url(); ?>node_modules/chart.js/dist/chart.js"></script>

<!-- test jquery -->
<script type="text/javascript">
    $(document).ready(function(){
      $.ajax({
        url: 'dashboard/chart_data', 
        dataType: 'json',
        success: function (result) {
          const data_chart = [];
          const rgb = ['rgb(0, 128, 255)', 'rgb(19, 156, 57)', 'rgb(219, 159, 29)', 'rgb(217, 62, 56)', 'rgb(51, 182, 214)', 'rgb(209, 54, 186)']
          const warna = rgb.reverse();
          for (let i = 0; i < Object.keys(result).length; i++) {
            data_chart.push({
              label: Object.keys(result)[i],
              data: extractColumn(result[Object.keys(result)[i]], 'jumlah'),
              backgroundColor: warna[i],
              borderColor: 'black',
              borderWidth: 1
            });
          }

          new Chart($('#myChart'), {
            type: 'bar',
            data: {
                labels: extractColumn(result[Object.keys(result)[0]], 'label'),
                datasets: data_chart
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                      display: true, 
                      text: 'Peminjaman Per Poli Per Bulan'
                    }, 
                    subtitle: {
                      display: true, 
                      text: 'Tahun 2022'
                    }
                },
            }
          });
        }
      })
    });

    function extractColumn(arr, column) {
      return arr.map(x => x[column])
    }
</script>