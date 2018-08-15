<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>



 
    <div class="navigation" id="navigation">
  	<a class="nav-toggler" href="#" id="navToggler" data-toggle = 'tooltip' data-placement="right" title="Menu">
    <span class="show-nav">&#9776;</span>
    <span class="hide-nav">&times;</span>
  </a>
  <div class="navigation__inner">
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
</div>


    <div class='content'>
    	<div style="margin-bottom:5px;">
    	 <?php
     $this->widget('bootstrap.widgets.TbMenu', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'stacked'=>false, // whether this is a stacked menu
	    'items'=>$this->menu,
		)); 
	?>
</div>
    <?php echo $content; ?>
    </div>


<script>
(function ($, window, document, undefined) {
    $(function () {
        var $navigation = $('#navigation'), $navToggler = $('#navToggler');
        $('#navToggler').on('click', function (e) {
            e.preventDefault();
            $navigation.toggleClass('expanded');
        });
    });
}(jQuery, this, this.document));
</script>


	
<?php $this->endContent(); ?>