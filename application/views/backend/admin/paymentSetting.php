<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-body table-responsive">
				<?php echo form_open(base_url().'payment/paymentSetting/update', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype'=>'multipart/form-data'));?>
				
				
				
				
				
				
				<hr>
				<strong>PAYPAL PAYMENT SETTINGS</strong>&nbsp;<i class="fa fa-angle-double-right"></i> <a href="https://paypal.com/welcome/signup/#/email_password" target="_blank">Register Here</a>
				<hr>
				<?php
					$paypal_settings = $this->crud_model->get_settings('paypal_setting');
					$paypal = json_decode($paypal_settings);
				?>	
				
				
				<div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('active'); ?></label>
                    <div class="col-sm-12">
						<select name="paypal_active" class="form-control">
							<option value="0"
							<?php if ($paypal[0]->active == 0) echo 'selected';?>>
							<?php echo get_phrase('no');?></option>
							<option value="1"
							<?php if ($paypal[0]->active == 1) echo 'selected';?>>
							<?php echo get_phrase('yes');?></option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-12" for="example-text"> <?php echo get_phrase('mode') ?></label>
                    <div class="col-sm-12">
						<select name="paypal_mode" class="form-control">
							<option value="sandbox"
							<?php if ($paypal[0]->mode == 'sandbox') echo 'selected';?>>
							<?php echo get_phrase('sandbox');?></option>
							<option value="production"
							<?php if ($paypal[0]->mode == 'production') echo 'selected';?>>
							<?php echo get_phrase('production');?></option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-12" for="example-text"> <?php echo get_phrase('client_id').' ('.get_phrase('sandbox').')'; ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="sandbox_client_id" value="<?php echo $paypal[0]->sandbox_client_id;?>" required />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-12" for="example-text"><?php echo get_phrase('client_id').' ('.get_phrase('production').')'; ?></label>
                    <div class="col-sm-12">
						<input type="text" class="form-control"  name="production_client_id" value="<?php echo $paypal[0]->production_client_id;?>" required />
					</div>
				</div>
				
				
                <div class="form-group">
					<button type="submit" class="btn btn-info btn-block btn-rounded btn-sm">&nbsp;&nbsp;Save</button>
				</div>
				
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>