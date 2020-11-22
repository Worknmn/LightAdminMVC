<?php
  $propertyconfig = unserialize($inst->propertyconfig);
  $value = array();
  if (isset($inst->value)) {
    $value = unserialize($inst->value);//if (isset($inst->value)) echo $inst->value
  } 
  //\Mini\Libs\Helper::vdw($inst);
  if (isset($propertyconfig["values"]) AND count($propertyconfig["values"])>0) {     
?>
    <div class="col-md-12 mb-3">
      <select name="value-<?php echo $inst->id?>[]" type="text" class="form-control" id="validationDefault12" placeholder="Выберите" value="" multiple>
        <?php foreach ($propertyconfig["values"] as $val) {?>
          <option value="<?php echo $val; ?>"<?php if (in_array($val, $value)) echo ' selected';?>><?php echo $val; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-md-12 mb-3">
      <?php //echo $propertyconfig["textafter"];?>
    </div>
<?php
  }