<?php 
	$system_name    = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
	//$system_title    = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
	$system_address = $this->db->get_where('settings', array('type' => 'address'))->row()->description;
	$footer         = $this->db->get_where('settings', array('type' => 'footer'))->row()->description;
	$text_align     = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description;
	$skin_colour     = $this->db->get_where('settings', array('type' => 'skin_colour'))->row()->description;
	$loginType      = $this->session->userdata('login_type');
	$running_year    = $this->db->get_where('settings', array('type' => 'session'))->row()->description;
?>
<?php include 'css.php'; ?>

<!-- Preloader -->
<div class="preloader">
	<div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    
	
	<?php include 'header.php'; ?>
	<?php include $loginType.'/navigation.php';?>
	<?php include 'page_info.php';?>
	<?php include $loginType.'/'.$page_name.'.php';?>
	
	
	<?php // include 'dashboard.php'; ?>
	
	
	
	
	<!-- .right-sidebar -->
	<div class="right-sidebar" style="background:url(<?php echo base_url(); ?>assets/images/10.png); opacity: 0.9;">
		<div class="slimscrollright">
			<div class="rpanel-title">Current Mesage Thread<span><i class="ti-close right-side-toggle"></i></span> </div>
			<div class="r-panel-body">
				
				<ul class="m-t-20 chatonline">
					<?php
						
						$user_array=['admin','student','teacher', 'parent', 'accountant'];
						
						for($i=0; $i<sizeof($user_array); $i++):
						$user_lists = $this->db->get($user_array[$i])->result_array();
						$admin =['admin'];
						
					?>
					<?php 
						foreach($user_lists as $key => $user_list):
						
					?>
					<?php $login_status = $user_list['login_status'];?>
					
					
					<li>
						<?php echo $user_list['name'];?>
						<span class="pull-right">
							<?php if ($login_status == '1' ): ?>
							
							<?php echo '<i class="fa fa-circle" style="color:green"></i>'?>
							<?php endif;?>
							
							<?php if ($login_status == '0' ):?>
							
							<?php echo '<i class="fa fa-circle" style="color:red"></i>'?>
							<?php endif;?>
							
							
						</span>
					</li>
					<?php endforeach;?>
					<?php endfor;?>
				</ul>
			</div>
		</div>
	</div>
	<!-- /.right-sidebar -->
</div>
<!-- /.container-fluid -->






<?php include 'footer.php'; ?>

</div>
<!-- /#page-wrapper -->
</div>


<div class="fabsa">
  	<div class="chata">
		
    	<div class="chat_headera">
			<div class="chat_optiona">
				<div class="header_img">
					
					<?php
						$key = $this->session->userdata('login_type') . '_id';
						$face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
						if (!file_exists($face_file)) {
							$face_file = 'uploads/default.jpg';                                 
						}
					?>
					
					
					<img src="<?php echo base_url() . $face_file;?>" height="50" alt="user-img"  class="img-circle"/>
				</div>
				<span id="chat_head">
					
					
					<?php 
						$account_type   =   $this->session->userdata('login_type');
						$account_id     =   $account_type.'_id';
						$name           =   $this->crud_model->get_type_name_by_id($account_type , $this->session->userdata($account_id), 'name');
						echo $name;
					?>
					
					
				</span> <br> <span class="agent"><?php echo $this->session->userdata('login_type');?></span> <span class="online"> <i class="fa fa-circle" style="color:green"> </i> </span>
				<span id="chat_fullscreen_loadera" class="chat_fullscreen_loadera"><i class="fullscreen zmdi zmdi-window-maximize"></i></span>
			</div>
		</div>
		
		<div class="chat_bodya chat_logina">
			<a id="chat_first_screen" class="faba"><i class="zmdi zmdi-arrow-right"></i></a>
			<p>Welcome to Code4you School <i class="fa fa-heart"></i></p>
		</div>
		
		<div id="chat_conversea" class="chat_conversiona chat_conversea ">
			<div class="refresh">
				
				<?php $select_all_messages_from_general_message_table = $this->crud_model->get_general_messages();
					foreach ($select_all_messages_from_general_message_table as $key => $all_message_selected):
					
					$user_list = explode('-', $all_message_selected['user_id']);
					$user_login_type = $user_list[0];
					$user_login_id = $user_list[1];
				?>
				
				<?php if($all_message_selected['user_id'] != $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id')):?>
				<span class="chat_msg_item chat_msg_item_admin">
					<div class="chat_avatar">
						<img src="<?php echo $this->crud_model->get_image_url($user_login_type, $user_login_id); ?>" class="img-circle" draggable="false"/>
					</div>
					<?php echo $all_message_selected['message'];?>
				</span>
				
				<?php endif;?>
				
				<?php if($all_message_selected['user_id'] == $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id')):?>
				<span class="chat_msg_item chat_msg_item_user">
					<?php echo $all_message_selected['message'];?>
				</span>
				
				
				<?php endif;?>
				<?php endforeach; ?>
				
				
			</div>
		</div>
		
		<div class="fab_fielda">
			<a id="fab_cameraa" class="faba"><i class="zmdi zmdi-camera"></i></a>
			<a id="fab_senda" class="faba"><i class="zmdi zmdi-mail-send submit"></i></a>
			<input type="hidden" id="user_id" name="user_id" value="<?php echo $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');?>">
			<textarea id="chatSend" name="chatSend" onclick="this.value='' " placeholder="Send a message" class="chat_fielda chat_messagea" > </textarea>
			
		</div>
		
	</div>
    <a id="prime" class="faba"><i class="prime zmdi zmdi-comment-outline"></i></a>
</div>

<script src="<?php echo base_url(); ?>js/code4youajax.js"></script>
<script type="text/javascript">
	
	// Ajax post
	$(document).ready(function() {
		$(".submit").click(function(event) {
			event.preventDefault();
			var chatSend = $("textarea#chatSend").val();
			var user_id = $("input#user_id").val();
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "admin/chatRoomMessage",
				dataType: 'json',
				data: {chatSend: chatSend, user_id: user_id},
				success: function(res) {
					if (res)
					{
						// echo some message here
					}
				}
			});
		});
	});
	
</script>

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/chat-js.js"></script>




<?php include 'modal.php'; ?>
<?php include 'js.php'; ?>										