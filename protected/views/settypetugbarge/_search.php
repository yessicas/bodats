<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-vessel').click(function(){
$('.search-vessel-form').toggle(300);
return false;
});


");
?>



<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
		
		<?php if(isset($_GET['SettypeTugbarge'])){
			$month=$_GET['SettypeTugbarge']['month'];
			$year=$_GET['SettypeTugbarge']['year'];
		}
		else{
			$month=ltrim(date("m"),'0');
			$year=date("Y");

		}

		?>


		<?php //echo $form->textFieldRow($model,'id_settype_tugbarge',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo "Month ".$form->dropDownList($model,'month',Timeanddate::getlistmonthforsettypetugbarge(), array('class'=>'span2', 'options' => array($month=>array('selected'=>true)))); ?>

		<?php echo "Year ".$form->dropDownList($model,'year',Timeanddate::getlistyear(),array('class'=>'span2', 'options' => array($year=>array('selected'=>true)))); ?>

		<?php //echo $form->textFieldRow($model,'first_date',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'tug',array('class'=>'span5')); ?>
		
		<br>
		<br>
		<?php echo CHtml::link('Vessel Search','#',array('class'=>'search-vessel')); ?>
		<br>

		<?php 
		if(isset($_GET['SettypeTugbarge']['tug'])||isset($_GET['SettypeTugbarge']['barge']) )  {

			if( $_GET['SettypeTugbarge']['tug']!= '' ||  $_GET['SettypeTugbarge']['barge'] != '')  {
				echo'<div class="search-vessel-form" style="display:inline">';
			}else{
				echo'<div class="search-vessel-form" style="display:none">';
			}
		} else{
			echo'<div class="search-vessel-form" style="display:none">';
		}

		?> 

		
		

		<?php echo "Tug ".$form->dropDownList($model,'tug',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
	               ':VesselType' => "TUG",
	           ),
	       )), 'id_vessel', 'VesselName'),
	    array('prompt'=>Yii::t('strings','-- ALL --'),'class'=>'span2'));?>

	    <?php echo "Barge ".$form->dropDownList($model,'barge',CHtml::listData(Vessel::model()->findAll(array(
	           'condition' => 'VesselType = :VesselType',
	           'params' => array(
	               ':VesselType' => "BARGE",
	           ),
	       )), 'id_vessel', 'VesselName'),
	    array('prompt'=>Yii::t('strings','-- ALL --'),'class'=>'span2')); ?>
		</div>

	     

		<?php //echo $form->textFieldRow($model,'barge',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'tug_power',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'barge_capacity',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'settype_name',array('class'=>'span5','maxlength'=>250)); ?>

		<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

		<br>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>

		<style>

[class^="icon-"], [class*=" icon-"] {

    margin-top: -1px;
}
</style>

		<?php    $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add data'),
                'icon'=>'plus white',
                'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('settypetugbarge/create'),
                'htmlOptions' => array(
                                       'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
	

<?php $this->endWidget(); ?>
</div>

<?php
/*
$no_hp='08561234567';
$hp=ltrim($no_hp,'0');
echo $hp ;// yang muncul adalah 8561234567
*/
?>