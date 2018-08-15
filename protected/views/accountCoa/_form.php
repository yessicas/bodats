<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'account-coa-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>


<script>
       function changelevel(data) {
                // refresh your grid
                 $("#level").html(data);
				 $("#AccountCoa_id_account_coa_parent").html('');
        }
	   function changepart(data) {
                // refresh your grid
				 $("#AccountCoa_id_account_coa_parent_ajax").html('');
                 $("#AccountCoa_id_account_coa_parent").html(data);
        }
		 function hide() {
                // refresh your grid
				//alert('xx');
				//jQuery("#Sekolah_id_kota").addClass('hidden');
				$("#AccountCoa_id_account_coa_parent").html('');
        }

</script>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_account_coa',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'account_name',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'account_name_id',array('class'=>'span5','maxlength'=>250)); ?>

	<div id="level">
	<div class="control-group ">
	<label for="PartStructure_level" class="control-label required"> <?php echo 'Level' ?> <span class="required">*</span></label>
	<div class="controls">
	<?php 
	echo CHtml::dropDownList('level','',array('1'=>'1', '2'=>'2', '3'=>'3'),
   							array('prompt'=>Yii::t('strings','-- Select --'), 'id' => 'level',

   								'disabled'=>false,
   								'ajax' => array(
   								'type'=>'POST', 
   								'url'=>CController::createUrl('Updatelevel'),
   								'update'=>'#AccountCoa_id_account_coa_parent',
   								'data'=>array('hasil_level'=>'js:this.value'),
   								'success'=>'changepart')
   								));?>
    </div>
	</div>
	</div>

	<div>
	<div class="control-group ">
	<label for="AccountCoa_id_account_coa_parent" class="control-label required"> <?php echo 'Account Coa Parent' ?> <span class="required">*</span></label>
	<div class="controls">
	<?php     
    echo CHtml::dropDownList('AccountCoa[id_account_coa_parent]','',
    	CHtml::listData(AccountCoa::model()->findAll(), 'id_account_coa', 'account_name'),
    	array('prompt'=>Yii::t('strings','-- Select --'), 
    	'id' => 'AccountCoa_id_account_coa_parent','disabled'=>false));	
	?>
	</div>
	</div>
	</div>

	<?php //echo $form->dropDownListRow($model,'level',array('1'=>'1', '2'=>'2', '3'=>'3'),array('prompt'=>'--Select--','class'=>'span2'));?>

	<?php /* echo $form->dropDownListRow($model,'id_account_coa_parent',CHtml::listData(AccountCoa::model()->findAll(), 'id_account_coa','account_name_id'),
    array('prompt'=>'--Select--','class'=>'span3')); */ ?>

	<?php //echo $form->textFieldRow($model,'id_account_coa_parent',array('class'=>'span5','maxlength'=>20)); ?>


	

	<?php //echo $form->textFieldRow($model,'level',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
