<?php
$this->breadcrumbs=array(
	'Account GL Postings'=>array('index'),
	$model->id_gl_posting,
);

$this->menu=array(
//array('label'=>'List AccountGlPosting','url'=>array('index')),
array('label'=>'Manage Account GL Posting','url'=>array('admin')),
array('label'=>'Create Account GL Posting','url'=>array('create')),
array('label'=>'View Account GL Posting','url'=>array('view','id'=>$model->id_gl_posting)),
array('label'=>'Update Account GL Posting','url'=>array('update','id'=>$model->id_gl_posting)),

array('label'=>'Delete Account GL Posting','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_gl_posting),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

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

<h3>View <font color=#BD362F> # <?php echo $model->Accgl->gl_name; ?></font></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_gl_posting',
	array('label'=>'Account GL',
				  'value'=>$model->Accgl->gl_name),

		//'id_account_gl',
		'pair_number',
		array(
            'name'=>'posting_date',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->posting_date, "medium",""),
           ),
		//'posting_date',
		'description',
		array(
            'label'=>'amount',
             'value'=>NumberAndCurrency::formatCurrency($model->amount),
            ),
		array('label'=>'Currency',
				  'value'=>$model->Uang->currency_type),
		//'id_currency',
		'drcr',
		'ref',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>
