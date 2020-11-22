<div class="container-fluid">

	<!-- content 
  
    `id` BIGINT(20) NOT NULL,
  `name` VARCHAR(255) NULL,
  `type` VARCHAR(250) NULL,
  `alias` VARCHAR(255) NULL DEFAULT '',
  `propertyconfig` LONGTEXT NULL,
    <?php //echo htmlspecialchars($OPto->artist, ENT_QUOTES, 'UTF-8'); ?>
    <?php //echo $OPto->id; ?>
  -->
	<main role="main" class="offerpropertycategorybind-edit">
  
  <div><b>Редактирование привязки типа свойства оффера к категории</b></div>
  
  <div>
<form class="form-offerpropertycategorybind-edit" action="<?php echo URL . 'offerpropertycategorybind/update/'?>" method="post">
  <div class="form-row">
    <input name="id" type="hidden" class="form-control" value="<?php echo $OPCBto->id; ?>">
    <input name="submit_update_offerpropertycategorybind" type="hidden" class="form-control" value="Y">
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Название</label>
      <input name="name" type="text" class="form-control" id="validationDefault02" placeholder="Название" value="<?php echo $OPCBto->name; ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault03">alias</label>
      <input name="alias" type="text" class="form-control" id="validationDefault03" placeholder="alias" value="<?php echo $OPCBto->alias; ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Порядок для админки</label>
      <input name="sort" type="text" class="form-control" id="validationDefault04" placeholder="100" value="<?php echo $OPCBto->sort; ?>" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <select name="offercategoryid">
        <?php foreach ($OCs as $inst) { ?>
        <option value="<?php if (isset($inst->id)) echo $inst->id;?>"<?php if ($inst->id==$OPCBto->idoffercategory) echo " selected";?>><?php if (isset($inst->name)) echo $inst->name;?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <select name="offerpropertytypesids">
        <?php foreach ($OPts as $inst) { ?>
        <option value="<?php if (isset($inst->id)) echo $inst->id;?>"<?php if ($inst->id==$OPCBto->idofferpropertytype) echo " selected";?>><?php if (isset($inst->name)) echo $inst->name;?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Сохранить</button> <button class="btn btn-primary" type="reset">Сброс</button>
</form>
  </div>
  
  </main>
  
  <?php //\Mini\Libs\Helper::vdw($OCs); ?>
  
</div>

