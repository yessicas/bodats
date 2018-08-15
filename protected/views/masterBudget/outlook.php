<?php
$this->breadcrumbs=array(
	'View Master Outlook'=>array('outlook'),
	'',
);

$this->menu=array(
array('label'=>'View Outlook','url'=>array('masterbudget/outlook'),'active'=>true),
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
	
	$DEFAULT_LEVEL = $outlook;
?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>


<h3>View Outlook</h3>
<hr>
		
		
	<div class="form-horiz ">
    <label class="control-label required" for="masterbudget_Year"><?php echo "Year &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

    <div class="controls">
	 <?php echo chtml::dropDownList('Year',$datayear,Timeanddate::getlistyear(),
	 array('prompt'=>Yii::t('strings','-- Select Year --'),'class'=>'span3'));?>

    </div>
    </div>
	
	<div class="form-horiz ">
    <label class="control-label required" for="outllook"><?php echo "Outlook &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

    <div class="controls">
        <?php 
			//echo CHtml::dropDownList('Level',$DEFAULT_LEVEL,array('1'=>'Level 1','2'=>'Level 2','3'=>'Level 3'),
			echo CHtml::dropDownList('outllook',$DEFAULT_LEVEL,array('1'=>'1','2'=>'2','3'=>'3'),
            array('prompt'=>Yii::t('strings','-- Select Outlook --'), 'class'=>'span3'));?>
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

	<?php $this->renderPartial('../masterbudget/_displayoutlook',array(
			'year'=>$year,
			'outlook'=>$outlook,
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