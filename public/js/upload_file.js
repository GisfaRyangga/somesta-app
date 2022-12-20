function fileValidation() {
    var fileInput =
        document.getElementById('file');
     
    var filePath = fileInput.value;
 
    // Allowing file type
    var allowedExtensions = /(\.xlsx)$/i;
     
    if (!allowedExtensions.exec(filePath)) {
        alert('Mohon upload file .xlsx');
        fileInput.value = '';
        return false;
    }
}

$(document).ready(function () {
    $('.btn_upload').prop('disabled', true);
    $('.upload_excel').on('change', function () {
        var fileEmpty = $('.upload_excel').get(0).files.length === 0;
        if (!fileEmpty) {
            $('.btn_upload').prop('disabled', false);
        } else {
            $('.btn_upload').prop('disabled', true);
        }
    });
});