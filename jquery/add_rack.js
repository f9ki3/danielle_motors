$(document).ready(function(){
    $("#add_rack").click(function(){
        var $rack_id = $("#rack_id").val();
        var $rack_description = $("#rack_description").val();
        
        $.ajax({
            type: "POST",
            url: "../php/add_rack.php",
            data: {
                rack_id: $rack_id,
                rack_description: $rack_description
            },
            success: function(respond){
                alert(respond)
    
            }
        });
    
    
    });
});