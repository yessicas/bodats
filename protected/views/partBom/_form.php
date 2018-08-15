<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'part-bom-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	
	<?php //echo $form->textFieldRow($model,'id_bom',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_bom',CHtml::listData(Bom::model()->findAll(), 'id_bom', 'bom_name'),
    array('prompt'=>'--Select--', 'class'=>'span2'));?>

    <?php echo $form->dropDownListRow($model,'id_part_parent',CHtml::listData(PartBom::model()->findAll(), 'id_bom', 'alias_name'),
    array('prompt'=>'--Select--', 'class'=>'span2'));?>

    <?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['PartBom']['PartName']) ? $_POST['PartBom']['PartName'] : $model->id_part;
	}
	else{
		$value=isset($_POST['PartBom']['PartName']) ? $_POST['PartBom']['PartName'] : '';
	}
	?>


	<div class="control-group ">
	<?php //echo $form->labelEx($model,'JettyName'); ?>
	<label class="control-label required" for="PartBom_PartName"><?php echo $model::model()->getAttributeLabel('PartName'); ?> <span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'PartName', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('partbom/autopartbom')."';
						 
							  // ambil JSON ke server
							  $.getJSON(urlsource+'/search/'+query, function(result) {
										  source = result;
										  $.each(source, function (i, model) {
									listdata[model.nama] = model;
									data.push(model.nama);
								 });
								 process(data);
								 });
														
							}",
					//'minLength'=>3,
                    'items'=>5,
					'highlighter'=> "js:function(item) {
						
						var itm = ''
						
									 + '<div class=\'typeahead_wrapper\'>'
									 + '<div class=\'typeahead_labels\'>'
									 + '<div class=\'typeahead_primary\'>' + listdata[item].nama + '</div>'
									 + '</div>'
									 + '</div>'
									
									;
								 	
						return itm;
				
					}",
					//'matcher'=>"js:function(item) {
                    //    return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                    //}",
					'updater'=> "js:function(item) {
						$('#PartBom_id_part').val(listdata[item].id); 
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span4','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($model,'id_part'); ?>
		</div>
		</div>

	<?php echo $form->hiddenField($model,'id_part',array('class'=>'span2','maxlength'=>3)); ?>

	<?php //echo $form->textFieldRow($model,'id_part',array('class'=>'span4','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'id_part_parent',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="control-group ">

	<label class="control-label required" for="PartBom_quantity"><?php echo $model::model()->getAttributeLabel('quantity'); ?> <span class="required">*</span></label> <!-- label -->
	
	<div class="controls">

	<?php echo $form->textField($model,'quantity',array('style'=>'width:65px','maxlength'=>20)); ?>
	<?php echo $form->dropDownlist($model,'metric',CHtml::listData(MstMetric::model()->findAll(), 'metric', 'metric'),
	array('style'=>'width:55px; font-size:10px;')); ?>

	<?php //echo $form->textFieldRow($model,'ReplaceSchedule',array('class'=>'span2')); ?>

</div>
</div>

	<?php //echo $form->textFieldRow($model,'quantity',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'metric',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'alias_name',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'code',array('class'=>'span4','maxlength'=>150)); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
