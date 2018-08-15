<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'customer-users-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['CustomerUsers']['companyname']) ?$_POST['CustomerUsers']['companyname'] : $model->Customer->CompanyName;
	}
	else{
		$value=isset($_POST['CustomerUsers']['companyname']) ? $_POST['CustomerUsers']['companyname'] : '';
	}
	?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CustomerUsers_companyname"><?php echo $model::model()->getAttributeLabel('companyname'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'companyname', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('CustomerUsers/autocust')."';
						 
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
						$('#CustomerUsers_id_customer').val(listdata[item].id);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span4','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($model,'companyname'); ?>
		</div>
		</div>

		<?php echo $form->hiddenField($model,'id_customer',array('class'=>'span3','maxlength'=>20)); ?> 

	<?php //echo $form->textFieldRow($model,'id_customer',array('class'=>'span5')); ?>


	<?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['CustomerUsers']['usercust']) ?$_POST['CustomerUsers']['usercust'] : $model->Users->userid;
	}
	else{
		$value=isset($_POST['CustomerUsers']['usercust']) ? $_POST['CustomerUsers']['usercust'] : '';
	}
	?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="CustomerUsers_usercust"><?php echo $model::model()->getAttributeLabel('usercust'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'usercust', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('CustomerUsers/autouser')."';
						 
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
						$('#CustomerUsers_userid').val(listdata[item].id);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span4','value'=>$value,), 
            ));
			?> 
			<?php echo $form->error($model,'usercust'); ?>
		</div>
		</div>

		<?php echo $form->hiddenField($model,'userid',array('class'=>'span3','maxlength'=>20)); ?> 


	<?php //echo $form->textFieldRow($model,'userid',array('class'=>'span5','maxlength'=>45)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
