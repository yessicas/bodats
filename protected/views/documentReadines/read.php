<?php
$this->breadcrumbs=array(
	'Document Readiness'=>array('read'),
	'',
);

$this->menu=array(
array('label'=>'List of Vessel Document Readiness', 'url'=>array('documentreadines/listofvessel')),
array('label'=>'Document Readiness','url'=>array('documentreadines/readines'),'active'=>true),
);
?>

<?php

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	    $('.search-form').toggle();
	    return false;
	});
	$('.search-form form').submit(function(){
	    $.fn.yiiGridView.update('documentreadines-grid', {
	        data: $(this).serialize()
	    });
	    return false;
	});
	");
	?>



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>
		
		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="asign_Tug"><?php echo "Vessel &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php 
		$id_vessel = isset($id_vessel)? $id_vessel : 0;
		echo CHtml::dropDownList('Vessel',$id_vessel ,CHtml::listData(Vessel::model()->findAll(array('order'=>'VesselName ASC')), 'id_vessel', 'VesselName'),
     array('prompt'=>'-- Select --','class'=>'span3'));?>
	</div>
	</div>


	<div class="form-actions" style="padding: 5px; margin: 0px 0px 0px 0px;">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
            'htmlOptions'=>
            array(
            	'style'=>'margin-left:145px;'),
        )); 
?>
	</div>
<br>

<?php
if($id_vessel > 0) { ?>

<div class="userlistviewall" style="display:inline">

	<?php 
		$this->renderPartial('../documentreadines/_display',array(
			'id_vessel'=>$id_vessel
		)); 
	?>

</div>

<?php

}
else {
?>
    <div class="userlistviewall" style="display:none">
        <?php

}

?>

</div>




<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 500,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 450,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>






<?php $this->endWidget(); ?>



<script>
function reloaddata(id, data) {
     $('.userlistviewall').show(300);
}
</script>