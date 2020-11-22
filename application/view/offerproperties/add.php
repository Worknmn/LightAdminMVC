<div class="container-fluid">

	<!-- content 
  
    `id` BIGINT(20) NOT NULL,
  `name` VARCHAR(255) NULL,
  `type` VARCHAR(250) NULL,
  `alias` VARCHAR(255) NULL DEFAULT '',
  `propertyconfig` LONGTEXT NULL,
  
  -->
	<main role="main" class="offerpropertytypes-add">
  
  <div><b>Добавление типа свойств офферов</b></div>
  
  <div>
<form class="form-offerpropertytypes-add" action="<?php echo URL . 'offerpropertytypes/add/'?>" method="post">
  <div class="form-row">
    <input name="id" type="hidden" class="form-control" value="">
    <input name="submit_add_offerpropertytypes" type="hidden" class="form-control" value="Y">
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Название</label>
      <input name="name" type="text" class="form-control" id="validationDefault02" placeholder="Название" value="" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault03">alias</label>
      <input name="alias" type="text" class="form-control" id="validationDefault03" placeholder="alias" value="" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Порядок для админки</label>
      <input name="sort" type="text" class="form-control" id="validationDefault04" placeholder="100" value="100" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Тип</label>
      <select name="type" type="text" class="form-control choosetype" id="validationDefault01" required>
        <option value="">Выберите тип</option>
        <option value="onevalue">Одно значение</option>
        <option value="multychoosevalue">Мульти-выбор</option>
      </select>
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
<div class="container-fluid">
<div>
Название тип обычное значение <br>
 значение, единица измерения, текст после единицы
</div>
<div>
Название тип МультиСелект <br>
 [значения] 
</div>
</div>