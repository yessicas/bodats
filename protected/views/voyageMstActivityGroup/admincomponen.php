<?php
$this->breadcrumbs=array(
	'Voyage Mst Activity Groups'=>array('admin'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('voyage-mst-activity-group-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<h1> <?php
 echo $title; ?>
 </h1> 

<?php

if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<?php $module=$this->module->getName(); ?> 

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'voyage-mst-activity-group-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		'id_voyage_activity_group',
		'voyage_activity_group_short',
		'voyage_activity_group',
		'voyage_activity_group_desc',
		'color',
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(

                        'icon'=>'icon-fa-pencil',
                         'url'=>function($data) use ($module, $controllerName, $PKFieldName) {
                                return Yii::app()->createUrl($module."/".$controllerName."/update",array("id"=>$data->$PKFieldName));
                            },
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'icon'=>'icon-fa-eye',
                        'url'=>function($data) use ($module,$controllerName, $PKFieldName) {
                                return Yii::app()->createUrl($module."/".$controllerName."/view",array("id"=>$data->$PKFieldName));
                            },
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                         'icon'=>'icon-fa-trash',
                         'url'=>function($data) use ($module,$controllerName, $PKFieldName) {
                                return Yii::app()->createUrl($module."/".$controllerName."/delete",array("id"=>$data->$PKFieldName));
                            },
                       
                    ),
                    ),
),
),
)); ?> 


<?php 
if(GeneralSetting::isUsingPopUp()){

$this->renderPartial('../../../../views/generic/_popup_ext_admin');
}

?>

