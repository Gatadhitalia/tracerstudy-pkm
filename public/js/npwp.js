$(document).ready(function() {
    $('#npwp').on('keyup', function() {
        var npwp = $(this).val();
        npwp = npwp.replace(/[^0-9]/g, '');
        var npwpLength = npwp.length;
        if (npwpLength > 2) {
            npwp = npwp.substring(0, 3) + '.' + npwp.substring(3);
        }
        if (npwpLength > 5) {
            npwp = npwp.substring(0, 7) + '.' + npwp.substring(7);
        }
        if (npwpLength > 8) {
            npwp = npwp.substring(0, 10) + '.' + npwp.substring(10);
        }
        if (npwpLength > 12) {
            npwp = npwp.substring(0, 13) + '-' + npwp.substring(13);
        }
        if (npwpLength > 16) {
            npwp = npwp.substring(0, 17) + '.' + npwp.substring(17);
        }
        if (npwpLength > 19) {
            npwp = npwp.substring(0, 21);
        }
        $(this).val(npwp)
    });
});
