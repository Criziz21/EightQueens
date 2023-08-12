<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\test;

class testController extends Controller
{
    public function store(Request $req) {
        $hello = new test();
        $hello->name = "hello";
        $hello->save();
        return ['name' => $hello->name];
    }
}
