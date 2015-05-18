<!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">  
    
    
      <div id="container">
        <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>View Permintaan <span class="semi-bold">Pelatihan</span></h4>
            </div>
            <div class="grid-body no-border">
            <?php
              if($_num_rows > 0){
                foreach($form_training as $user){
                  if ($user->tanggal == 0000-00-00) {
                    $tanggal = "";
                    $jam = "";
                  }else{
                    $tanggal = getDateFormat($user->tanggal);
                    $jam = $user->jam;
                  }
                ?>
              <form class="form-no-horizontal-spacing" id="frmAppHr" action="<?php echo site_url('form_training/do_approve_hr') ?>" method="post"> 
                <input type="hidden" name="form_training_id" value="<?php echo $user->id ?>">
                <div class="row column-seperation">
                  <div class="col-md-12">
                    <?php foreach ($user_info as $ui) { ?>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">NIK</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" name="nik" value="<?php echo $ui->nik ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Nama</label>
                      </div>
                      <div class="col-md-9">
                        <input name="emp_name" id="emp_name" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->first_name.' '.$user->last_name ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Jabatan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="position" id="position" type="text"  class="form-control" placeholder="-" value="<?php echo $ui->position_nm ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Dept/Bagian</label>
                      </div>
                      <div class="col-md-9">
                        <input name="org_id" id="org_id" type="text"  class="form-control" placeholder="-" value="<?php echo $ui->org_nm ?>" disabled="disabled">
                      </div>
                    </div>
                    <?php } ?>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Nama Program Pelatihan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="training_nm" id="training_nm" type="text"  class="form-control" placeholder="Nama program pelatihan" value="<?php echo $user->training_name?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Tujuan Pelatihan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="tujuang_training" id="tujuang_training" type="text"  class="form-control" placeholder="Tujuan pelatihan" value="<?php echo $user->tujuan_training?>" disabled="disabled">
                      </div>
                    </div>
                  </div>
                </div>
                <div clas="row column-seperation">
                  <div class="col-md-12">
                    <div class="grid-title no-border">
                      <h4>Diisi oleh HRD</h4>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Penyelenggara</label>
                      </div>
                      <div class="col-md-9">
                        <select id="penyelenggara" name="penyelenggara" class="select2" style="width:100%;">
                          <option value="0">Penyelenggara</option>
                          <?php if ($penyelenggara_list_row > 0) {
                            foreach ($penyelenggara_list as $pl) { ?>
                              <option value="<?php echo $pl->id ?>"><?php echo $pl->title; ?></option>
                           <?php }
                          } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Pembiayaan</label>
                      </div>
                      <div class="col-md-9">
                        <select id="pembiayaan" name="pembiayaan" class="select2" style="width:100%;">
                          <option value="0">Pembiayaan</option>
                          <?php if ($pembiayaan_list_row > 0) {
                            foreach ($pembiayaan_list as $pl) { ?>
                              <option value="<?php echo $pl->id ?>"><?php echo $pl->title; ?></option>
                           <?php }
                          } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Besar Biaya (Rp.)</label>
                      </div>
                      <div class="col-md-9">
                        <input name="besar_biaya" id="besar_biaya" type="text"  class="form-control" placeholder="Besar biaya (Rp.)" value="<?php echo $user->besar_biaya ?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Tempat Pelaksanaan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="tempat" id="tempat" type="text"  class="form-control" placeholder="Tempat Pelaksanaan" value="<?php echo $user->tempat ?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Waktu Pelaksanaan</label>
                      </div>
                      <div class="col-md-9">
                        <!-- <input name="tanggal" id="tanggal" type="text"  class="form-control" placeholder="Waktu Pelaksanaan" value="<?php echo $tanggal ?>"> -->
                        <div class="input-append date success no-padding">
                          <input class="form-control" name="tanggal" type="text" value="<?php echo $tanggal ?>">
                          <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
                        </div>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Jam</label>
                      </div>
                      <div class="col-md-9">
                        <!-- <input name="jam" id="jam" type="text"  class="form-control" placeholder="Waktu Pelaksanaan" value="<?php echo $jam ?>"> -->
                        <div class="controls">
                          <div class="input-append bootstrap-timepicker-component">
                            <input class="timepicker-24 span12" type="text" name="jam" value="<?php echo $jam; ?>">
                            <span class="add-on">
                              <span class="arrow"></span>
                              <i class="icon-time"></i>
                            </span>
                          </div>
                        </div>
                      
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="form-actions">
                  <div class="col-md-12 text-center">
                      <div class="row wf-cuti">
                        <div class="col-md-4">
                          Diusulkan oleh,<br/><br/>
                          <p class="wf-approve-sp">
                            <span class="semi-bold"><?php echo $user->first_name.' '.$user->last_name ?></span><br/>
                            <span class="small"><?php echo getDateFormat($user->created_on) ?></span><br/>
                          </p>
                        </div>
                        <div class="col-md-4">
                          Persetujuan atasan,<br/><br/>
                          <p class="wf-approve-sp">
                            <?php if($user->is_app_lv1 == 1){?>
                            <span class="semi-bold"><?php echo $user_app_lv1_nm ?></span><br/>
                            <span class="small"><?php echo getDateFormat($user->date_app_lv1) ?></span>
                            <?php }else{?>
                            <span class="semi-bold"></span><br/>
                            <span class="semi-bold">(Supervisor)</span>
                            <?php } ?>
                          </p>
                        </div>
                        <div class="col-md-4">
                          Mengetahui HRD,<br/><br/>
                          <p class="wf-approve-sp">
                            <?php if($user->is_app_lv2 == 1){?>
                            <span class="semi-bold"><?php echo $user_app_lv2_nm ?></span><br/>
                            <span class="small"><?php echo getDateFormat($user->date_app_lv2) ?></span>
                            <?php }else{?>
                            <button type="submit" class="btn btn-danger btn-cons" id="btn_app_lv2" type=""><i class="icon-ok"></i>Approve</button>
                            <?php } ?>
                          </p>
                        </div>
                      </div>
                    </div>
                    
                </div>
              </form>
              <?php }}?>
            </div>
          </div>
        </div>
      </div>
              
    
      </div>
    
  </div>  
  <!-- END PAGE --> 