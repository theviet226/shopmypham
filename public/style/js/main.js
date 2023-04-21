
$(document).ready(function($) {


	// ẩn thông báo
	$('.alert').delay(3000).slideUp();
	
	/**  * Check all  * @return {[type]} [description]  */ 
	$('.checkall').click(function() {     
			var checked = $(this).prop('checked');     
			$('.select').find('input:checkbox').prop('checked', checked);   
		}); 

});
/**
 * show img 
 *
 * @param      {<type>}  input       The input
 * @param      {<type>}  thumbimage  The thumbimage
 */
function  readURL(input,thumbimage) {
   if  (input.files && input.files[0]) { 
   var  reader = new FileReader();
    reader.onload = function (e) {
    $("#thumbimage").attr('src', e.target.result);
     }
     reader.readAsDataURL(input.files[0]);
    }
    else  { // Sử dụng cho IE
      $("#thumbimage").attr('src', input.value);
  
    }
    $("#thumbimage").show();
    $('.filename').text($("#uploadfile").val());
    $('.Choicefile').css('background', '#C4C4C4');
    $('.Choicefile').css('cursor', 'default');
    $(".removeimg").show();
    $(".Choicefile").unbind('click'); 
          
  }



// Confirm Delete
	// function confirmDelete(msg){

	// 	if(window.confirm(msg)){
	// 		return true;
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }