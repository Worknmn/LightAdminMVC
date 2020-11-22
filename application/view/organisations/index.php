<div class="container-fluid">

	<!-- content -->
	<main role="main" class="organisations">
  
  <div>Организации</div>
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
        <?php foreach ($Os as $inst) { ?>
            <tr>
                <th class="id" data-val="<?php if (isset($inst->id)) echo $inst->id;?>" scope="row"><?php if (isset($inst->id)) echo $inst->id;//echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?></th>
                <td class="sort" data-val="<?php if (isset($inst->sort)) echo $inst->sort;?>"><?php if (isset($inst->sort)) echo $inst->sort; ?></td>
                <td class="name" data-val="<?php if (isset($inst->name)) echo $inst->name;?>"><?php if (isset($inst->name)) echo $inst->name; ?></td>
                <td class="alias" data-val="<?php if (isset($inst->alias)) echo $inst->alias;?>"><?php if (isset($inst->alias)) echo $inst->alias; ?></td>
                <td><a href="<?php echo URL . 'organisations/delete/' . $inst->id ?>">Удалить</a>/<a href="<?php echo URL . 'organisations/edit/' . $inst->id ?>" class="editorganisations">Редактировать</a></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  
  <div>
  </div>
  
  </main>
</div>
