CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
    config.height = 600;
    config.uiColor = '#AADC6E';
    config.allowedContent = true;
    config.extraAllowedContent = 'button(*)';
    config.filebrowserBrowseUrl      = '/public/form_fields/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = '/public/form_fields/ckfinder/ckfinder.html?Type=Images';
    config.filebrowserUploadUrl      = '/public/form_fields/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '/public/form_fields/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
};
