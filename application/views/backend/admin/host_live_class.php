<!DOCTYPE html>
    <head>
        <title><?php echo get_settings('system_name');?></title>
		 <link rel="icon"  sizes="16x16" href="<?php echo base_url();?>uploads/logo.png">
        <meta charset="utf-8" />
       <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/all.min.css');?>">
        <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.6/css/react-select.css"/>
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body>
        <style type="text/css">
            body {
                padding-top: 50px;
            }
            .navbar-inverse {
                background-color: #313131;
                border-color: #404142;
            }
            .navbar-header h4 {
                margin: 0;
                padding: 15px 15px;
                color: #c4c2c2;
            }
            .navbar-right h5 {
                margin: 0;
                padding: 9px 5px;
                color: #c4c2c2;
            }
            .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form{
                border-color: transparent;
            }
        </style>


            <?php 
			$select = $this->db->get_where('live_class', array('live_class_id' => $live_class_id))->result_array();
            foreach ($select as $key => $row) : 
            
                $user = explode('-', $row['created_by']);
                $user_type = $user[0];
                $user_id = $user[1];
                $staff_name =  $this->db->get_where($user_type, array($user_type.'_id' => $user_id))->row()->name;
                $account_type = $this->session->userdata('login_type');
            ?>	
        <nav id="nav-tool" class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <h4><i class="fab fa-chromecast"></i> Live Class Title : <?=$row['title']?></h4>
                </div>
                <div class="navbar-form navbar-right">
                    <h5><i class="far fa-user-circle" style=""></i> Host By : <?=$staff_name?></h5>
                </div>
            </div>
        </nav>
        <script src="https://source.zoom.us/1.7.6/lib/vendor/react.min.js"></script>
        <script src="https://source.zoom.us/1.7.6/lib/vendor/react-dom.min.js"></script>
        <script src="https://source.zoom.us/1.7.6/lib/vendor/redux.min.js"></script>
        <script src="https://source.zoom.us/1.7.6/lib/vendor/redux-thunk.min.js"></script>
        <script src="https://source.zoom.us/1.7.6/lib/vendor/jquery.min.js"></script>
        <script src="https://source.zoom.us/1.7.6/lib/vendor/lodash.min.js"></script>
        <script src="https://source.zoom.us/zoom-meeting-1.7.6.min.js"></script>
        <script type="text/javascript">
            ZoomMtg.preLoadWasm();
            ZoomMtg.prepareJssdk();
            var meetConfig = {
                apiKey: "<?=get_settings('zoom_api_key')?>",
                apiSecret: "<?=get_settings('zoom_api_secret_key')?>",
                meetingNumber: "<?=$row['meeting_id']?>",
                userName: "<?=$staff_name?>",
                passWord: "<?=$row['meeting_password']?>",
                leaveUrl: "<?php echo base_url() . $account_type.'/live_class';?>",
                role: parseInt(1, 10)
            };
            var signature = ZoomMtg.generateSignature({
                meetingNumber: meetConfig.meetingNumber,
                apiKey: meetConfig.apiKey,
                apiSecret: meetConfig.apiSecret,
                role: meetConfig.role,
                success: function(res){
                    console.log(res.result);
                }
            });
            ZoomMtg.init({
                leaveUrl: meetConfig.leaveUrl,
                isSupportAV: true,
                success: function () {
                    ZoomMtg.join(
                        {
                            meetingNumber: meetConfig.meetingNumber,
                            userName: meetConfig.userName,
                            signature: signature,
                            apiKey: meetConfig.apiKey,
                            passWord: meetConfig.passWord,
                            success: function(res){
                                $('#nav-tool').hide();
                            },
                            error: function(res) {
                                console.log(res);
                            }
                        }
                    );
                },
                error: function(res) {
                    console.log(res);
                }
            });
        </script>
		<?php endforeach;?>
		
		
		
	</body>
</html>

