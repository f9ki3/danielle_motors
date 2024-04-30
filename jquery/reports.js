$(document).ready(function(){
    // Move this line inside $(document).ready()
    $('#type').change(function(){
        var type = $(this).val();

        if (type == 'Monthly') {
            $('#monthly_div').show();
            $('#yearly_div').hide();
            $('#daily_div').hide();
        } else if (type == 'Yearly') {
            $('#yearly_div').show();
            $('#monthly_div').hide();
            $('#daily_div').hide();
        } else {
            $('#daily_div').show();
            $('#monthly_div').hide();
            $('#yearly_div').hide();
        }
    });
});

