<div class="wrapper">
<div class="col-md-4 offset-md-4">
  <div id="page-login" class="">
  	<form class="form loginform" method="POST" action="<?php echo URL_SUB_FOLDER?>auth/login/">
  		<div class="login-panel card">
        <div class="card-header">
  			<div class="">Вход в панель Администратора</div>
        </div>
  			<div class="card-body">
          <?php if ($this->error<>'') {?>
            <div class="error"><?php echo $this->error ?></div>
          <?php } ?>
  				<div class="form-group">
  					<label class="control-label">Логин</label>
  					<input type="text" name="login" class="form-control" required="required">
  				</div>
  				<div class="form-group">
  					<label class="control-label">Пароль</label>
  					<input type="password" name="password" class="form-control" required="required">
  				</div>
  				<button type="submit" class="btn btn-success loginField">Вход</button>
          
  			</div>
  		</div>
  	</form>
  </div>
</div>
</div>