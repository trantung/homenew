<script type="text/javascript">
    function controlInput(elRoot, elResult) {
        var input = $( elRoot );
        var id = input.attr('data-id');
        if (input.is( ":checked" )) {
            $('#weight-' + elResult + '-' + id).attr('disabled', false);
        } else {
            $('#weight-' + elResult + '-' + id).attr('disabled', true);
        }
    }
</script>