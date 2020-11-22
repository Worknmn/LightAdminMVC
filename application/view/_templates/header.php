<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
      Админка<?php if ($this->title<>'') { echo ' - '.$this->title; } ?>
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <!--<link href="<?php echo URL; ?>css/flexboxgrid.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/sidebar.css">
  	<!--<link rel="stylesheet" type="text/css" href="../node_modules/open-sans-fontface/open-sans.css">-->
  	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/all.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/sidebar.menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/style-admin.css">
    
</head>
<body>

<header>
	<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top">

		<!-- title -->
		<a class="navbar-brand" href="#"><i class="fas fa-tools mr-1 text-dark"></i>
			<span class="text-dark">Админка</span>
		</a>

		<!-- sidebar toggle -->
		<button class="navbar-toggler btn btn-link border-0" type="button" id="sidebar" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
</header>

<div class="d-flex wrapper wrapper-navbar-used wrapper-navbar-fixed"> <!--****** start-->


	<nav role="navigation" class="sidebar sidebar-bg-dark sidebar-rounded-top-right shadow-box" id="navigation">

		<!-- sidebar -->
		<div class="sidebar-menu">

			<!-- menu fixed -->
			<div class="sidebar-menu-fixed">

				<!-- menu scrollbar -->
				<div class="scrollbar scrollbar-bg-dark">
        
<?php

$menuArray10 = Array(
  Array("url" => URL.'dashboard/', "title" => '', "postitle"=>'Главная', "curr"=> '', "parentpointer"=>null, 'liclass'=>'list-item', "icon"=>'<i class="fas fa-home"></i>', "submenuclass"=>'' , "subpos" => Array()), //<i class="fas fa-folder-plus"></i>
);

