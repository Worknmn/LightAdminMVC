<div class="container-fluid">

	<main role="main" class="landing-add">
  
  <div><b>Добавление лэндинга</b></div>
  
  <div>
    <?php //require APP . 'view/offerpropertycategorybind/form.php';?>
    
<form class="form-landing form-landing-add" action="<?php echo URL . 'landing/add/'?>" method="post">
  <div class="form-row">
    <input name="id" type="hidden" class="form-control" value="">
    <input name="submit_add_landing" type="hidden" class="form-control" value="Y">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Сортировка</label>
      <input name="sort" type="text" class="form-control" id="validationDefault01" placeholder="Сортировка" value="100" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Название</label>
      <input name="name" type="text" class="form-control" id="validationDefault02" placeholder="Название" value="" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault03">alias</label>
      <input name="alias" type="text" class="form-control" id="validationDefault03" placeholder="alias" value="" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <div>Категория</div>
      <div>
      <select class="landingcategoryid" name="categoryid" required>
        <option value="">Выберите</option>
        <?php foreach ($LCs as $inst) { ?>
        <option value="<?php if (isset($inst->id)) echo $inst->id;?>"><?php if (isset($inst->name)) echo $inst->name;?></option>
        <?php } ?>
      </select>
      </div>
    </div>    
  </div>
  
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Title</label>
      <input name="title" type="text" class="form-control" id="validationDefault04" placeholder="title" value="" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault05">Description</label>
      <input name="description" type="text" class="form-control" id="validationDefault05" placeholder="Description" value="" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault06">keywords</label>
      <input name="keywords" type="text" class="form-control" id="validationDefault06" placeholder="keywords" value="" >
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault07">h1</label>
      <input name="h1" type="text" class="form-control" id="validationDefault07" placeholder="h1" value="" >
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault08">Верхний блок</label>
      <textarea name="uptext" type="text" class="uptext form-control" id="validationDefault08" placeholder="uptext"></textarea>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationDefault09">Текстовый блок</label>
      <textarea name="text" type="text" class="text form-control" id="validationDefault09" placeholder="text"></textarea>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationDefault10">Нижний блок</label>
      <textarea name="downtext" type="text" class="downtext form-control" id="validationDefault10" placeholder="downtext"></textarea>
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