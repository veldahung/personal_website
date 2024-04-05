<?php
require_once dirname(__FILE__) . "/include/head.php";
require_once dirname(__FILE__) . "/reset_nav.php";
?>

<div>
  <form 
    id="form" 
    onsubmit="return false" 
    action="/php_project_demo/models/reset_check.php"
  >
  
    
    <div>
      <label>
        <p class="label-txt" style="color:rgb(0, 99, 151);  text-align: center; font-size:20px; font-family: monospace;"><b>請輸入原密碼</b></p>
        <input 
          id="password" 
          type="password" 
          class="input" 
          required=""
        >
        <div class="line-box" style="border-style: dashed; border-color:rgb(1, 89, 137);">
          <div class="line"></div>
        </div>
      </label>
    </div>
    <div>
      <label>
        <p class="label-txt" style="color:rgb(0, 99, 151);  text-align: center; font-size:20px; font-family: monospace;"><b>請輸入新密碼</b></p>
        <input 
          id="newpassword" 
          type="password" 
          class="input" 
          required=""
        >
        <div class="line-box" style="border-style: dashed; border-color:rgb(1, 89, 137);">
          <div class="line"></div>
        </div>
      </label>
    </div>
    <div>
      <label>
        <p class="label-txt" style="color:rgb(0, 99, 151);  text-align: center; font-size:20px; font-family: monospace;"><b>再確認一次密碼</b></p>
        <input 
          id="passwordConfirm" 
          type="password" 
          class="input" 
          autocomplete="Off" 
          required=""
        >
        <div class="line-box" style="border-style: dashed; border-color:rgb(1, 89, 137);">
          <div class="line"></div>
        </div>
      </label>
    </div>
    <button 
				class="btn btn-lg btn-primary btn-block"  
			><b>submit</b></button>  			
  </form>
</div>

<script>$("#form").submit(function(e) {
  if ($("#newpassword").val() !== $("#passwordConfirm").val()) {
    Swal.fire({
      icon: 'warning',
      title: 'Oh No',
      text: '請再確認一次密碼',
    });
    return;
  } else {
    var params = {
      newpassword: md5($('#newpassword').val()),
      password: md5($('#password').val()),
    };
    var query = jQuery.param(params);
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url + '?' + query,
      success: function(data) {
        if (data.includes('資料新增成功')) {
          Swal.fire({
            icon: 'success',
            title: 'nice!',
            text: '資料已更改',
            allowOutsideClick: false,
            showCancelButton: false,
          }).then((result) => {
            if (result.value) {
              window.location = '/php_project_demo/views/login.php'
            }
          })
        }
      }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
  }
});
</script>
