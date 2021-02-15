<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Company;

use Redirect;


class CustomersController extends Controller
{
    public function index(){
        $customers = Customer::get();
        $companies = Company::get();
        return view('customers.list', ['companies' => $companies], ['customers' => $customers] );
    }

    public function new(){
        $companies = Company::orderBy('id', 'desc')->get();
        return view('customers.form', ['companies' => $companies]);
    }

    public function add( Request $request ){

        $request->validate([
            'name' => 'required',
            'document' => 'required|string|min:11|max:14',
            'birth_date' => 'required',
            'phone' => 'required|digits:8',
            'cel_phone' => 'required|digits:9',
            'email' => 'required',
        ]);

        $customers = new Customer;
        $customers = $customers->create( $request->all() );
        
        return Redirect::to('/customers');
    }

    public function edit( $id ){
        
        $companies = Company::orderBy('id', 'desc')->get();
        $customers = Customer::findOrFail( $id );
        return view('customers.form', ['companies' => $companies], ['customers' => $customers] );
    }

    public function update( $id, Request $request ){
        $customers = Customer::findOrFail( $id );
        $customers->update( $request->all() );
        return Redirect::to('/customers');
    }

    public function delete( $id ){
        $customers = Customer::findOrFail( $id );
        $customers->delete();
        return Redirect::to('/customers');
    }
}