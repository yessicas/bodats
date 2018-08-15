<?php $this->beginContent('//layouts/main'); ?>
<div class="container-fluid">
  <div class="row-fluid">

    <div class="spanleft" style="margin-left:5px;">
		<div class="hidden">
		<?php 
		// extensions menu nya tetep harus dipanggil
		 $items = array(
			10 => array(
			  'name' => '',
			  'link' => $this->createUrl('#'),
			  'icon' => '',
			  'active' => '',
			),
		  );
		$this->widget( 'ext.menu.EMenu', array('items' => $items,'cssFile'=>false,'cssUrl'=>Yii::app()->baseUrl .'/css/menu/css/accordionmenu.css') ); 
    //jika cssFile false, maka cssUrl harus di definisikan
		// extensions menu
		?>
		</div>

		<?php
			$controler_curentpage=Yii::app()->controller->id;
			$action_curentpage=Yii::app()->controller->action->id;
			echo CpanelLeftmenuDB::getListLeftMenu($controler_curentpage,$action_curentpage);
		?>

    </div>


    <div class="spancenter">
    <?php
     $this->widget('bootstrap.widgets.TbMenu', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'stacked'=>false, // whether this is a stacked menu
	    'items'=>$this->menu,
		)); 
	?>
	<br>
    <?php echo $content; ?>
    </div>
	 <div class="spanright" style=" margin-top:-20px; margin-left:15px;">
		<?php 
    echo'<br>';
		//$this->renderPartial('/site/rightmain',array(
		//)); ?>
    </div>

  </div>
</div>


<?php $this->endContent(); ?>