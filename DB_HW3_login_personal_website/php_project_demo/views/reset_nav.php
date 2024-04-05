<nav 
  class="sticky-top navbar-dark bg-light" 
  style="width:100%; position:absolue; z-index: 10; background-color: #000000; height:10%; "
>
  <div style="width: 100%">
    <div 
      align="right" 
      style="color:#1E90FF;"
    >
      <?php echo "Hello user :<b>" . $_SESSION['username'] . "</b>&nbsp;&nbsp;&nbsp;"?>
      
      <button class="btn btn-outline-primary btn-lg .btn" onclick="
        Swal.fire({
        icon: 'warning',
        title: 'warning',
        text: '確定要登出嗎?',
        showCancelButton: true,
        }).then((result) => {
          if (result.value) {
            window.location = '/php_project_demo/views/logout.php'
          }
        })"
      ><b>登出</b></button>
      <button 
        class="btn btn-outline-primary btn-lg .btn" 
        onclick="window.location = '/php_project_demo/views/blog.php'"
      ><b>回主頁</b>

      
    </div>
  </div>
</nav>
