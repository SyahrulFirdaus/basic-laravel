<?php

namespace App\Http\Controllers;

use App\Models\Mcoa;
use App\Models\Mkategori;
use App\Models\Mreport;
use App\Models\Mtransaction;
use Illuminate\Http\Request;

class McoaController extends Controller
{
    //
    public function index () {
        $coa = Mcoa::all();
        $roleName = Mkategori::all();
        return view ('coa.index',compact(['coa','roleName']));
    }

    public function create (){
        $roleName =Mkategori::all();
        return view ('coa.create',compact(['roleName']));
    }
    public function store (Request $request) 
    {
        Mcoa::create($request->except(['_token', 'submit']));
        return redirect('/mcoa');
    }

    public function edit($id)
    {
        $coa = Mcoa::find($id);
        $roleName = Mkategori::all();
        return view('coa.edit',compact(['coa','roleName']));
    }
    public function update ($id, Request $request)
    {
        $coa = Mcoa::find($id);
        $coa -> update($request->except(['_token', 'submit']));
        return redirect('/mcoa');
    }

    public function destroy($id)
    {
        $coa = Mcoa::find($id);
        $coa->delete();
        return redirect('/mcoa');
    }

    // Category
    public function vkategori ()
    {
        $roleName = Mkategori::all();
        return view('coa.category',compact(['roleName']));
    }

    public function storeKategori(Request $request)
    {
        Mkategori::create($request->except(['_token', 'submit']));
        return redirect('/mcoa/vkategori');
    }

    public function destroyKategori($id)
    {
        $delKategori = Mkategori::find($id);
        $delKategori->delete();
        return redirect('/mcoa/vkategori');
    }

    // Transaction
    public function vtransaction()
    {
        $roleTransaction = Mtransaction::all();
        $roleCoa = Mcoa::all();
        return view('coa.transaction',compact(['roleTransaction','roleCoa']));
    }

    public function storeTransaction(Request $request)
    {
        Mtransaction::create($request->except(['_token', 'submit']));
        return redirect('/mcoa/vtransaction');
    }

    public function destroyTransaction($id)
    {
        $delTransaction = Mtransaction::find($id);
        $delTransaction->delete();
        return redirect('/mcoa/vtransaction');
    }


    public function editTransaction($id)
    {
        $coa = Mtransaction::find($id);
        $roleName = Mkategori::all();
        $roleCoa = Mcoa::all();
        return view('coa.editTransaction', compact(['coa', 'roleName','roleCoa']));
    }

    public function updateTransaction($id, Request $request)
    {
        $coa = Mtransaction::find($id);
        $coa->update($request->except(['_token', 'submit']));
        return redirect('/mcoa/vtransaction');
    }

    public function vreports()
    {
        $roleTransaction = Mreport::all();
        $roleCoa = Mcoa::all();
        $roleKategori = Mkategori::all();
        return view('coa.reports', compact(['roleTransaction', 'roleCoa','roleKategori']));
    }

    public function storeReports(Request $request)
    {
        Mreport::create($request->except(['_token', 'submit']));
        return redirect('/mcoa/vreports');
    }

    public function destroyReports($id)
    {
        $delReports = Mreport::find($id);
        $delReports->delete();
        return redirect('/mcoa/vreports');
    }


    public function editReports($id)
    {
        $coa = Mreport::find($id);
        $roleKategori = Mkategori::all();
        $roleCoa = Mcoa::all();
        return view('coa.editReports', compact(['coa', 'roleCoa','roleKategori']));
    }

    public function updateReports($id, Request $request)
    {
        $coa = Mreport::find($id);
        $coa->update($request->except(['_token', 'submit']));
        return redirect('/mcoa/vreports');
    }
}
