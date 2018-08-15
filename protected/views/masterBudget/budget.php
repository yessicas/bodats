<?php
$this->breadcrumbs=array(
	'View Master Budget'=>array('budget'),
	'',
);

$this->menu=array(
array('label'=>'View Master Budget','url'=>array('masterbudget/budget'),'active'=>true),
);
?>

<?php

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	    $('.search-form').toggle();
	    return false;
	});
	$('.search-form form').submit(function(){
	    $.fn.yiiGridView.update('masterbudget-grid', {
	        data: $(this).serialize()
	    });
	    return false;
	});
	");
	?>

<?php
	if($year > 0) {
		//$datayear=$_GET['Year']; 
		$datayear = $year;
	}else{
        $datayear="";
    }
?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>


<h3>View Master Budget (From Sales Plan)</h3>
<hr>
		
		
	<div class="form-horiz ">
    <?php //echo $form->labelEx($model,'customername'); ?>
    <label class="control-label required" for="masterbudget_Year"><?php echo "Year &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

    <div class="controls">
	 <?php echo chtml::dropDownList('Year',$datayear,Timeanddate::getlistyear(),
	 array('prompt'=>Yii::t('strings','-- Select Year --'),'class'=>'span3'));?>

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
if($year > 0)  { ?>

<div class="userlistviewall" style="display:inline">

	<?php $this->renderPartial('../masterbudget/display',array(
			'year'=>$year,
			'arrayDataProvider'=>$arrayDataProvider,
        )); ?>

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