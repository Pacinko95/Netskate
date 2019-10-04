<style>
/* Style the form */


/* Style the input fields */


/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>

<form id="regForm" class="form-horizontal" action="<?= base_url('event/insert_event')?>" method="POST" enctype="multipart/form-data">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">
                <h3 class="panel-title"><strong>Create</strong> Event</h3>
            </div>
            <div class="tab">
                <div class="panel-body">
                    <h4><b>Design <hr></b></h4>
                    <div class="row">
                        <div class="col-md-12"><label>Name Event</label><input type="text" class="form-control" name="name" > </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6"><label>Icon</label>
                        <div class="input-group">
                        <input type="file" class="form-control" name="icon">
                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                        </div>
                       </div> 
                       
                        <div class="col-md-6"><label>Banner</label>
                        <div class="input-group">
                        <input type="file" class="form-control" name="banner">
                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                        </div>
                       </div> 
                    </div>
                   
                    <div class="row">
                        <div class="col-md-6"><label>Register Date</label>
                        <div class="input-group">
                         <span class="input-group-addon">Start</span>
                        <input type="text" class="form-control datepicker" name="start_reg"> 
                        </div>
                        </div>
                        <div class="col-md-6"><label>&nbsp;</label>
                        <div class="input-group">
                         <span class="input-group-addon">End</span>
                        <input type="text" class="form-control datepicker" name="end_reg">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><label>Location</label><textarea class="form-control" name="address"> </textarea> </div>
                        <div class="col-md-6"><label>Contact</label><textarea class="form-control" name="no_tlp"> </textarea> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><label>Description</label><textarea class="form-control" name="description"> </textarea> </div>
                        
                    </div>
                </div>
            </div>

            <div class="tab">
                <div class="panel-body">
                <h4><b>Template <hr></b></h4>
                    <div class="row">
                        <div class="col-md-6"> <label>Template</label>
                          <div class="input-group">
                         
                         <select class="form-control" name="template">
                              <option> select </option>
                              <?php foreach($template as $t){?>
                                <option value="<?= @$t->id ?>"> <?= $t->name?> Ver.<?= $t->version?> </option>
                              <?php } ?>
                              </select>
                              <span class="input-group-addon"><i class="fa fa-angle-down"></i></span>
                              </div>
                        </div>
                        <div class="col-md-6"><label>Buku Panduan</label>
                        <div class="input-group">
                        
                        <input type="file" class="form-control" name="book">
                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6"> <label>Account Name</label>
                             <input type="text" name="rek_address" class="form-control" >
                        </div>
                        <div class="col-md-6"> <label>Account Number</label>
                             <input type="text" name="rek_nomor" class="form-control" >
                        </div>
                        <div class="col-md-6"> <label>Bank Name</label>
                             <input type="text" name="rek_name" class="form-control" >
                       </div>
                </div>
            </div>

        <div class="panel-footer">
          
            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-default pull-left">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary pull-right">Next</button>
        </div>

    </div>

    <div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  
</div>
</form>
