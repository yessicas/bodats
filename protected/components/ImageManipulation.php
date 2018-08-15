<?php
class ImageManipulation{
	function imageCompressionSameSize($imgfile="",$thumbsize=0,$savePath=NULL, $compressRatio=100) {
		if($savePath==NULL) {
			header('Content-type: image/jpeg');
			/* To display the image in browser
			*/
		}
		list($width,$height)=getimagesize($imgfile);
		/* The width and the height of the image also the getimagesize retrieve other information as well   */
		$imgratio=$width/$height; 
	   
		if($imgratio>1) {
			$newwidth=$height;
			$newheight=$height;
		} else {
			$newheight=$width;
			$newwidth=$width;       
		}
		
		/* Crop inti Same Size */  
		$thumb=imagecreatetruecolor($newwidth,$newheight); // Making a new true color image
		$source=imagecreatefromjpeg($imgfile); // Now it will create a new image from the source
		imagecopyresampled($thumb,$source,0,0,0,0,$newwidth,$newheight,$newwidth,$newheight);  // Copy and resize the image
		//imagejpeg($thumb,$savePath,100); //100 --> Compression Ration Quality
		
		/*Compress Into Desired Size*/
		$thumb2=imagecreatetruecolor($thumbsize,$thumbsize); // Making a new true color image
		imagecopyresampled($thumb2,$thumb,0,0,0,0,$thumbsize,$thumbsize,$newwidth,$newheight);  // Copy and resize the image
		imagejpeg($thumb2,$savePath,$compressRatio); //100 --> Compression Ration Quality

		imagedestroy($thumb);
		imagedestroy($thumb2);
	}
	
	function imageCompression2x3Force($imgfile="",$thumbsize=0,$savePath=NULL, $compressRatio=100) {
		if($savePath==NULL) {
			header('Content-type: image/jpeg');
		}
		list($width,$height)=getimagesize($imgfile);
		$imgratio=$width/$height; 
				   
		if($imgratio>=1) {
			/*LANDSCAPE*/
			//echo "landscape";
			if($imgratio >= 3){
				//Crop
				$this->imageCompressionCrop($imgfile,$thumbsize,$savePath, $compressRatio, 3, 2);
			}
			else{
				$this->imageCompression($imgfile,$thumbsize,$savePath, $compressRatio);
			}
		} else {
			/*PORTRAIT*/
			//echo "portrait";
			if($imgratio >= 0.5){
				$this->imageCompression($imgfile,$thumbsize,$savePath, $compressRatio);
			}
			else{
				//Crop
				$this->imageCompressionCrop($imgfile,$thumbsize,$savePath, $compressRatio, 3, 2);
			}       
		}
	}
	
	function imageCompressionCrop($imgfile="",$thumbsize=0,$savePath=NULL, $compressRatio=100, $w=3, $h=2) {
		//echo 'Lets crop';
		if($savePath==NULL) {
			header('Content-type: image/jpeg');
			/* To display the image in browser
			*/
		}
		list($width,$height)=getimagesize($imgfile);
		/* The width and the height of the image also the getimagesize retrieve other information as well   */
		$imgratio=$width/$height; 
	   
		if($imgratio>1) {
			/*Landscape*/
			$nw = $width;
			$nh = floor((1/3)*$width);
			
			$newwidth=$thumbsize;
			$newheight=floor((1/3)*$thumbsize);
		} else {
			/*Portrait*/
			$nw = $width;
			$nh = (2/1)*$width;
			
			$newwidth=$thumbsize;
			$newheight=(2/1)*$thumbsize;       
		}
		
		//echo $nw."==".$nh."<br>";
		//echo $newwidth."==".$newheight."<br>";
		
		/* Crop inti Some Scale */  
		$thumb=imagecreatetruecolor($nw,$nh); // Making a new true color image
		$source=imagecreatefromjpeg($imgfile); // Now it will create a new image from the source
		imagecopyresampled($thumb,$source,0,0,0,0,$nw,$nh,$nw,$nh);  // Copy and resize the image
		//imagejpeg($thumb,$savePath,100); //100 --> Compression Ration Quality
		
		/*Compress Into Desired Size*/
		$thumb2=imagecreatetruecolor($newwidth,$newheight); // Making a new true color image
		imagecopyresampled($thumb2,$thumb,0,0,0,0,$newwidth,$newheight,$nw,$nh);  // Copy and resize the image
		imagejpeg($thumb2,$savePath,$compressRatio); //100 --> Compression Ration Quality

		imagedestroy($thumb);
		imagedestroy($thumb2);
	}
	
