<div class="view" style="height:450px;">

	<div  class="well" >
		<b><?php echo $data->judul_topic?></b>
	</div>

	<div class="view" style="height:320px;">

	<div id="foto" style="width:80px;">
	<?php
			
	$modeluserdatadiridefaultcoment=Users::model()->findByAttributes(array('userid'=>$data->userid_created));
	echo $this->renderPartial('../friend/list_data_foto_user', array('userid'=>$modeluserdatadiridefaultcoment->userid,'type'=>$modeluserdatadiridefaultcoment->type));
	echo"<br>";
	?>
	</div>
	<?php 
	echo $this->renderPartial('../friend/list_data_nama_user', array('userid'=>$modeluserdatadiridefaultcoment->userid,'type'=>$modeluserdatadiridefaultcoment->type));
	?>

	<p><span class="label label-info"><?php echo Yii::app()->dateFormatter->formatDateTime($data->created_date, 'medium'); ?></span></p>
	
	<?php 
	$string = strip_tags($data->deskripsi);
	if (strlen($string) > 150) {
    // truncate string
    $stringCut = substr($string, 0, 150);
    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
	}
	echo'<p align="justify">';
	echo $string.'...';
	echo'</p>';
	?>

	<!-- comment-->
	<?php
	$criteria = new CDbCriteria();
	$criteria->condition = 'id_forum_topic=:id_forum_topic';
	$criteria->params = array(':id_forum_topic'=>$data->id_forum_topic);
	$criteria->limit=2;
    $criteria->order="update_date DESC";
    $comment=ForumComment::model()->findAll($criteria);
    $jumlah_comment = count($comment);  

    if( $jumlah_comment > 0){
    echo Yii::t('strings','Last Comment'),"&nbsp", ":","<br>";
    echo "<ul>";
     	foreach($comment as $list_comment)
              {
                  echo  "<li>".substr($list_comment->comment, 0, 35)."...</li>";
              }
    echo "</ul>";
	}

	if( $jumlah_comment == 0){
    echo Yii::t('strings','Empty ') , "<br>";
	}
	?>

	</div>

	<?php
	echo'<p align="right" style="margin-top:-5px;">';
    echo CHtml::link(Yii::t('strings','more..'),array('forumtopic/view','id'=>$data->id_forum_topic,'c'=>SecurityGenerator::SecurityDisplay($data->code_id) ));
    echo'</p>';
    ?>

</div>
