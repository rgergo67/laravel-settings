$(function(){
    $('#type').on('change', _typeChangeEvent).trigger('change');
    $('#settings-form').on('submit', _formSubmitEvent);
    $('#description').summernote({
        tabsize: 2,
        height: 150
    });
});

/**
 * { function_description }
 */
function _typeChangeEvent(){
    if($(this).val() == "textarea"){
        $('.value-input').hide();
        $('.value-input.' + $(this).val()).show();
        $('.value-input.textarea textarea').summernote({
            tabsize: 2,
            height: 200
        });
    }else{
        $('.value-input.textarea textarea').summernote('destroy');
        $('.value-input').hide();
        $('.value-input.' + $(this).val()).show();
    }
}

function _formSubmitEvent(){
    $('.value-input').not('.' + $('#type').val()).remove();
}