/* Login Function Start */
function valid_login(){
		
    var username=jQuery('#username').val();
    var password=jQuery('#password').val();
    jQuery('.field_error').html('');
    var is_error='';
    if(username==''){
        jQuery('#username_error').html('Please enter username');
        is_error='yes';
    }
    if(password=='' ){
        jQuery('#password_error').html('Please enter password');
        is_error='yes';
    }
    if(is_error==''){
        jQuery.ajax({
            type:'post',
            url:'check_admin',
            data:'username='+username+'&password='+password,
            success:function(data){
                console.log(data);
                // var response=jQuery.parseJSON(data);
                // if(response.result=='success'){
                //     window.location.href='post';
                // }else{
                //     jQuery('#result').html(response.msg);
                // }
            }
        });
    }
  }