<?php
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function dda($model)
{
    if (method_exists($model, 'toArray')) {
        dd($model->toArray());
    } else {
        dd($model);
    }
}
