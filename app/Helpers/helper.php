<?php

use Illuminate\Support\Facades\Request; // ← tambah ini

function setActive($path)
{
    return Request::is($path . '*') ? ' active' : '';
}

function setOpen($path)
{
    return Request::is($path . '*') ? ' menu-open' : '';
}

// ... fungsi lainnya tetap sama