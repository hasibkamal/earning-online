/***********************
 DATEPICKER START HERE
 **********************/
$('.date-picker').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true
});

/*************************************
 DATEPICKER TOP POSITION CHANGE HERE
 ***********************************/
let originalCoordinate = 0;
$('.date-picker,#dob,#vehicle-model-year,#vehicle-manufacturing-year').click(function(e){
  if(originalCoordinate != $('.datepicker').position().top)
  {
    $('.datepicker').css({'top':$('.datepicker').position().top+55});
    originalCoordinate = $('.datepicker').position().top;
  }

});

/**********************************************
 CATEGORY WISE SUBCATEGORIES ONCHANGE SELECT
 **********************************************/
$(".categoryId").change(function () {
    let route = "/admin/product/subcategories-by-category";
    subcategoriesByCategory(this,route);
});


/******************************
 Image preview
 *****************************/

 $('.imageChange').on('change',function(){
     let parentHtml = $(this).parent().parent();
     let  viewImageId  = parentHtml.find('.viewImage');
     let  errorImageId = parentHtml.find('.errorImage');
     errorImageId .html('');
     if (this.files && this.files[0])
     {
      let mime_type = this.files[0].type;
      if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
          this.value = null;
          errorImageId .html("Invalid file format Only jpg jpeg png is allowed");
          return false;
      }
      let size = this.files[0].size;
      if(size > 3000000){
        this.value = null;
        errorImageId .html("Please upload image must less than 1MB!!");
        return false;
      }
      let reader = new FileReader();
      reader.onload = function (e) {
          viewImageId.attr('src', e.target.result);
      };
      reader.readAsDataURL(this.files[0]);
    }
 });

/**************************
 PHOTO PREVIEW SCRIPT HERE
 **************************/
function changeFile(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('.profileViewer').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function changeSSCDocument(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('.sscDocumentViewer').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function changeHSCDocument(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('.hsc-document').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function changeBachelorDocument(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('.bachelor-document').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function changeMasterDocument(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('.master-document').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function changePhoto(input) {
    if (input.files && input.files[0]) {
        $("#photo_err").html('');
        let mime_type = input.files[0].type;
        if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png' || 'application/pdf')) {
            $("#photo_err").html("Image format is not valid. Only PNG or JPEG or JPG or PDF file are allowed.");
            return false;
        }
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#photoViewer').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}



/*****************************
 EDIT MODAL EFFECT START HERE
 *****************************/
$(document.body).on('click','.AppModal',function(e){
    e.preventDefault();
    $('#ModalContent').html('<div style="text-align:center;"><h3 class="text-primary">Loading Form...</h3></div>');
    $('#ModalContent').load(
        $(this).attr('href'),
        function (response, status, xhr) {
            if (status === 'error') {
                alert('error');
                $('#ModalContent').html('<p>Sorry, but there was an error:' + xhr.status + ' ' + xhr.statusText + '</p>');
            }
            return this;
        }
    );
});

/*****************************
 FORM VALIDATION START HERE
 *****************************/
$('#dataForm').validate({
    errorPlacement: function () {
        return false;
    }
});

/**********************
 DATEPICKER START HERE
 **********************/
$('#birthDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    endDate: new Date(Date.now() - 86400000)
});

/**********************
 YEAR START HERE
 **********************/
$('.year').datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years",
    autoclose: true,
    yearRange: '1900:' + new Date().getFullYear()
});

/**********************
 SELECT START HERE
 **********************/
$('.select2').select2({
    width: "100%"
});
