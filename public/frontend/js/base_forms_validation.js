/*
 *  Document   : base_forms_validation.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Validation Page
 */
//Them kiem tra file tai len
$.validator.addMethod( "file", function( value, element, param ) {
    param = typeof param === "string" ? param.replace( /,/g, "|" ) : "png|jpeg|jpg|gif|doc|docx|pdf|xls|rar";
    return this.optional( element ) || value.match( new RegExp( "\\.(" + param + ")$", "i" ) );
}, $.validator.format( "File tải lên là ảnh, docx, pdf, xls, rar" ) );

jQuery.validator.addMethod("maxSize", function(value, element, param){
    var file = $(element)[0].files[0];
    console.log(value);
    if(typeof file !== 'undefined' && file.size > param) {
        return false;
    }

    return true;
}, "Không quá 25MB");


//Thêm kiểm tra email
jQuery.validator.addMethod("email", function(value, element){
    var $reg = /^[a-zA-Z0-9][a-zA-Z0-9\._]{0,62}[a-zA-Z0-9]@[a-z0-9\-]{2,}(\.[a-z]{2,4}){1,2}$/;
    return this.optional(element) || $reg.test(value);
}, "Địa chỉ email không hợp lệ");

//Thêm kiểm tra links face / youtube
jQuery.validator.addMethod("links", function(value, element){
    var $reg = /^facebook.com\/\S{3,}|https:\/\/www.facebook.com\/\S{3,}|youtube.com\/\S{3,}|https:\/\/www.youtube.com\/\S{3,}/;
    return this.optional(element) || $reg.test(value);
}, "Link facebook hoặc youtube phải hợp lệ");
//Thêm kiểm tra phone
jQuery.validator.addMethod("phones", function(value, element){
    var $reg = /^01[0-9]{2}[0-9]{7}|0[0-9]{2}[0-9]{7}|0[0-9]{9}$/;
    return this.optional(element) || $reg.test(value);
}, "Số điện thoại không hợp lệ");


var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationBootstrap = function() {

    jQuery('body').find('.js-validation-bootstrap').each(function (index) {
//console.log(jQuery(this));
        jQuery(this).validate({
            ignore: [],
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.btn-group').append(error);
            },
            highlight: function(e) {
                var elem = jQuery(e);

                elem.closest('.btn-group').removeClass('has-error').addClass('has-error');
                elem.closest('.help-block').remove();
            },
            success: function(e) {
                var elem = jQuery(e);

                elem.closest('.btn-group').removeClass('has-error');
                elem.closest('.help-block').remove();
            },
            rules: {
                'teacher_id': {
                    required: true
                },
                'subject_id': {
                    required: true
                },
                'course_id': {
                    required: true
                }
            },
            messages: {
                'teacher_id': {
                    required: 'Không được trống'

                },
                'subject_id': {
                    required: 'Không được trống'

                },
                'course_id': {
                    required: 'Không được trống'
                }
            }
        });
    });



    };

    // Init Material Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationMaterial = function(){
        jQuery('.js-validation-material').validate({
            ignore: [],
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                var elem = jQuery(e);

                elem.closest('.form-group').removeClass('has-error').addClass('has-error');
                elem.closest('.help-block').remove();
            },
            success: function(e) {
                var elem = jQuery(e);

                elem.closest('.form-group').removeClass('has-error');
                elem.closest('.help-block').remove();
            },
            rules: {
                'val-username2': {
                    required: true,
                    minlength: 3
                },
                'val-email2': {
                    required: true,
                    email: true
                },
                'val-password2': {
                    required: true,
                    minlength: 5
                },
                'val-confirm-password2': {
                    required: true,
                    equalTo: '#val-password2'
                },
                'val-select22': {
                    required: true
                },
                'val-select2-multiple2': {
                    required: true,
                    minlength: 2
                },
                'val-suggestions2': {
                    required: true,
                    minlength: 5
                },
                'val-skill2': {
                    required: true
                },
                'val-currency2': {
                    required: true,
                    currency: ['$', true]
                },
                'val-website2': {
                    required: true,
                    url: true
                },
                'val-phoneus2': {
                    required: true,
                    phoneUS: true
                },
                'val-digits2': {
                    required: true,
                    digits: true
                },
                'val-number2': {
                    required: true,
                    number: true
                },
                'val-range2': {
                    required: true,
                    range: [1, 5]
                },
                'val-terms2': {
                    required: true
                }
            },
            messages: {
                'val-username2': {
                    required: 'Please enter a username',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'val-email2': 'Please enter a valid email address',
                'val-password2': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long'
                },
                'val-confirm-password2': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'val-select22': 'Please select a value!',
                'val-select2-multiple2': 'Please select at least 2 values!',
                'val-suggestions2': 'What can we do to become better?',
                'val-skill2': 'Please select a skill!',
                'val-currency2': 'Please enter a price!',
                'val-website2': 'Please enter your website!',
                'val-phoneus2': 'Please enter a US phone!',
                'val-digits2': 'Please enter only digits!',
                'val-number2': 'Please enter a number!',
                'val-range2': 'Please enter a number between 1 and 5!',
                'val-terms2': 'You must agree to the service terms!'
            }
        });
    };

    return {
        init: function () {
            // Init Bootstrap Forms Validation
            initValidationBootstrap();
            console.log(123);

            // Init Material Forms Validation
            //initValidationMaterial();

            // Init Validation on Select2 change
            jQuery('.js-select2').on('change', function(){
                jQuery(this).valid();
            });
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BaseFormValidation.init(); });
