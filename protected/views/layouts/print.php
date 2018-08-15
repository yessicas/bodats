<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/iconcareerln.png" type="image/x-icon" /> 

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reportpdf.css" />
    
	<!-- Base HREF -->
	<base href="http://localhost/careerpath/index.php">
	<title><?php CHtml::encode($this->pageTitle); ?></title>

	<style type="text/css">
	img {
	max-width: 100%;
	width: auto\9;
	height: auto;
	vertical-align: middle;
	border: 0;
	-ms-interpolation-mode: bicubic;
	}
	</style>


</head>

<body>
<?php echo $content; ?>
</body>

