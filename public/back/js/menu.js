$(document).ready(function()
{
    $('.delete_row').click(function()
    {
        $(this).parent().parent().remove();
    });
    
    $('#add_row').click(function()
    {
        var idx = $('#table_menu tr').length;
        
        idx -= 2;
        
        var td = $('<td>');
        
        var a = $('<a class="btn btn-danger" id="delete_row">Delete</a>').click(function()
        {
            $(this).parent().parent().remove();
        });
        
        td.append(a);
        td.append('</td>');
        
        var tr = $('<tr>');
        
        tr.append('<td><input type="text" name="item[' + idx + '][title]" class="form-control" /></td>');
        tr.append('<td><input type="text" name="item[' + idx + '][icon]" class="form-control" /></td>');
        tr.append('<td><input type="text" name="item[' + idx + '][link]" class="form-control" /></td>');
        tr.append(td);
        tr.append('</tr>');
        
        console.log(tr);
        
        $('#last_row').before(tr);
    });
});