$(document).ready(function(){
    $('#quantity').keyup(function(){
        var quantity = $('#quantity').val();
        var price = $('#price').val();
        price = price.replace(/,/g, '');
        var discount_type = $('#discount_type').val();
        var discount_value = $('#discount_value').val();
        discount_value = discount_value.replace(/,/g, '');
        var total = 0;
        if(discount_type == 'Percentage'){
            total = (price * quantity) - ((price * quantity) * discount_value / 100);
        }else{
            total = (price * quantity) - discount_value;
        }
        total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        $('#total').val(total);
    });
    $('#discount_type').change(function(){
        var quantity = $('#quantity').val();
        var price = $('#price').val();
        price = price.replace(/,/g, '');
        var discount_type = $('#discount_type').val();
        var discount_value = $('#discount_value').val();
        discount_value = discount_value.replace(/,/g, '');
        var total = 0;
        if(discount_type == 'Percentage'){
            total = (price * quantity) - ((price * quantity) * discount_value / 100);
        }else{
            total = (price * quantity) - discount_value;
        }
        total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        $('#total').val(total);
    });
    $('#discount_value').keyup(function(){
        var quantity = $('#quantity').val();
        var price = $('#price').val();
        price = price.replace(/,/g, '');
        var discount_type = $('#discount_type').val();
        var discount_value = $('#discount_value').val();
        discount_value = discount_value.replace(/,/g, '');
        var total = 0;
        if(discount_type == 'Percentage'){
            total = (price * quantity) - ((price * quantity) * discount_value / 100);
        }else{
            total = (price * quantity) - discount_value;
        }
        total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        $('#total').val(total);
    });
});
