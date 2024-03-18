$(document).ready(function(){
    $('#searchInput').on('keyup', function(){
        var value = $(this).val().toLowerCase();
        $('#productTable tbody tr').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });