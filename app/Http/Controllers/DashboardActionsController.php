<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardActionsController extends Controller
{
public function addCategory(){

    return view('addcategory');
}
public function displayAllCategories(){

    return view('displayAllCategories');
}

public function addProduct(){

    return view('addproduct');
}
public function displayAllProducts(){

    return view('displayAllProducts');
}
public function displayAllUsers(){

    return view('displayAllUsers');
}

}
