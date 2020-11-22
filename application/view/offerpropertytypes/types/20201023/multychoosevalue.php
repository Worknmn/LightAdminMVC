    <div class="col-md-12 mb-3">
      <label for="validationDefault12">Значения(разделитель опций ; )</label>
      <textarea name="values" type="textarea" class="form-control" id="validationDefault12" placeholder="Значения(разделитель опций ; )" required><?php echo implode("; ", $this->propertyconfig["values"]);?></textarea>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationDefault13">Текст в конце</label>
      <input name="textafter" type="text" class="form-control" id="validationDefault13" placeholder="Текст в конце" value="<?php echo $this->propertyconfig["textafter"];?>" required>
    </div>