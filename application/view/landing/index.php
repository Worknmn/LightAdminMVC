<div class="container-fluid">

	<!-- content -->
	<main role="main" class="landing">
  
  <div>Лэндинги</div>
  <div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Сортировка</th>
          <th scope="col">Название</th>
          <th scope="col">Категория</th>
          <th scope="col">URL</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($Ls as $inst) { ?>
            <tr>
                <th class="id" data-val="<?php if (isset($inst->id)) echo $inst->id;?>" scope="row"><?php if (isset($inst->id)) echo $inst->id;//echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?></th>
                <td class="sort" data-val="<?php if (isset($inst->sort)) echo $inst->sort;?>"><?php if (isset($inst->sort)) echo $inst->sort; ?></td>
                <td class="name" data-val="<?php if (isset($inst->name)) echo $inst->name;?>"><?php if (isset($inst->name)) echo $inst->name; ?></td>
                <td class="category" data-val="<?php if (isset($inst->category)) echo $inst->category;?>"><?php if (isset($inst->category)) echo $inst->category; ?></td>
                <td class="alias" data-val="<?php if (isset($inst->alias)) echo $inst->alias;?>"><?php if (isset($inst->alias)) echo $inst->alias; ?></td>
                <td><a href="<?php echo URL . 'landing/delete/' . $inst->id ?>">Удалить</a>/<a href="<?php echo URL . 'landing/edit/' . $inst->id ?>" class="editlanding">Редактировать</a></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  
  </main>
</div>
