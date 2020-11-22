<div class="container-fluid">

	<!-- content 
  
    `id` BIGINT(20) NOT NULL,
  `name` VARCHAR(255) NULL,
  `type` VARCHAR(250) NULL,
  `alias` VARCHAR(255) NULL DEFAULT '',
  `propertyconfig` LONGTEXT NULL,
  
  -->
	<main role="main" class="organisations-add">
  
  <div><b>Редактирование организации</b></div>
  
  <div>
    <?php //require APP . 'view/offerpropertycategorybind/form.php';?>
    
<form class="form-organisations-edit" action="<?php echo URL . 'organisations/update/'?>" method="post">
  <div class="form-row">
    <input name="id" type="hidden" class="form-control" value="<?php echo $Oo->id; ?>">
    <input name="submit_edit_organisations" type="hidden" class="form-control" value="Y">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Сортировка</label>
      <input name="sort" type="text" class="form-control" id="validationDefault01" placeholder="Сортировка" value="<?php echo $Oo->id; ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Название</label>
      <input name="name" type="text" class="form-control" id="validationDefault02" placeholder="Название" value="<?php echo $Oo->name; ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault03">alias</label>
      <input name="alias" type="text" class="form-control" id="validationDefault03" placeholder="alias" value="<?php echo $Oo->alias; ?>" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">email</label>
      <input name="email" type="text" class="form-control" id="validationDefault04" placeholder="e-mail" value="<?php echo $Oo->email; ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault05">Рабочее время</label>
      <input name="worktime" type="text" class="form-control" id="validationDefault05" placeholder="Рабочее время" value="<?php echo $Oo->worktime; ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault06">Адрес</label>
      <input name="adress" type="text" class="form-control" id="validationDefault06" placeholder="Адрес" value="<?php echo $Oo->adress; ?>" required>
    </div>
  </div>

  <div class="form-row">  
    <div class="col-md-4 mb-3">
      <label for="validationDefault07">GPS Coords(пока не храню, ибо сюда карту надо сделать для задания)</label>
      <input name="position" type="text" class="form-control" id="validationDefault07" placeholder="PS Coords(пока не храню, ибо сюда карту надо сделать для задания)" value="<?php echo $Oo->position; ?>" >
    </div>
  </div>
  

  <div class="form-row">
    <div class="col-md-12 mb-3 typevalues">
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Сохранить</button> <button class="btn btn-primary" type="reset">Сброс</button>
</form>

  </div>
  
  </main>
</div>