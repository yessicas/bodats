$(document).ready(function() {
 	$("input:submit").click(function(){
    var fileName = $("input:file").val();
	var limitsize= 1024 * 1024 * 1; // 1 mb
	var limitsizeinmb= limitsize / (1024 * 1024);
	
	if(fileName=='')
	{
        alert("File Don't Empty");
		return false;
	}
	
	if (!fileName.match(/(?:jpg|JPG|jpeg|JPEG)$/)) {
    	// inputted file path is not an image of one of the above types
		alert("File Type Must .jpg");
		
		return false;
	}
	
	if ($("input:file")[0].files[0].size > limitsize) {
		alert("File too large, Max Size "+limitsizeinmb+" MB");
		return false;
	}
	
	else {
		return true;
	}
				
	});

});
