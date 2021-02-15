<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

use Redirect;

class CompaniesController extends Controller
{
    public function index(){
        $companies = Company::get();
        return view('companies.list', ['companies'=> $companies]);
    }

    public function new(){
        return view('companies.form');
    }

    public function add( Request $request ){

        $request->validate([
            'name' => 'required',
            'state' => 'required',
            'cnpj' => 'required|digits:14',
        ]);

        $companies = new Company;
        $companies = $companies->create( $request->all() );
        return Redirect::to('/companies');
    }

    public function edit( $id ){
        $companies = Company::findOrFail( $id );
        return view('companies.form', ['companies' => $companies]);
    }

    public function update( $id, Request $request ){
        $companies = Company::findOrFail( $id );
        $companies->update( $request->all() );
        return Redirect::to('/companies');
    }

    public function delete( $id ){
        $companies = Company::findOrFail( $id );
        $companies->delete();
        return Redirect::to('/companies');
    }
}
