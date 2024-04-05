<?php
require_once dirname(__FILE__) . "/include/head.php";
require_once dirname(__FILE__) . "/login_nav.php";
?>

<div>
  <form 
    id="form" 
    onsubmit="return false" 
    action="/php_project_demo/models/registration_check.php"
  >
    <div>
      <label>
        <p class="label-txt " style="color:rgb(0, 99, 151);  text-align: center; font-size:20px; font-family: monospace;"><b>請輸入EMAIL</b></p>
        <input 
          id="email" 
          type="email" 
          class="input" 
          required=""
        >
        <div class="line-box"  style="border-style: dashed; border-color:rgb(1, 89, 137);">
          <div class="line" ></div>
        </div>
      </label>
    </div>
    <div>
      <label>
        <p class="label-txt" style="color:rgb(0, 99, 151);  text-align: center; font-size:20px; font-family: monospace;"><b>請輸入使用者名稱</b></p>
        <input 
          id="username" 
          type="text" 
          class="input" 
          required=""
        >
        <div class="line-box" style="border-style: dashed; border-color:rgb(1, 89, 137);">
          <div class="line" ></div>
        </div>
      </label>
    </div>
    <div>
      <label>
        <p class="label-txt" style="color:rgb(0, 99, 151);  text-align: center; font-size:20px; font-family: monospace;"><b>請輸入密碼</b></p>
        <input 
          id="passwordInput" 
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
    <button  class="btn btn-outline-info btn-lg .btn">submit</button>
  </form>
</div>

<script>
$("#form").submit(function(e) {
  if ($("#passwordInput").val() !== $("#passwordConfirm").val()) {
    Swal.fire({
      icon: 'warning',
      title: 'On no...',
      text: '請再確認一次密碼',
    });
    return;
  } else {
    var params = {
      email: $('#email').val(),
      username: $('#username').val(),
      password: md5($('#passwordInput').val()),
    };
    var query = jQuery.param(params);
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url + '?' + query,
      success: function(data) {
        if (data.includes('已註冊過')) {
          Swal.fire({
            icon: 'warning',
            title: 'On no...',
            html:data,
          });
        }
        if (data.includes('資料新增成功')) {
          Swal.fire({
            icon: 'success',
            title: 'Nice!',
            text: '資料新增成功',
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