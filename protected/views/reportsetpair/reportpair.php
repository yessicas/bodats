<?php
$this->breadcrumbs=array(
	'Report Set Pair'=>array('reportpair'),
);



	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	    $('.search-form').toggle();
	    return false;
	});
	$('.search-form form').submit(function(){
	    $.fn.yiiGridView.update('availability-grid', {
	        data: $(this).serialize()
	    });
	    return false;
	});
	");
	?>

<h4 style="color:#BD362F; margin-bottom:20px;"> Report Set Pair </h4>

<div class="view">

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
   // 'action'=>'reportsetpair/view',
   // 'method'=>'post',
    'method'=>'get',
)); ?>


		<?php 
	//SET Default Value
	$DEFAULT_YEAR = (Timeanddate::getCurrentYear()*1)+1;
	$DEFAULT_MONTH = '01'; //Defaultnya dimulai dari Januari
	
	if(isset($_GET['Month']))
		$DEFAULT_MONTH = $_GET['Month'];
		
	if(isset($_GET['Year']))
		$DEFAULT_YEAR = $_GET['Year'];
?>
		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="reportsetpair_Month"><?php echo "Month &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('Month',$DEFAULT_MONTH,Timeanddate::getlistmonth(),
			array('class'=>'span4'));?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="reportsetpair_Year"><?php echo "Year &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">

	<?php echo CHtml::dropDownList('Year',$DEFAULT_YEAR,Timeanddate::getlistyearFuture(),
			array('class'=>'span4'));?>

	</div>
	</div>

	<div class="form-actions">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
        )); 
?>
	</div>
</div>

<style>
table td, table th {
    padding: 5px 5px 5px 5px;

    border: 1px solid #87A1A2;
    font-size: 10px;
}

th {
	font-weight: bold;
	color:white;
}

td{
	color: black;
}
</style>

<?php
	if(isset($_GET['Month'])){
		$month = $_GET['Month'];
		$year = $_GET['Year'];
		echo $this->renderPartial('../reportsetpair/reportpairview', array('month'=>$month, 'year'=>$year)); 
		//echo $this->renderPartial('../crew/_form', array('model'=>$model)); 
	}
?>


 <?php
if(isset($_GET['Month'])) { ?>

<div class="userlistviewall" style="display:inline">

<?php 

}
else {
?>
    <div class="userlistviewall" style="display:none">
        <?php

}

?>

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