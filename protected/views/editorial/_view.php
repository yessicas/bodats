<?php
/* @var $this ArticleController */
/* @var $data MemberArticle */
?>
<h1><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?></h1>
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDArticle')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDArticle), array('view', 'id'=>$data->IDArticle)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDMember')); ?>:</b>
	<?php echo CHtml::encode($data->IDMember); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::encode($data->Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDSubtitle')); ?>:</b>
	<?php echo CHtml::encode($data->IDSubtitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Content')); ?>:</b>
	<?php echo CHtml::encode($data->Content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UsingFormat')); ?>:</b>
	<?php echo CHtml::encode($data->UsingFormat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDArticleTopic')); ?>:</b>
	<?php echo CHtml::encode($data->IDArticleTopic); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('IDSubject')); ?>:</b>
	<?php echo CHtml::encode($data->IDSubject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('articlecode')); ?>:</b>
	<?php echo CHtml::encode($data->articlecode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->Tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TanggalWaktu')); ?>:</b>
	<?php echo CHtml::encode($data->TanggalWaktu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TanggalUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->TanggalUpdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DayDigit')); ?>:</b>
	<?php echo CHtml::encode($data->DayDigit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDisplayWritter')); ?>:</b>
	<?php echo CHtml::encode($data->isDisplayWritter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Kontributor')); ?>:</b>
	<?php echo CHtml::encode($data->Kontributor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDisplayKontributor')); ?>:</b>
	<?php echo CHtml::encode($data->isDisplayKontributor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Editor')); ?>:</b>
	<?php echo CHtml::encode($data->Editor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDisplayEditor')); ?>:</b>
	<?php echo CHtml::encode($data->isDisplayEditor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isAprroved')); ?>:</b>
	<?php echo CHtml::encode($data->isAprroved); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PublishedDate')); ?>:</b>
	<?php echo CHtml::encode($data->PublishedDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PublishedDateTime')); ?>:</b>
	<?php echo CHtml::encode($data->PublishedDateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PublishedDateDayDigit')); ?>:</b>
	<?php echo CHtml::encode($data->PublishedDateDayDigit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SumberInformasi')); ?>:</b>
	<?php echo CHtml::encode($data->SumberInformasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->isDeleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isNotTopView')); ?>:</b>
	<?php echo CHtml::encode($data->isNotTopView); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isNotTopComment')); ?>:</b>
	<?php echo CHtml::encode($data->isNotTopComment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Point')); ?>:</b>
	<?php echo CHtml::encode($data->Point); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rating')); ?>:</b>
	<?php echo CHtml::encode($data->Rating); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Hit')); ?>:</b>
	<?php echo CHtml::encode($data->Hit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CommentHit')); ?>:</b>
	<?php echo CHtml::encode($data->CommentHit); ?>
	<br />

	*/ ?>

</div>