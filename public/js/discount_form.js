$(document).ready(function(){
    $('#discount_type').change(function(){
        var discount_type = $('#discount_type').val();
        if(discount_type == 'Percentage'){
            $('#form-group-discount_value').show();
            $('#discount_value').val('');
            $('#discount_value').attr('placeholder', 'Persentase Diskon');
            $('#discount_value').attr('max', 100);
        }else if(discount_type == 'Cash'){
            $('#form-group-discount_value').show();
            $('#discount_value').val('');
            $('#discount_value').attr('placeholder', 'Cash Diskon');
            $('#discount_value').removeAttr('max');
        }else{
            $('#discount_value').val('');
            $('#discount_value').removeAttr('max');
            $('#form-group-discount_value').hide();
        }
    });

    $('#discount_type').change();
});
