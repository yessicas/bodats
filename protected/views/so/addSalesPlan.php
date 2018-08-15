<?php
$this->breadcrumbs=array(
	'Sos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage SO ','url'=>array('so/admin')),
array('label'=>'Create SO','url'=>array('so/searchquo')),
array('label'=>'Create SO Step 2','url'=>array('so/addSalesPlan','idquo'=>$_GET['idquo'])),
);
?>

<div id="content">
<h2>Add Sales Plan </h2>
<hr>
</div>

<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 2 of 3') ?></b> :
<?php echo Yii::t('strings','Add Sales Plan') ?>
</div>


<div class="view">

<div class="beforeload">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'so-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<?php
		echo $form->hiddenField($model,'id_quotation',array('class'=>'span5','maxlength'=>20,'value'=>$_GET['idquo'])); 

	?>


	

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Sales Plan'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('id_sales_plan','',array('class'=>'span6','readonly'=>'readonly')); 
        echo' ';
         // pake dialog 
        echo Chtml::ajaxLink('<i class="icon-search"></i> Search',Yii::app()->createUrl('salesplan/showdata/idquo/'.$_GET['idquo']),
                            array('update'=>'#namafieldsalesplan',

                            	'beforeSend' => 'function() {           
							           $(".beforeload").addClass("loadingdialog");
							        }',
						        	'complete' => 'function() {
							          $(".beforeload").removeClass("loadingdialog");
							        }',  


                            	),array("id"=>'pilihsalesplam','class'=>''));
    	
		 /* // pake fancy box
		$url = Yii::app()->createUrl('salesplan/showdata/idquo/'.$_GET['idquo']);
		echo '<a href="'.$url .'" class="various fancybox.ajax"><i class="icon-search"></i>' . Yii::t("strings","Search").'</a>';
		*/
    ?>

    <?php echo $form->hiddenField($model,'id_sales_plan',array('class'=>'span5','maxlength'=>20)); ?>

    <?php echo $form->error($model,'id_sales_plan'); ?> <!-- error message -->
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Costumer'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('CompanyName','',array('class'=>'span5','readonly'=>'readonly')); 
    ?>

	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Tug'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('Tug','',array('class'=>'span5','readonly'=>'readonly')); 
    ?>

	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Barge'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('Barge','',array('class'=>'span5','readonly'=>'readonly')); 
    ?>

	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Loading Port'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('LoadingPort','',array('class'=>'span5','readonly'=>'readonly')); 
    ?>

	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Unloading Port'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('UnloadingPort','',array('class'=>'span5','readonly'=>'readonly')); 
    ?>

	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Total Quantity'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('TotalQuantity','',array('class'=>'span5','readonly'=>'readonly')); 
    ?>

	</div>
	</div>

	<div class="control-group ">
	<label class="control-label " ><?php echo $model::model()->getAttributeLabel('Voyage No'); ?></label> <!-- label -->
	<div class="controls">
	<?php 
        echo CHtml::textField('voyage_no','',array('class'=>'span5','readonly'=>'readonly')); 
    ?>

	</div>
	</div>


</div>





	<br>

	<?php 
	if($modelquo->id_bussiness_type_order==100){
	//echo $this->renderPartial('../quotation/view_partial', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
	echo $this->renderPartial('../quotation/view_partial_with_manage_data', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo,'modelso'=>$model)); 
	}


	if($modelquo->id_bussiness_type_order==200){
	//echo $this->renderPartial('../quotation/view_partial', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
	echo $this->renderPartial('../quotation/view_partial_with_manage_data', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo,'modelso'=>$model)); 
	}

	if($modelquo->id_bussiness_type_order==250){
	//echo $this->renderPartial('../quotation/view_partial', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
	echo $this->renderPartial('../quotation/view_partial_TRANS', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo,'modelso'=>$model)); 
	}

	if($modelquo->id_bussiness_type_order==300){
	echo $this->renderPartial('../quotation/view_partialTC', array('model'=>$modelquo,'modeldetail'=>$modeldetailquo)); 
	}

	?>

	


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Continue' : 'Continue',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div>


<?php // pake dialog 

echo '<div id="namafieldsalesplan" style="visibility: hidden;"></div>';

?>



<?php // pake fancy box
/*
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 1000,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 1000,
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
*/

?>
