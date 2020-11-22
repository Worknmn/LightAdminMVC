<?php
  $propertyconfig = unserialize($inst->propertyconfig);     
?>

    <div class="col-md-12 mb-3">
      <input name="value-<?php echo $inst->id;?>" type="text" class="form-control" id="validationDefault12" placeholder="Введите значение" value="<?php if (isset($inst->value)) echo $inst->value?>" >
    </div>
    <div class="col-md-12 mb-3">
      <?php //echo $propertyconfig["unit"];?> <?php //echo $propertyconfig["textafter"];?>
    </div>