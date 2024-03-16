$(document).ready(function(){
    $('#searchInput').on('input', function() {
        var searchText = $(this).val().toLowerCase();
        $('#productTable tbody tr').filter(function() {
            $(this).toggle($(this).find('td:eq(1)').text().toLowerCase().indexOf(searchText) > -1);
        });
    });
});