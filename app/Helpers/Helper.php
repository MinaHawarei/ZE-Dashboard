<?php

use App\Models\Admin\language;

function get_language(){
    
    //language::active()-> select('id','abbr','name','direction') ->get();
    App\Models\Admin\language::active()-> Select() ->get();
}
