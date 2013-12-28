<?php

class PageController extends FrontController
{
    function show($link)
    {
        $p = Page::where('link', '=', $link)->first();
        
        if(!$p)
            return Redirect::to('/')->withErrors(array('errors' => 'No page found!'));
            
        $this->layout->content = View::make('front.page.show', array('page' => $p));
    }
}
