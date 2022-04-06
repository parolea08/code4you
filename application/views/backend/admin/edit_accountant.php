<?php 
$select_accountant = $this->db->get_where('accountant', array('accountant_id' => $param2))->result_array();
foreach($select_accountant as $key => $accountant):  ?>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
				<?php echo get_phrase('New Accountant');?></div>
                        <div class="panel-body">

                        <?php echo form_open(base_url() . 'admin/accountant/update/'. $accountant['accountant_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

 					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Name');?></label>

                    <div class="col-sm-12">
                            <input type="text" name="name" value="<?php echo $accountant['name'];?>" class="form-control">
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('DOB');?></label>
                    <div class="col-sm-12">
                    <input class="form-control m-r-10" name="birthday" type="date" value="<?php echo $accountant['birthday'];?>" id="example-date-input" required>
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Sex');?></label>
                    <div class="col-sm-12">
                    <select class="form-control select2" name="sex">

                    <option value="Male"<?php if ($accountant['sex'] == 'Male') echo 'selected;' ?>><?php echo get_phrase('Male');?></option>
                    <option value="Female"<?php if ($accountant['sex'] == 'Female') echo 'selected;' ?>><?php echo get_phrase('Female');?></option>
                    </select>

                        </div>
                    </div>

					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Email');?></label>
                    <div class="col-sm-12">

                            <input type="email" name="email" value="<?php echo $accountant['email'];?>" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Phone');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="phone" value="<?php echo $accountant['phone'];?>" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Qualification');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="qualification" value="<?php echo $accountant['qualification'];?>" class="form-control" >
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Marital Status');?></label>
                    <div class="col-sm-12">
                    <select class="form-control select2" name="marital_status">
                    <option value="Married" <?php if($row['marital_status'] == 'Married')echo 'selected';?>><?php echo get_phrase('Married');?></option>
                                    	<option value="Single" <?php if($row['marital_status'] == 'Single')echo 'selected';?>><?php echo get_phrase('Single');?></option>
										<option value="Divorced" <?php if($row['marital_status'] == 'Divorced')echo 'selected';?>><?php echo get_phrase('Divorced');?></option>
                                    	<option value="Engaged" <?php if($row['marital_status'] == 'Engaged')echo 'selected';?>><?php echo get_phrase('Engaged');?></option>
                    </select>

                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Address');?></label>
                    <div class="col-sm-12">

                            <textarea class="form-control" name="address"><?php echo $accountant['address'];?></textarea>
                           
                        </div>
                    </div>


                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Facebook');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="facebook" value="<?php echo $accountant['facebook'];?>" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Twitter');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="twitter" value="<?php echo $accountant['twitter'];?>" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Googleple');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="googleplus" value="<?php echo $accountant['googleplus'];?>" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Linkedin');?></label>
                    <div class="col-sm-12">

                            <input type="text" name="linkedin" value="<?php echo $accountant['linkedin'];?>" class="form-control" >
                        </div>
                    </div>


    

                    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase ('Image');?></label>
                    <div class="col-sm-12">

                            <input type="file" name="userfile" >
                            <img src="<?php echo $this->crud_model->get_image_url('accountant', $accountant['accountant_id']);?>" class="img-circle" width="30" height="30">
                        </div>
                    </div>


                    <div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm">&nbsp;&nbsp;<?php echo get_phrase ('Save');?></button>
					</div>
			<?php echo form_close();?>
            </div>
		</div>
    </div>
</div>

<?php endforeach;?>