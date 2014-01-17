$(document).on('click', '.releasenav', function(event)
{
    loadDesc($(this), false);
    
    event.preventDefault();        
});

$(document).on('click', '.projnav', function(event)
{
    loadDesc($(this), true);
    
    event.preventDefault();        
});

function loadDesc(a, tab)
{
    var target = a.attr('href');
    var desc = $('#projdesc');
    
    var list = $('.projnav').parent();
    
    for(var i = 0; i < list.length; i++)
        list[i].setAttribute('class', '');
    
    if(tab)
        a.parent().attr('class', 'active');
    else
        list[1].setAttribute('class', 'active');
    
    var stateObj = { foo: "bar" };
    history.pushState(stateObj, null, target);
    
    desc.html('<img src="/front/img/ajax-loader.gif" />');
    
    desc.load(target + ' #projdescinner', function()
    {
        $('pre code').each(function(i, e) {hljs.highlightBlock(e)});
    });
}