	function imageCompressionForcedMaintainRatio($imgfile="",$thumbsize=0,$savePath=NULL, $w, $h, $compressRatio=100) {
		if($savePath==NULL) {
			header('Content-type: image/jpeg');
			/* To display the image in browser
			*/
		}
		list($width,$height)=getimagesize($imgfile);
		/* The width and the height of the image also the getimagesize retrieve other information as well   */
		$imgratio=$width/$height; 
		$targetratio = $w/$h;
		$targetratio2 = $h/$w;
		//echo $targetratio." ".$imgratio;
	   
		if($imgratio>$targetratio) {
			/* Terlalu panjang */
			$newheight=$height;
			$newwidth=$targetratio*$newheight;  
			
		} else {
			$newwidth=$width;
			$newheight=(1/$targetratio)*$newwidth;
		}
		
		//echo $newwidth." ".$newheight;
		
		/* 
		1. Dicrop dengan ukuran rasio sesuai dengan yang diinginkan
		*/ 
		$thumb=imagecreatetruecolor($newwidth,$newheight); // Making a new true color image
		$source=imagecreatefromjpeg($imgfile); // Now it will create a new image from the source
		imagecopyresampled($thumb,$source,0,0,0,0,$newwidth,$newheight, $newwidth,$newheight);  // Copy and resize the image
		//imagejpeg($thumb,$savePath,100); //100 --> Compression Ration Quality
		
		/*
		2. Perbesar sesuai ukurang target
		*/
		$thumb2=imagecreatetruecolor($w,$h); // Making a new true color image
		imagecopyresampled($thumb2,$thumb,0,0,0,0,$w,$h,$newwidth,$newheight);  // Copy and resize the image
		imagejpeg($thumb2,$savePath,$compressRatio); //100 --> Compression Ration Quality
		
		imagedestroy($thumb);
		imagedestroy($thumb2);
	}
	
	function imageCompressionForced($imgfile="",$thumbsize=0,$savePath=NULL, $w, $h, $compressRatio=100) {
		if($savePath==NULL) {
			header('Content-type: image/jpeg');
			/* To display the image in browser
			*/
		}
		list($width,$height)=getimagesize($imgfile);
		/* The width and the height of the image also the getimagesize retrieve other information as well   */
		$newwidth=$w;
		$newheight=$h;
		echo $width." ".$height;
		
		/* Make Into Certain Size 
		Ukuran sama tetapi rasionya jadi berubah ( jadi kurang wajar)
		*/ 
		$thumb=imagecreatetruecolor($newwidth,$newheight); // Making a new true color image
		$source=imagecreatefromjpeg($imgfile); // Now it will create a new image from the source
		imagecopyresampled($thumb,$source,0,0,0,0,$newwidth,$newheight, $width,$height);  // Copy and resize the image
		imagejpeg($thumb,$savePath,$compressRatio); //100 --> Compression Ration Quality
		
		/*Compress Into Desired Size*/
		/*
		$thumb2=imagecreatetruecolor($newwidth,$newheight); // Making a new true color image
		imagecopyresampled($thumb2,$thumb,0,0,0,0,$newheight,$newheight,$newwidth,$newheight);  // Copy and resize the image
		imagejpeg($thumb2,$savePath,$compressRatio); //100 --> Compression Ration Quality
		*/
		
		imagedestroy($thumb);
		//imagedestroy($thumb2);
	}
	
	function imageCompression($imgfile="",$thumbsize=0,$savePath=NULL, $compressRatio=100) {
		//echo 'Lets Compression Only';
		if($savePath==NULL) {
			header('Content-type: image/jpeg');
		}
		list($width,$height)=getimagesize($imgfile);
		/* The width and the height of the image also the getimagesize retrieve other information as well   */
		$imgratio=$width/$height; 
	   
		//if($imgratio>1) {
			$newwidth=$thumbsize;
			$newheight=$thumbsize/$imgratio;
		//} else {
		//	$newheight=$thumbsize;       
		//	$newwidth=$thumbsize*$imgratio;
		//}
		   
		$thumb=imagecreatetruecolor($newwidth,$newheight); // Making a new true color image
		$source=imagecreatefromjpeg($imgfile); // Now it will create a new image from the source
		imagecopyresampled($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);  // Copy and resize the image
		imagejpeg($thumb,$savePath,$compressRatio); //100 --> Compression Ration Quality

		imagedestroy($thumb);
	}

	function imageCompressionSameSize2($imgfile="",$thumbsize=0,$savePath=NULL) {
		if($savePath==NULL) {
			header('Content-type: image/jpeg');
			/* To display the image in browser
		   
			*/
		   
		}
		list($width,$height)=getimagesize($imgfile);
		/* The width and the height of the image also the getimagesize retrieve other information as well   */
		//echo $width;
		//echo $height;
		$imgratio=$width/$height; 
		/*
		To compress the image we will calculate the ration 
		For eg. if the image width=700 and the height = 921 then the ration is 0.77...
		if means the image must be compression from its height and the width is based on its height
		so the newheight = thumbsize and the newwidth is thumbsize*0.77...
		*/
	   
		if($imgratio>1) {
			$newwidth=$thumbsize;
			$newheight=$thumbsize/$imgratio;
		} else {
			$newheight=$thumbsize;       
			$newwidth=$thumbsize*$imgratio;
		}
		
		/*	   
		$thumb=imagecreatetruecolor($newwidth,$newheight); // Making a new true color image
		$source=imagecreatefromjpeg($imgfile); // Now it will create a new image from the source
		imagecopyresampled($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);  // Copy and resize the image
		imagejpeg($thumb,$savePath,100); //100 --> Compression Ration Quality
		*/
		$thumb=imagecreatetruecolor(50,100); // Making a new true color image
		$source=imagecreatefromjpeg($imgfile); // Now it will create a new image from the source
		imagecopyresampled($thumb,$source,0,0,0,0,50,100,50,100);  // Copy and resize the image
		imagejpeg($thumb,$savePath,100); //100 --> Compression Ration Quality
		/*
		Out put of image 
		if the $savePath is null then it will display the image in the browser
		*/
		imagedestroy($thumb);
		/*
			Destroy the image
		*/
	}
}
?>