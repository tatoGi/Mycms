<?php

namespace App\Http\Controllers\Admin;
use App\Model\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
   public function index($sec){
    return view('admin.company.index', compact(['company']));
   }
}
