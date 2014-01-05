$(document).ready(function()
{
    $('#selector').change(function()
    {
        if ($(this).val() == 'custom')
        {         
            $('#last').after(
                '<div class="form-group" id="contentarea">' +
                '<label for="content" class="col-sm-2 control-label">Content</label>' +
                '<div class="col-sm-10"><textarea name="content" id="post-content"></textarea></div>' +
                '</div>'
            );
            
            CKEDITOR.replace('post-content');
        }
        else
        {
            $('#contentarea').remove();
        }
    });
});