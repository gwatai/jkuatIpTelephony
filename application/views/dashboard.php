<script src="<?php echo base_url() ?>assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/4jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<div class="panel-header bg-primary-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
        <h5 class="text-white op-7 mb-2">Admin Telephony Dashboard</h5>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <a href="<?php echo base_url() ?>dashboard/dash" class="btn btn-white btn-border btn-round mr-2">Manage Extensions</a>
      </div>
    </div>
  </div>
</div>


<div class="page-inner mt--5">
  <div class="row mt--2">
    <div class="col-md-6">
      <div class="card full-height">
        <div class="card-body">
          <div class="card-title">Extensions statistics</div>
          <div class="card-category">Real time information about extensions </div>
          <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
            <?php

            // print_r($results);
            

            $extension[0] =[
                'id' => 1,
                'count' => '1508'
             ];
             $extension[1] =[
                'id' => 2,
                'count' => '5'
             ];
             $extension[2] =[
                'id' => 3,
                'count' => '500'

             ];
             $extension[3] =[
                'id' => 4,
                'count' => '10'
             ];

             //$extensions = (object)  $extension;

            foreach ($extension as $r) {

              $person = '';
              $bg = '';
              $t =  isset($r['count']) ? $r['count'] : 0;
              if ($r['id'] == 1) {
                $person = 'No of Extensions';
                $bg = ['#f1f1f1', '#2BB930'];
              }
              if ($r['id']  == 2) {
                $person = 'No of campuses';
                $bg = ['#f1f1f1', '#2BB930'];
              }
              if ($r['id']  == 3) {
                $person = 'No of departments';
                $bg = ['#f1f1f1', '#2BB930'];
              }
              if ($r['id']  == 4) {
                $person = 'No of users';
                $bg = ['#f1f1f1', '#2BB930'];
              }
          
            ?>

              <div class="px-2 pb-2 pb-md-0 text-center" style="color:green">
                <div id="circles-<?php echo $r['id']  ?>"></div>
                <h6 class="fw-bold mt-3 mb-0"><?php echo $person ?> </h6>
              </div>
              <script>
                Circles.create({
                  id: 'circles-<?php echo $r['id']  ?>',
                  radius: 45,
                  value: <?php echo $t ?>,
                  maxValue: 1000,
                  width: 7,
                  text: "<?php echo $t ?>",

                  duration: 400,
                  wrpClass: 'circles-wrp',
                  textClass: 'circles-text',
                  styleWrapper: true,
                  styleText: true
                })
              </script>
            <?php
            }
            ?>

          </div>

        </div>
      </div>
    </div>
    

    <div class="col-md-6">
      <div class="card full-height">
        <div class="card-body">
          <div class="card-title">Total statistics</div>
          <div class="row py-3">
            <div class="col-md-4 d-flex flex-column justify-content-around">
              <div>
                <h6 class="fw-bold text-uppercase text-success op-8">Total users</h6>
                <h3 class="fw-bold"><?php echo "10"; ?></h3>
              </div>
              <div>
                <h6 class="fw-bold text-uppercase text-danger op-8">Total extensions</h6>
                <h3 class="fw-bold"><?php echo "1508"; ?></h3>
              </div>
            </div>
  
            <div class="col-md-8">
              <div id="chart-container">
                <canvas id="totalIncomeChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 