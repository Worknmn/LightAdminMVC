<div class="container-fluid">

	<!-- content 
  
    `id` BIGINT(20) NOT NULL,
  `name` VARCHAR(255) NULL,
  `type` VARCHAR(250) NULL,
  `alias` VARCHAR(255) NULL DEFAULT '',
  `propertyconfig` LONGTEXT NULL,
  
  -->
	<main role="main" class="offers-add">
  
  <div><b>Добавление оффера</b></div>
  
  <div>
    <?php //require APP . 'view/offerpropertycategorybind/form.php';?>
    
<form class="form-offer-add" action="<?php echo URL . 'offers/add/'?>" method="post">
  <div class="form-row">
    <input name="id" type="hidden" class="form-control" value="">
    <input name="submit_add_offer" type="hidden" class="form-control" value="Y">
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
    <div class="col-md-12 mb-3">  
    	Выбрать картинку:<br />
    	<div class="input-append">
          <div class="previewimgblock"><?php if (isset($Oto->imagefile) AND $Oto->imagefile!=='') {?><img src="/thumbs/<?php echo $Oto->imagefile;?>" /><?php } ?></div>
    	    <input name="imagefile" id="fieldIDimage" type="text" value="<?php  if (isset($Oto->imagefile)) echo $Oto->imagefile;?>" >
    	    <a href="/adminmvc/filemanager/filemanager/dialog.php?type=1&field_id=fieldIDimage&relative_url=1&multiple=0" class="btn btn-primary iframe-btn" type="button">Выбрать файл - fancybox</a>
    	</div>
    </div>    
  </div>  
  
  <div class="form-row">
    <div class="col-md-12 mb-3">  
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Бутстрап модалка-возможно слаженнее, но надо подковырять - некорректно определяет смещение стилей.
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Выбрать картинку</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div style=""><iframe width="100%" height="400" src="/adminmvc/filemanager/filemanager/dialog.php?type=1&field_id=fieldIDimage&relative_url=1&multiple=0" frameborder="0" style=""></iframe></div><!-- margin: 0 -10px; -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="descriptioneditor">Описание</label>
      <textarea id="descriptioneditor" name="text"></textarea>
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault04">Реф.ссылка</label>
      <input name="refurl" type="text" class="form-control" id="validationDefault04" placeholder="Реф.ссылка" value="" >
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <div>Категория</div>
      <select class="offercategoryid" name="offercategoryid" required>
        <option value="">Выберите</option>
        <?php foreach ($OCs as $inst) { ?>
        <option value="<?php if (isset($inst->id)) echo $inst->id;?>"><?php if (isset($inst->name)) echo $inst->name;?></option>
        <?php } ?>
      </select>
    </div>    
  </div>
  
  <div class="form-row properties">
    
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