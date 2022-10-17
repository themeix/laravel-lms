<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BankController extends Controller
{

    public function index()
    {
        $data['banks'] = Bank::all();

        return view('admin.bank.index', $data);
    }


    public function create()
    {
        return view('admin.bank.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:banks,name',
            'account_name' => 'required',
            'account_number' => 'required',
            'status' => 'required',
        ]);

        $bank = new Bank();
        $bank->name = $request->name;
        $bank->account_name = $request->account_name;
        $bank->account_number = $request->account_number;
        $bank->status = $request->status;
        $bank->save();


        Alert::toast('Bank Created Successfully.', 'success');

        return redirect()->route('bank.index')->with('create-message', 'Bank Created successfully.');

    }

    public function changeStatus(Request $request)
    {
        $bank = Bank::find($request->id);
        $bank->status = $request->status;
        $bank->save();

        return response()->json([
            'data' => 'success',
        ]);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $data['bank'] = Bank::find($id);

        return view('admin.bank.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:banks,name,' . $id,
            'account_name' => 'required',
            'account_number' => 'required',
        ]);

        $bank = Bank::find($id);
        $bank->name = $request->name;
        $bank->account_name = $request->account_name;
        $bank->account_number = $request->account_number;
        $bank->status = $request->status;
        $bank->save();

        Alert::toast('Bank Updated Successfully.', 'success');

        return redirect()->route('bank.index')->with('update-message', 'Bank Updated successfully.');

    }


    public function delete($id)
    {
        $bank = Bank::find($id);
        $bank->delete();

        Alert::toast('Bank Deleted Successfully.', 'warning');

        return redirect()->route('bank.index')->with('delete-message', 'Bank Deleted successfully.');

    }
}
