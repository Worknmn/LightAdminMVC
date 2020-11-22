<div class="container-fluid">

	<!-- content -->
	<main role="main" class="offerpropertytypes">
  
  <div><b>Настройка типов свойств офферов</b></div>
  <div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Название</th>
          <th scope="col">Тип</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($OPts as $inst) { ?>
            <tr>
                <th class="id" data-val="<?php if (isset($inst->id)) echo $inst->id;?>" scope="row"><?php if (isset($inst->id)) echo $inst->id;//echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?></th>
                <td class="name" data-val="<?php if (isset($inst->name)) echo $inst->name;?>"><?php if (isset($inst->name)) echo $inst->name; ?></td>
                <td class="type" data-val="<?php if (isset($inst->type)) echo $inst->type;?>"><?php if (isset($inst->type)) echo $inst->type; ?></td>
                <!--<td class="url" data-val="<?php if (isset($inst->url)) echo $inst->url;?>"><?php if (isset($inst->url)) echo $inst->url; ?></td>-->
                <td><a href="<?php echo URL . 'offerpropertytypes/delete/' . $inst->id ?>">Удалить</a>/<a href="<?php echo URL . 'offerpropertytypes/edit/' . $inst->id ?>" class="editoffercategory">Редактировать</a></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  
  </main>
</div>
