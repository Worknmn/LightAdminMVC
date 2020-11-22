<div class="container-fluid">

	<!-- content -->
	<main role="main" class="offercategory">
  
  <div>Категории офферов</div>
  <div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Сортировка</th>
          <th scope="col">Название</th>
          <th scope="col">alias</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($OCs as $inst) { ?>
            <tr>
                <th class="id" data-val="<?php if (isset($inst->id)) echo $inst->id;?>" scope="row"><?php if (isset($inst->id)) echo $inst->id;//echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?></th>
                <td class="sort" data-val="<?php if (isset($inst->sort)) echo $inst->sort;?>"><?php if (isset($inst->sort)) echo $inst->sort; ?></td>
                <td class="name" data-val="<?php if (isset($inst->name)) echo $inst->name;?>"><?php if (isset($inst->name)) echo $inst->name; ?></td>
                <td class="url" data-val="<?php if (isset($inst->url)) echo $inst->url;?>"><?php if (isset($inst->url)) echo $inst->url; ?></td>
                <td><a href="<?php echo URL . 'offercategory/deletecategory/' . $inst->id ?>">Удалить</a>/<a href="#" class="editoffercategory">Редактировать</a></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  
  <div>
<div class="addcathead"><b>Добавить категорию</b></div><div class="editcathead invisible"><b>Редактировать категорию</b></div>
<form class="formoffercategory" action="<?php echo URL . 'offercategory/addcategory/'?>" method="post">
  <div class="form-row">
    <input name="id" type="hidden" class="form-control" value="">
    <input name="submit_add_offercategory" type="hidden" class="form-control" value="Y">
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
      <input name="url" type="text" class="form-control" id="validationDefault03" placeholder="alias" value="" required>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Сохранить</button> <button class="btn btn-primary" type="reset">Сброс</button>
</form>
  </div>
  
  </main>
</div>
