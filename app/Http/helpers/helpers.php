<?php

use Illuminate\Support\Facades\Request;

function openAsideMenuElement($segment)
{
    return  Request::segment(1) == $segment ? " kt-menu__item--open" : "";
}
