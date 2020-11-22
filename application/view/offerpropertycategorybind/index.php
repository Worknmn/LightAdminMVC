<div class="container-fluid">

	<!-- content -->
	<main role="main" class="offerpropertytypes">
  
  <div><b>Список свойств к категориям</b></div>
  <div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Название</th>
          <th scope="col">Название категории</th>
          <th scope="col">Название связанного свойства</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($OPCBs as $inst) { ?>
            <tr>
                <th class="id" data-val="<?php if (isset($inst->id)) echo $inst->id;?>" scope="row"><?php if (isset($inst->id)) echo $inst->id;//echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?></th>
                <td class="name" data-val="<?php if (isset($inst->name)) echo $inst->name;?>"><?php if (isset($inst->name)) echo $inst->name; ?></td>
                <td class="catname" data-val="<?php if (isset($inst->catname)) echo $inst->catname;?>"><?php if (isset($inst->catname)) echo $inst->catname; ?></td>
                <td class="typename" data-val="<?php if (isset($inst->typename)) echo $inst->typename;?>"><?php if (isset($inst->typename)) echo $inst->typename; ?></td>
                <!--<td class="url" data-val="<?php if (isset($inst->url)) echo $inst->url;?>"><?php if (isset($inst->url)) echo $inst->url; ?></td>-->
                <td><a href="<?php echo URL . 'offerpropertycategorybind/delete/' . $inst->id ?>">Удалить</a>/<a href="<?php echo URL . 'offerpropertycategorybind/edit/' . $inst->id ?>" class="editoffercategory">Редактировать</a></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>  
  <div>

<!--
<div class="addcathead"><b>Добавить связь</b></div><div class="editcathead invisible"><b>Редактировать связь</b></div>
  <?php //require APP . 'view/offerpropertycategorybind/form.php'; ?>
</div>
-->
  
  </main>
</div>
