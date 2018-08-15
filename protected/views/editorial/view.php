<?php
/* @var $this ArticleController */
/* @var $model MemberArticle */

$this->breadcrumbs=array(
	'Artikel'=>array('mylist'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'List MemberArticle', 'url'=>array('index')),
	array('label'=>'Create MemberArticle', 'url'=>array('create')),
	array('label'=>'Update MemberArticle', 'url'=>array('update', 'id'=>$model->IDArticle)),
	array('label'=>'Delete MemberArticle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDArticle),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MemberArticle', 'url'=>array('admin')),
);
?>

<h1><?php echo CHtml::encode($model->Title); ?></h1>

<?php
			echo"<figure class='cap-left' style='margin-right:10px;'>"; // untuk hover  ubah foto

			//$repo = "repository/articles/";
			$repo = StaticPath::getArticlePath();
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "default-M.jpg");
			if(isset($model->foto)){
				$file = $repo.$model->foto;
				
				if(file_exists($file)){
					
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					//echo ImageDisplayer::displayCustomFileArticle($repo , $model->foto, "FC");
					//echo ImageDisplayer::displayDefaultFile($repo , $model->foto);
					echo ImageDisplayer::displayCustomFile($repo , $model->foto, "FC");
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			$url = Yii::app()->createUrl("editorial/uploadfoto/id/".$model->IDArticle);
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto </a>';
			if($model->isAprroved== 0 && $model->userid==Yii::app()->user->id){
			echo"<figcaption><a href='$url'class='various fancybox.ajax' style='color:#ffffff;'>Ubah Foto </a></figcaption>"; 
			}
			echo"</figure>";  // untuk hover  ubah foto
		?>
<?php echo ($model->Content); ?>
<?php //echo nl2br($model->Content); ?>

<?php 
//Display Writter
$user = UsersDB::getSingle(Yii::app()->user->id);
$this->widget('bootstrap.widgets.TbLabel', array(
	'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
	//'label'=>'Ditulis oleh : '.$user->userid,
	'label'=>Yii::t('strings','Writen By :') .' '.$model->userid,
)); ?>

<?php
	if(isset($sukses)){
		$url = Yii::app()->createUrl("editorial/view/id/".$model->IDArticle."/c/".$model->articlecode);
		echo '<div class="info">Upload Foto sudah berhasil. Jika foto pada gambar belum tampak berubah, ada kemungkinan cache browser anda. 
		<br>Silakan <b><a href="'.$url.'">refresh</a></b> kembali browser anda dengan klik <b><a href="'.$url.'">link ini.</a></b>. </div>';
	}
?>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 'auto',
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
        'width'       => 'auto',
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

