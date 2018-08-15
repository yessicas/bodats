<?php
$this->breadcrumbs=array(
	'Account GL Postings'=>array('index'),
	'Manage',
);

$this->menu=array(

array('label'=>'Manage Account GL Posting','url'=>array('admin'),'active'=>true),
array('label'=>'Create Account GL Posting','url'=>array('create')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('account-gl-posting-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Account GL Postings</h2>
<hr>

</div>

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

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'account-gl-posting-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_gl_posting',
               array(   
                'header'=>'Account GL',
                'name'=>'id_account_gl',
                'value'=>'$data->Accgl->gl_name',
                //'filter'=>CHtml::listData(Owner::model()->findAll(),'id_owner', 'owner_name'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
		//'id_account_gl',
		'pair_number',
        array(
            'name'=>'posting_date',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->posting_date, "medium","")',
            'filter'=> CHtml::activeTextField($model, 'posting_date', array('id'=>'posting_date_grid')),
            ),
		//'posting_date',
		'description',
		
		array(
            'name'=>'amount',
             'value'=>'NumberAndCurrency::formatCurrency($data->amount)',
            ),
         array(   
                'header'=>'Currency',
                'name'=>'id_currency',
                'value'=>'$data->Uang->currency_type',
                //'filter'=>CHtml::listData(Owner::model()->findAll(),'id_owner', 'owner_name'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
		//'id_currency',
		'drcr',
		'ref',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
		
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("AccountGlPosting/update",array("id"=>$data->id_gl_posting))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("AccountGlPosting/view",array("id"=>$data->id_gl_posting))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("AccountGlPosting/delete",array("id"=>$data->id_gl_posting))',
                       
                    ),
                    ),
),
),
)); ?> 

<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
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

