<?php
$this->breadcrumbs=array(
	'Master Schedule'=>array('master'),
	'Create',
);

$this->menu=array(
array('label'=>'List of Vessel Crew Asigment', 'url'=>array('cre/listofvessel','mode'=>'sign')),
array('label'=>'Crew Assignment','url'=>array('cre/sign'),'active'=>true),
);
?>

<?php

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	    $('.search-form').toggle();
	    return false;
	});
	$('.search-form form').submit(function(){
	    $.fn.yiiGridView.update('crewasign-grid', {
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
	<label class="control-label required" for="asign_Tug"><?php echo "Tug &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php 
		$defaultvalue = '';
		if(isset($_GET['Tug'])) {
			$defaultvalue = $_GET['Tug'];
			$id_tug = $_GET['Tug'];
		}
		if(isset($id_tug)){
			$defaultvalue = $id_tug;
			$id_tug = $id_tug;
		}

		echo CHtml::dropDownList('Tug',$defaultvalue ,CHtml::listData(VesselDB::getListTug(), 'id_vessel', 'VesselName'),
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
if($id_tug > 0) { ?>

<div class="userlistviewall" style="display:inline">
	<?php 
		$this->renderPartial('../crewAssignment/CrewSign',array('id_tug'=>$id_tug)); 
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