<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	'Manage',
);

$this->menu=array(

array('label'=>'Manage Currency','url'=>array('master/mascurr')),
array('label'=>'Create Currency','url'=>array('master/mascurrcreate')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('currency-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<div id="content">
<h2>Manage Currencies</h2>
<hr>

<?php /*
<div class="tambah">
    <?php $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Currency'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('currency/create'),
                'htmlOptions' => array(
                                        'class'=>''
                                        ),
            
                ));?>
</div> */ ?>
</div>

<?php if(Yii::app()->user->hasFlash('success')):?>
<div class = "animated flash">
    <?
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
<!--
<p>
	Sebagai opsional anda dapat memasukkan operator perbandingan (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	atau <b>=</b>) pada awal dari masing-masing data pencarian Anda. 
</p>
-->



<br>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'currency-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
//'type' => 'striped bordered condensed', 
//'summaryText'=>'',
//'enableSorting' => false,
//'htmlOptions'=>array('style'=>'font-size:12px;'),
//'afterAjaxUpdate' => 'reinstallDatePicker', 
'filter'=>$model,
'columns'=>array(
     array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),

		//'id_currency',

		'currency',
          array(
            'name'=>'change_rate',
             'value'=>'NumberAndCurrency::formatCurrency($data->change_rate)',
            ),
       // 'change_rate',
array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("currency/update",array("id"=>$data->id_currency))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("currency/view",array("id"=>$data->id_currency))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("currency/delete",array("id"=>$data->id_currency))',
                       
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
        'width'       => 400,
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

