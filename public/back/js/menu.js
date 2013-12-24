$(document).ready(function()
{
    $('#table_menu tbody.sortable tr').hover(function() {
        $(this).css('cursor','move');
    });
    
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
        
        var tr = $('<tr>').hover(function() {
            $(this).css('cursor','move');
        });;
        
        tr.append('<td><input type="text" name="item[' + idx + '][title]" class="form-control" /></td>');
        tr.append('<td><input type="text" name="item[' + idx + '][icon]" class="form-control" /></td>');
        tr.append('<td><input type="text" name="item[' + idx + '][link]" class="form-control" /></td>');
        tr.append(td);
        tr.append('</tr>');
        
        $('#table_menu > tbody.sortable').append(tr);
    });
    
    $('.push_up').click(function()
    {
        
    });
    
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width());
        });
        return $helper;
    },
    updateIndex = function(e, ui) {
        $('tr', ui.item.parent()).each(function (i) {
            $('tr td input').each(function(idx, e)
            {
                e = e.name.replace(/\[\d\]/, "[" + i + "]") 
            });
        });
    };
    
    $("#table_menu tbody.sortable").sortable({
        helper: fixHelperModified,
        stop: updateIndex
    }).disableSelection();
});