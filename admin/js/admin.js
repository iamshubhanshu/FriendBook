$(document).ready(function() {
    $('#user').click(function() {
        $('.manageuser').show();
        $('.manageadmin').hide();
    });

    $('#admin').click(function() {
        $('.manageuser').hide();
        $('.manageadmin').show();
    });
});