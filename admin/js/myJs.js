$(document).ready(function(){

	//Check Box
	$('#selectAllBoxes').click(function(){

		if (this.checked) {
			$('.checkbox').each(function(){

				this.checked = true;
			});
		}else{
			$('.checkbox').each(function(){

				this.checked = false;
			});
		}

	});
	//End Check

	//tags
	$('#tags').val("");

	// $('#tags').tagsinput();
 //    $('form').ajaxForm(function(){
	// 	$('#tags').val("");
 //    }); 
	//tags

});