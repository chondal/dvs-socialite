<?php

namespace Chondal\DvsSocialite;

use Illuminate\Support\HtmlString;

class DvsSocialite
{

    public function loadLinks()
    {
        return view('DvsSocialite::links');
    }

    public function css()
    {
        return new HtmlString(view('DvsSocialite::css'));
    }

}
