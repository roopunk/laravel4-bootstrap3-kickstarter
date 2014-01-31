// JavaScript Document
var User = {
	'Delete' : function ($id){
		alertify.confirm("Are you sure you want to delete this user?", function (e, str) {
			// str is the input text
			if (e) {
				$('#form-delete-' + $id).submit();
			} else {
				// user clicked "cancel"
			}
		});
	}
}