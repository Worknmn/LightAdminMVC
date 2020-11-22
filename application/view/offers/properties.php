<?php if ($properties!==FALSE AND count($properties)>0) { foreach ($properties as $inst) { ?>
  <div class="col-md-4 mb-3">
    <?php //\Mini\Libs\Helper::vdw($inst);
      echo '<div>'.$inst->opcbname.'</div>';
      require APP . 'view/offers/types/'.$inst->type.'.php'; 
    ?>
  </div>
<?php }} else { ?>
  Нет привязанных свойств
<?php  }