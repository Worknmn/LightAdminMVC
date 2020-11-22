<form class="form-offerpropertytypes-add" action="<?php echo URL . 'offerpropertycategorybind/add/'?>" method="post">
  <div class="form-row">
    <input name="id" type="hidden" class="form-control" value="">
    <input name="submit_add_offerpropertycategorybind" type="hidden" class="form-control" value="Y">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Сортировка</label>
      <input name="sort" type="text" class="form-control" id="validationDefault01" placeholder="Сортировка" value="100" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Название</label>
      <input name="name" type="text" class="form-control" id="validationDefault02" placeholder="Название" value="" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault03">URL</label>
      <input name="alias" type="text" class="form-control" id="validationDefault03" placeholder="URL" value="" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <select name="offercategoryid">
        <?php foreach ($OCs as $inst) { ?>
        <option value="<?php if (isset($inst->id)) echo $inst->id;?>"><?php if (isset($inst->name)) echo $inst->name;?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <select name="offerpropertytypesids[]" multiple>
        <?php foreach ($OPts as $inst) { ?>
        <option value="<?php if (isset($inst->id)) echo $inst->id;?>"><?php if (isset($inst->name)) echo $inst->name;?></option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-12 mb-3 typevalues">
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Сохранить</button> <button class="btn btn-primary" type="reset">Сброс</button>
</form>