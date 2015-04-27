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
            
              <form class="form-no-horizontal-spacing" id="formAppLv2"> 
              <?php
              if($form_training->num_rows()>0){
                foreach($form_training->result() as $user){
                  if($user->is_app_lv2 != 0){
                    $disabled = 'disabled="disabled"';
                  }else{
                    $disabled = '';
                  }
                ?>
                <div class="row column-seperation">
                  <div class="col-md-12">
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">NIK</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" name="start_cuti" value="<?php echo $user_info['EMPLID']?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Nama</label>
                      </div>
                      <div class="col-md-9">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->name?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Jabatan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user_info['POSITION']?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Dept/Bagian</label>
                      </div>
                      <div class="col-md-9">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user_info['ORGANIZATION']?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Nama Program Pelatihan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama program pelatihan" value="<?php echo $user->training_name?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Tujuan Pelatihan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Tujuan pelatihan" value="<?php echo $user->tujuan_training?>" disabled="disabled">
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
                        <div class="radio">
                        <?php if($penyelenggara->num_rows()>0){
                            foreach($penyelengara->result() as $row){
                          ?>
                          <input id="penyelenggara<?php echo $row->id?>" type="radio" name="penyelenggara" value="<?php echo $row->id?>" <?php echo $disabled?>>
                          <label for="internal<?php echo $row->id?>"><?php echo $row->title?></label>
                          <?php }}else{?>
                          <input id="penyelenggara" type="radio" name="penyelenggara" value="0" checked="checked" <?php echo $disabled?> required>
                          <label for="internal">No Data</label>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Pembiayaan</label>
                      </div>
                    <div class="col-md-9">
                    <select name="pembiayaan" class="select2" id="pembiayaan" style="width:100%" <?php echo $disabled?>>
                        <?php if($pembiayaan->num_rows()>0){
                            foreach ($pembiayaan->result_array() as $key => $value) {
                            $selected = ($pembiayaan <> 0 && $pembiayaan == $value['id']) ? 'selected = selected' : '';
                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                            }}else{
                            echo '<option value="0">'.'No Data'.'</option>';
                            }
                            ?>

                    </select>
                    </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label for="besar_biaya" class="form-label text-right">Besar Biaya (Rp.)</label>
                      </div>
                      <div class="col-md-9">
                        <input name="besar_biaya" id="besar_biaya" type="text"  class="form-control" placeholder="Besar biaya (Rp.)" value="<?php echo $user->besar_biaya?>" <?php echo $disabled?> required>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Tempat Pelaksanaan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="tempat" id="tempat" type="text"  class="form-control" placeholder="Tempat Pelaksanaan" value="<?php echo $user->tempat?>" <?php echo $disabled?> required>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Waktu Pelaksanaan</label>
                      </div>
                      <div class="col-md-9">
                        <div class="input-with-icon right">
                            <div class="input-append success date no-padding">
                                <input type="text" class="form-control" id="registration_date" name="tanggal" value="<?php echo $user->tanggal?>" <?php echo $disabled?> required>
                                <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Jam</label>
                      </div>
                      
                      <div class="col-md-9">
                        <div class="input-append bootstrap-timepicker">
                          <input name="jam" id="timepicker2" type="text" class="timepicker-24" value="<?php echo $user->jam?>" <?php echo $disabled?> required>
                          <span class="add-on">
                              <i class="icon-time"></i>
                          </span>
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
                            <span class="semi-bold"><?php echo $user->name?></span><br/>
                            <span class="small"><?php echo $user->created_on?></span><br/>
                          </p>
                      </div>
                        <div class="col-md-4">
                          Persetujuan atasan,<br/><br/>
                          <p class="wf-approve-sp">
                            <?php if ($user->is_app_lv1 == 1) { ?>
                            <span class="semi-bold"><?php echo $name_app_lv1?></span><br/>
                            <span class="small"><?php echo $user->date_app_lv1?></span>
                            <?php }else{?>
                            <span class="semi-bold"></span><br/>
                            <span class="small"></span>
                            <?php } ?>
                          </p>
                        </div>
                        <div class="col-md-4">
                          Mengetahui HRD,<br/><br/>
                          <?php if($user->is_app_lv2 == 1){?>
                          <span class="semi-bold"><?php echo $name_app_lv2?></span><br/>
                          <span class="small"><?php echo $user->date_app_lv2?></span>
                          <?php }else{?>
                          <button class="btn btn-danger btn-cons" id="btn_app_lv2" type=""><i class="icon-ok"></i>Approve</button>
                          <?php }?>
                        </div>
                      </div>
                    </div>
                    
                </div>
                <?php }} ?>
              </form>
              
            </div>
          </div>
        </div>
      </div>
              
    
      </div>
    
  </div>  
  <!-- END PAGE --> 