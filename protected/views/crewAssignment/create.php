<style>
.typeahead_wrapper { display: block; height: 60px; }
.typeahead_photo { float: left; max-width: 230px; max-height: 30px; margin-right: 5px; border-radius: 6px;}
.typeahead_labels { float: left; height: 30px;}
.typeahead_primary { font-weight: bold; }
.typeahead_secondary { font-size: .8em; margin-top: -5px; }
.labeltype { }
.labeltypehead { font-weight :bold ; font-size: 12px;}
.cjui_secondary { font-size: .8em; }
.SecondData {  background-color: #E1F0ED ; }  /*tinggal uncommet ini agar bisa strip*/
.SecondData { font-size: 12px;  }
.firstData { font-size: 12px;  }
.ui-autocomplete-loading { 
background: white url('images/ajax-loader.gif') right center no-repeat; 
}
</style>


<?php
$this->breadcrumbs=array(
	'Crew Assignments'=>array('index'),
	'Create',
);

$this->menu=array(
//array('label'=>'List CrewAssignment','url'=>array('index')),
//array('label'=>'Manage CrewAssignment','url'=>array('admin')),
);
?>


<h3>Crew Sign On</h3>
<hr>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'crew-assignment-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<?php
	$crewassign = CrewDB::getCrewAssignment($id_tug, $id_crew_position);
	
	$crewdefvalue = '';
	$statdatedefvalue = '';
	$enddatedefvalue = '';
	if($crewassign != null){
		$crewdefvalue = $crewassign->CrewId;
		$statdatedefvalue = $crewassign->start_date;
		$enddatedefvalue = $crewassign->expired_date;
		echo '<div class="alert-danger info" style="padding:5px;">Update Crew Assignment</div>';
	}
	$crewpos = CrewDB::getCrewPosition($id_crew_position);
	$vessel = VesselDB::getVessel($id_tug);
?>

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

<?php //echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'vessel_id',array('class'=>'span5')); ?>
	<div class="control-group ">
		<label class="control-label" for="CrewAssignment_id_crew_position">Vessel</label>
		<div class="controls">
			<?php echo CHtml::textField('Vessel',$vessel->VesselName,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
		</div>
	</div>
	<div class="control-group ">
		<label class="control-label" for="CrewAssignment_id_crew_position">Crew Position</label>
		<div class="controls">
			<?php echo CHtml::textField('CrewPosition',$crewpos->crew_position,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
		</div>
	</div>

	<?php //echo $form->textFieldRow($model,'CrewId',array('class'=>'span5')); ?>
	<?php
		$crewdefvalue = '';
		//echo $form->dropDownListRow($model,'CrewId' ,CHtml::listData(CrewDB::getListAllCrew(), 'CrewId', 'CrewName'),
		//array('prompt'=>'-- Select --','class'=>'span3'));
	?>

	<?php /*
	<div class="control-group ">
	<label class="control-label required" for="Quotation_customername"><?php echo $model::model()->getAttributeLabel('crewName'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php
	$this->widget('bootstrap.widgets.TbTypeahead', array(
                //'name'     => 'costumername',
				'model'     => $model,  // INSTANCE OF MODEL 'User'
                'attribute' => 'crewName', // ATTRIBUTE
                'options'=>array(
                    'name'=>'typeahead',
					'source'=> "js:function(query, process) {
							 data = [];
							  listdata = {};
							  var source = [];
							  var urlsource='".$this->createUrl('cre/autocrew')."';
						 
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
									 + '<div class=\'typeahead_secondary\'> <font class=\'labeltype\'> Position :</font> ' + listdata[item].posisi + '</div>'
									 + '<div class=\'typeahead_secondary\'> <font class=\'labeltype\'> Certification Status : </font> ' + listdata[item].certificationStatus + '</div>'
									 + '<div class=\'typeahead_secondary\'>' + listdata[item].ready + '</div>'
									 + '</div>'
									 + '</div>'
									
									;
								 	
						return itm;
				
					}",
					//'matcher'=>"js:function(item) {
                    //    return ~item.toLowerCase().indexOf(this.query.toLowerCase());
                    //}",
					'updater'=> "js:function(item) {
						$('#CrewAssignment_CrewId').val(listdata[item].id);  
						return item;
					}"
                ),
                'htmlOptions'=>array('class'=>'span5','value'=>$value,), 
            ));
			?> 
			<?php // echo $form->error($model,'crewName'); ?>
		<?php /*
		</div>
		</div>
		*/
		?>

	<?php 
	if(!$model->isNewRecord){
		$value=isset($_POST['CrewAssignment']['crewName']) ?$_POST['CrewAssignment']['crewName'] : $model->crew->CrewName;
		
	}
	else{
		$value=isset($_POST['CrewAssignment']['crewName']) ? $_POST['CrewAssignment']['crewName'] : '';
	}
	?>
	<div class="control-group ">
	<label class="control-label required" for="Quotation_customername"><?php echo $model::model()->getAttributeLabel('crewName'); ?><span class="required">*</span></label> <!-- label manual -->
	
	<div class="controls">
	<?php 
	$this->widget('ext.costumautocomplete.myAutoComplete', array(
            'model'=>$model,
			'attribute'=>'crewName',
            'source'=>'js: function(request, response) {
            $.ajax({
                url: "'.$this->createUrl('cre/autocrew').'",
                dataType: "json",
                data: {
                    term: request.term,
                    brand: $("#type").val()
                },
                success: function (data) {
                    response(data);
                }
            })
            }',
            'options' => array(
                'showAnim' => 'fold',
				'minLength' => '1',  
				'select'=>'js:function( event, ui ) {  
							$("#CrewAssignment_crewName").val(ui.item.value);    
                            $("#CrewAssignment_CrewId").val(ui.item.id);    
                          }' 
            ),
            'htmlOptions' => array(
                'class' => "span5",
                'value'=>$value,
				//'style'=>'height: 20px;'
            ),
            'methodChain'=>'.data( "autocomplete" )._renderItem = function( ul, item ) {

            	if( item.no  % 2 === 0 ) {
            		var iddata="firstData";
            	}else{
            		var iddata="SecondData";
            	}

                return $( "<div class=\'drop_class\'></div>" )
                    .data( "item.autocomplete", item )
					.append("<a class=\'" + iddata +"\'> <font class=\'labeltypehead\'>" + item.nama + "</font><br> <font class=\'labeltype\'> Posisi : </font> " + item.posisi + "<br> <font class=\'labeltype\'> Certification Status : </font>"+ item.certificationStatus  + item.validcertificate + "<br>"
							+ item.ready + 
							"</a>")
					.append("<div style=\'clear:both;\'></div>")
                    .appendTo( ul );
            };'
        ));
          ?>
        <?php  echo $form->error($model,'crewName'); ?> 
		</div>
		</div>
		

	<?php echo $form->hiddenField($model,'CrewId',array('class'=>'span3','maxlength'=>20)); ?> 


	 
	 
	<?php echo $form->hiddenField($model,'vessel_id',array('class'=>'span3','maxlength'=>20)); ?> 
	<?php echo $form->hiddenField($model,'id_crew_position',array('class'=>'span3','maxlength'=>20)); ?> 

	<?php //echo $form->textFieldRow($model,'id_crew_position',array('class'=>'span5')); ?>


	<?php //echo $form->textFieldRow($model,'start_date',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>
	<?php //echo $form->textFieldRow($model,'expired_date',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>


	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('start_date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'start_date',
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
	<?php echo $form->error($model,'start_date'); ?>
	</div>
	</div>


	<div class="control-group ">
	<label class="control-label required" for="Quotation_QuotationDate"><?php echo $model::model()->getAttributeLabel('expired_date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'expired_date',
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
	<?php echo $form->error($model,'expired_date'); ?>
	</div>
	</div>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
