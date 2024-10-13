<?php

use Illuminate\Http\Request;

class Action
{
    public function __invoke(Request $request)
    {
        dd($request->input());
    }
}