<style>
.typeahead_wrapper { display: block; height: 30px; }
.typeahead_photo { float: left; max-width: 230px; max-height: 30px; margin-right: 5px; border-radius: 6px;}
.typeahead_labels { float: left; height: 30px; width: 230px;}
.typeahead_primary { font-weight: bold; }
.typeahead_secondary { font-size: .8em; margin-top: -5px; }
</style>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'message-outbox-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<div class="view">
<p class="help-block"><i><?php echo Yii::t('strings','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('strings','are required') ?></i></p>

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>


	<?php echo $form->hiddenField($model,'from_outbox',array('class'=>'span5','maxlength'=>250, 'value'=>$users, 'readonly'=>'readonly')); ?>
	<?php //echo $form->textFieldRow($modelInbox,'from',array('class'=>'span5','maxlength'=>250, 'value'=>$users, 'readonly'=>'readonly')); ?>

	<?php //echo $form->textFieldRow($modelInbox,'from',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'to_outbox',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->labelEx($model,'to_outbox'); ?>
	<?php  
              /*  $this->widget('zii.widgets.jui.CJuiAutoComplete', array(  
                	'model'=>$model,
					'attribute'=>'to_outbox',
					// 'name'=>'autoposisi',
                     //'value'=>'',  
                     'source'=>$this->createUrl('messageoutbox/autosent'),  
                     'options'=>array(  
                          'showAnim'=>'fold',  
                          'minLength' => '1',  
                          'select'=>'js:function( event, ui ) {  
                               $("#MessageOutobox_id_outbox").val(ui.item.id);   
                          }'  
                     ),  
                )); 
              */ 
          ?>
     <?php
            $dataProvider =  Users::model()->findAll();
            $row = array();
            foreach ($dataProvider as $data){
				 $row[]=array( 
				 'id'=>$data->userid,
				 'nama'=>$data->full_name,
				 'type'=>UsersDB::gettype($data->type),
				 //'repo'=>UsersDB::getrepo($data->type),
				 //'image'=>UsersDB::getfoto($data->userid,$data->type),
					);
            }
			$datajason = CJSON::encode($row);  

            $this->widget('bootstrap.widgets.TbTypeahead', array(
                //'model'=>$model,
				//'attribute'=>'to_outbox',
				'name'=>'typehead',
				'id'=>'typehead',
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
								states = []; 
								listdata = {};	
							 
								var data =".$datajason."
							 
								$.each(data, function (i, state) {
									listdata[state.nama] = state;
									states.push(state.nama);
								});
							 
								process(states);
							}",
                    'items'=>5,
					'highlighter'=> "js:function(item) {
						
						var itm = ''
						
									 + '<div class=\'typeahead_wrapper\'>'
									// + '<img class=\'typeahead_photo\' src=\'".  Yii::app()->request->baseUrl."'+ listdata[item].repo +''+ listdata[item].image +'   \' />'
									 + '<div class=\'typeahead_labels\'>'
									 + '<div class=\'typeahead_primary\'>' + listdata[item].nama + ' (' + listdata[item].id + ') </div>'
									// + '<div class=\'typeahead_secondary\'>' + listdata[item].type + '</div>'
									 + '</div>'
									 + '</div>'
									
									;
								 	
						return itm;
				
					}",
                    'matcher'=>"js:function(item) {
                        return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                    }",
					'updater'=> "js:function(item) {
						$('#MessageOutbox_to_outbox').val(listdata[item].id);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span4'), 
            ));


			?>  


	<?php echo $form->hiddenField($model,'to_outbox',array('size'=>30)); ?>
    <br>
	<?php echo $form->error($model,'to_outbox'); ?>

	<?php //echo $form->textFieldRow($modelInbox,'to',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'message',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php /*echo $form->labelEx($model,'date'); ?>

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'date',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;'),
	)); ?>	
	<?php echo $form->error($model,'date'); */ ?> 

	<?php //echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('strings','Send'),
		)); ?>
</div>
</div>

<?php $this->endWidget(); ?>
