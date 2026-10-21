<?php

function setActive($path)
{
    return Request::is($path . '*') ? ' active' :  '';
}

function setOpen($path)
{
    return Request::is($path . '*') ? '  menu-open' :  '';
}

// ... sisanya (setNav dan TanggalID) biarkan seperti aslinya