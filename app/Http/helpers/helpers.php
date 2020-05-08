<?php

use Illuminate\Support\Facades\Request;

function openAsideMenuElement($menuElement , $active = null)
{
    $class =  $active == null  ?  "menu-open":"active" ;

    return  Request::segment(1) == $menuElement ? $class : "";
}


function activeAsideMenuSubElement($menuElement , $menuSubElement = 'lister')
{

    if($menuSubElement=='lister'){

        return   (Request::segment(2) == null AND   Request::segment(1) == $menuElement) ? "active" : "";
    }


    return ((Request::segment(2) == $menuSubElement) AND Request::segment(1) == $menuElement ) ? "active" : "";
}