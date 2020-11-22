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
	<main role="main" class="offerpropertytypes-edit">
  
  <div><b>Редактирование типа свойства оффера</b></div>
  
  <div>
<form class="form-offerpropertytypes-edit" action="<?php echo URL . 'offerpropertytypes/update/'?>" method="post">
  <div class="form-row">
    <input name="id" type="hidden" class="form-control" value="<?php echo $OPto->id; ?>">
    <input name="type" type="hidden" class="form-control" value="<?php echo $OPto->type; ?>">
    <input name="submit_update_offerpropertytypes" type="hidden" class="form-control" value="Y">
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Название</label>
      <input name="name" type="text" class="form-control" id="validationDefault02" placeholder="Название" value="<?php echo $OPto->name; ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault03">alias</label>
      <input name="alias" type="text" class="form-control" id="validationDefault03" placeholder="alias" value="<?php echo $OPto->alias; ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Порядок для админки</label>
      <input name="sort" type="text" class="form-control" id="validationDefault04" placeholder="100" value="<?php echo $OPto->sort; ?>" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3 typevalues">
    <?php
    //\Mini\Libs\Helper::vdw($OPto);             
    $propertyconfig = unserialize($OPto->propertyconfig);
    if ( $propertyconfig!==FALSE) {
    $this->propertyconfig = $propertyconfig;
    switch ($OPto->type) {
      case "onevalue":
        //$propertyconfig = array("unit" => $_POST["unit"],"textafter" => $_POST["textafter"]);
        $this->getonevalue($OPto->id);
        break;
      case "multychoosevalue":
        //$a = explode(";", $_POST["values"]);
        //foreach ($a as $key=>$val) {
        //  $a[$key] = trim($val);
        //}
        //$propertyconfig = array("values" => $a,"textafter" => $_POST["textafter"]);
        $this->getmultychoosevalue($OPto->id);
        break;
      default :
        ?>Странно, к типу нет редактора<?php
        $propertyconfig = array();
    };
    } else {
      ?>Ошибка преобразования конфигурационного поля. Нужно удалять свойство.<?php
    }
    
    ?>    
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Сохранить</button> <button class="btn btn-primary" type="reset">Сброс</button>
</form>
  </div>
  
  </main>
</div>

