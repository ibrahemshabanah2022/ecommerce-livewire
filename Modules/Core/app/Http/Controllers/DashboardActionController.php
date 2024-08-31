<?php

namespace Modules\Core\app\Http\Controllers;

use Illuminate\Http\Request;

class DashboardActionController extends Controller
{
    public function displayAllProducts(){

        return view('AllProducts');
    }
// public function addCategory(){

//     return view('addcategory');
// }
// public function displayAllCategories(){

//     return view('displayAllCategories');
// }

// public function addProduct(){

//     return view('addproduct');
// }

// public function displayAllUsers(){

//     return view('displayAllUsers');
// }
// public function displayAllOrders(){

//     return view('displayAllOrders');
// }

}
