$(document).ready(function(){
    $('div.alert').not('.alert-important').delay(4000).slideUp(400);

    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });

    $('body').on('shown.bs.modal', '.modal', function (e) {

        $('#tag_list').select2({placeholder:'please, choose some keywords'});

        var targetUrl;

        if($(e.relatedTarget).attr('data-url')){
            targetUrl = $(e.relatedTarget).attr('data-url');
            console.log(targetUrl);
        }
        else{
            targetUrl  = 0;
        }

        console.log(targetUrl);

        $('#Form').submit(function(e){
            postAjaxForm(e, $(this),  targetUrl);
        });
    });



    function postAjaxForm(e, element, targetUrl) {
        e.preventDefault();
        $('.error-message').hide();
        var $form = element;
        $form.find('.form-group').removeClass('has-errors').find('.help-text').text('');
        var url = $form.attr('action');

        var formData = {};
        $form.find('input').each(function () {
            formData[$(this).attr('name')] = $(this).val();
        });
        $form.find('select').each(function () {
            formData[$(this).attr('name')] = $(this).val();
        });
        $form.find('textarea').each(function () {
            formData[$(this).attr('name')] = $(this).val();
        });

        $.ajax({
            method: 'POST',
            url: url,
            data: formData,
            success: function (data) {
                console.log(data);
                if ($.isArray(data)) {
                    if(targetUrl){
                        console.log("test");
                        window.location.replace(targetUrl)
                    }
                    else{
                        console.log("0");
                        window.location.replace(data[0])
                    }
                }
                else {
                    $('.error-message').slideDown('fast');
                }
            },
            error: function (data) {
                if (data['responseJSON']) {
                    associate_errors(data['responseJSON'], $form);
                }
            }
        });
    }

    function associate_errors(errors, $form) {
        //remove existing error classes and error messages from form groups

        $.each(errors, function (index, errorArray) {
            //find each form group, which is given a unique id based on the form field's name
            var $group = $form.find('#' + index + '-group');

            $.each(errorArray, function (index, value) {
                $group.addClass('has-errors').find('.help-text').text(value);
            })

        });
    }

});