$menuArray20 = Array(
  Array("url" => '#', "title" => 'Офферы', "postitle"=> '', "curr"=> '', "parentpointer"=>null, "icon"=>'', 'liclass'=>'list-item', "submenuclass"=>'list-unstyled' , "subpos" => Array(
          Array("url" => '#', "title" => '', "postitle"=> 'Категории офферов', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-folder"></i>', 'liclass'=>'', "submenuclass"=>'list-unstyled list-hidden', "subpos" => Array(
                Array("url" => URL . 'offercategory/', "title" => '', "postitle"=> 'Список', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-list"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
                //Array("url" => URL . 'offercategory/add/', "title" => '', "postitle"=> 'Добавить', "curr"=> '', "icon"=>'<i class="fas fa-folder-plus"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
          )),          
          
          Array("url" => '#', "title" => '', "postitle"=> 'Свойства офферов', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-tools"></i>', 'liclass'=>'', "submenuclass"=>'list-unstyled list-hidden', "subpos" => Array(
                Array("url" => URL . 'offerpropertytypes/', "title" => '', "postitle"=> 'Типы свойства офферов', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-list"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
                Array("url" => URL . 'offerpropertytypes/add/', "title" => '', "postitle"=> 'Добавить тип', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="far fa-plus-square"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
          )),
          
          Array("url" => '#', "title" => '', "postitle"=> '--Привязка свойств к категории', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-tools"></i>', 'liclass'=>'', "submenuclass"=>'list-unstyled list-hidden', "subpos" => Array(
                Array("url" => URL . 'offerpropertycategorybind/', "title" => '', "postitle"=> 'Список свойств к категориям', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-list"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
                Array("url" => URL . 'offerpropertycategorybind/add/', "title" => '', "postitle"=> 'Добавить связь', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="far fa-plus-square"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
          )),
          
          Array("url" => '#', "title" => '', "postitle"=> 'Офферы', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-folder"></i>', 'liclass'=>'', "submenuclass"=>'list-unstyled list-hidden', "subpos" => Array(
                Array("url" => URL . 'offers/', "title" => '', "postitle"=> 'Список', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-list"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
                Array("url" => URL . 'offers/add/', "title" => '', "postitle"=> 'Добавить', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-folder-plus"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
          )),
          
          /**/

        )),
);

$menuArray30 = Array(
  //Array("url" => URL.'auth/logout/', "title" => '', "postitle"=>'Выйти', "curr"=> '', "parentpointer"=>null, 'liclass'=>'list-item', "icon"=>'<i class="fas fa-sign-out-alt"></i>', "submenuclass"=>'' , "subpos" => Array()), //<i class="fas fa-folder-plus"></i>
); 


$menuArray40 = Array(
  Array("url" => '#', "title" => 'Лэндинги', "postitle"=> '', "curr"=> '', "parentpointer"=>null, "icon"=>'', 'liclass'=>'list-item', "submenuclass"=>'list-unstyled' , "subpos" => Array(
          
          Array("url" => '#', "title" => '', "postitle"=> 'Контакты', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-folder"></i>', 'liclass'=>'', "submenuclass"=>'list-unstyled list-hidden', "subpos" => Array(
                Array("url" => URL . 'organisations/', "title" => '', "postitle"=> 'Контакты', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-list"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
                Array("url" => URL . 'organisations/add/', "title" => '', "postitle"=> 'Добавить', "curr"=> '', "icon"=>'<i class="fas fa-folder-plus"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
          )),
          
          Array("url" => '#', "title" => '', "postitle"=> 'Категории лендингов', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-folder"></i>', 'liclass'=>'', "submenuclass"=>'list-unstyled list-hidden', "subpos" => Array(
                Array("url" => URL . 'landingcategory/', "title" => '', "postitle"=> 'Список', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-list"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
                //Array("url" => URL . 'offercategory/add/', "title" => '', "postitle"=> 'Добавить', "curr"=> '', "icon"=>'<i class="fas fa-folder-plus"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
          )),
          
          Array("url" => '#', "title" => '', "postitle"=> 'Лэндинги', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-folder"></i>', 'liclass'=>'', "submenuclass"=>'list-unstyled list-hidden', "subpos" => Array(
                Array("url" => URL . 'landing/', "title" => '', "postitle"=> 'Список', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-list"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
                Array("url" => URL . 'landing/add/', "title" => '', "postitle"=> 'Добавить', "curr"=> '', "parentpointer"=>null, "icon"=>'<i class="fas fa-folder-plus"></i>', 'liclass'=>'', "submenuclass"=>'', "subpos" => Array()),
          )),
          
        )),
);

$menuArrayend = Array(
  Array("url" => URL.'auth/logout/', "title" => '', "postitle"=>'Выйти', "curr"=> '', "parentpointer"=>null, 'liclass'=>'list-item', "icon"=>'<i class="fas fa-sign-out-alt"></i>', "submenuclass"=>'' , "subpos" => Array()), //<i class="fas fa-folder-plus"></i>
); 
        
  //Array("url" => '#', "title" => '', "postitle"=> '', "curr"=> '', "icon"=>'', 'liclass'=>'list-item', "submenuclass"=>'', "subpos" => Array()),

        global $treemenu;
        $treemenu = Array();
        //$menuArray1 = setcurr($menuArray1);
        //\Mini\Libs\Helper::vdw($treemenu);
        //printmenu($menuArray1);
        printmenu(setcurr($menuArray10));
        //\Mini\Libs\Helper::vdw($treemenu);
        $treemenu = Array();
        //$menuArray2 = setcurr($menuArray2);
        //\Mini\Libs\Helper::vdw($treemenu);
        printmenu(setcurr($menuArray20), 'list list-unstyled list-bg-dark list-icon-blue mb-0');
        //\Mini\Libs\Helper::vdw($treemenu);
        $treemenu = Array();
        //$menuArray2 = setcurr($menuArray2);
        //\Mini\Libs\Helper::vdw($treemenu);
        //printmenu(setcurr($menuArray30), 'list list-unstyled list-bg-dark list-icon-blue mb-0');
        //\Mini\Libs\Helper::vdw($treemenu);
        $treemenu = Array();
        //$menuArray2 = setcurr($menuArray2);
        //\Mini\Libs\Helper::vdw($treemenu);
        printmenu(setcurr($menuArray40), 'list list-unstyled list-bg-dark list-icon-blue mb-0');
        //\Mini\Libs\Helper::vdw($menuArray2);
        //printmenu($menuArray2, 'list list-unstyled list-bg-dark list-icon-blue mb-0');
        //\Mini\Libs\Helper::vdw($treemenu);
        $treemenu = Array();
        printmenu(setcurr($menuArrayend));
        //\Mini\Libs\Helper::vdw($treemenu); 
?>
        
				</div>
			</div>
		</div>
	</nav>

<?php
//\Mini\Libs\Helper::vdw($menuArray2);
//\Mini\Libs\Helper::vdw(setcurr($menuArray2));


function setcurr(&$mArray, &$parent=null) {
  global $treemenu;
  $curr = '';
  //\Mini\Libs\Helper::vdw(URL_PROTOCOL . URL_DOMAIN . $_SERVER['REQUEST_URI']);
  //\Mini\Libs\Helper::vdw($url);
  foreach ($mArray as $key=>$rec) {
    if (count($rec["subpos"])>0) {
      $treemenu[] = Array($key, &$parent, '');
      //$mArray[$key]["parentpointer"] = &$parent; 
      $mArray[$key]["subpos"] = setcurr($rec["subpos"], $mArray[$key]);
    } 
    if ($rec["url"] == strtolower(URL_PROTOCOL . URL_DOMAIN . $_SERVER['REQUEST_URI'])) {
      $mArray[$key]['curr'] = 'link-current';
      //$treemenu[] = 'find';
      //$mArray[$key]['parentpointer'] = &$parent;
      //$treemenu[] = $key;
      //$treemenu[] = 'find';
      $treemenu[] = Array($key, &$parent, 'find');
      foreach ($treemenu as &$recft) {
        if ($recft[1]!=null) {
          $recft[1]['curr'] = 'link-current';
        }
      }
      //\Mini\Libs\Helper::vdw($treemenu);
      break;
    }
  }
  return $mArray;
}

function printmenu($menu, $menuclass="") {
  global $treemenu;
  $curkey = false;
  if (count($treemenu)>0) {
    //\Mini\Libs\Helper::vdw($treemenu[count($treemenu)-1]);
    //if (($treemenu[count($treemenu)-1])==='find') {
    //  $curkey = array_shift($treemenu);
    //}
  } 
  ?>
					<!-- menu -->
					<ul class="<?php if ($menuclass=='') { echo 'list list-unstyled list-bg-dark mb-0'; } else echo $menuclass;?>">
  <?php
  foreach ($menu as $key=>$row) {
    if (count($row["subpos"])>0) {
      //$lclass = "list-link link-arrow";
      //$lclass = "";
      $aclass = "link-arrow";
    } else {
      //$lclass = "list-item";
      $aclass = "";
    }
    //$lclass = "";
    ?>
            <li class="<?php echo $row["liclass"];?>">
    <?php
    if ($row["title"]!='') {
    ?>
              <p class="list-title text-uppercase"><?php echo $row["title"] ?></p>
    <?php
    }
    if ($row['postitle']!="") {
      /*
      if ($curkey===$key) {
        $row['curr'] = 'link-current';
      }
      /**/ 
    ?>
              <a href="<?php echo $row['url'];?>" class="list-link <?php echo $aclass;?> <?php echo $row['curr'];?>"><?php if ($row['icon']!='') {?><span class="list-icon"><?php echo $row['icon'];?></span><?php } echo $row['postitle'];?></a>
    <?php
    } 
    if (count($row["subpos"])>0) {
      //printmenu($row["subpos"], 'list-hidden');
      printmenu($row["subpos"], $row["submenuclass"]);
    }
    ?>
            </li>
    <?php     
  }
  ?>
          </ul>
  <?php
}

?>