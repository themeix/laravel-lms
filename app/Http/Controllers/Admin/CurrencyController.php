<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CurrencyController extends Controller
{

    public function index()
    {
        $data['currencies'] = Currency::all();

        return view('admin.currency.index', $data);
    }


    public function create()
    {
        return view('admin.currency.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'currency_code' => 'required|unique:currencies,currency_code',
            'symbol' => 'required',
            'currency_placement' => 'required',
        ]);

        $currency = new Currency();
        $currency->currency_code = $request->currency_code;
        $currency->symbol = $request->symbol;
        $currency->currency_placement = $request->currency_placement;
        $currency->save();

        if ($request->current_currency) {
            Currency::where('id', $currency->id)->update(['current_currency' => 'on']);
            Currency::where('id', '!=', $currency->id)->update(['current_currency' => 'off']);
        }

        Alert::toast('Currency created Successfully', 'success');
        return redirect()->route('currency.index')->with('create-message', 'Currency created Successfully');
    }


    public function edit($id)
    {
        $data['currency'] = Currency::findOrFail($id);
        return view('admin.currency.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'currency_code' => 'required|unique:currencies,currency_code,' . $id,
            'symbol' => 'required',
            'currency_placement' => 'required',
        ]);

        $currency = Currency::findOrfail($id);
        $currency->currency_code = $request->currency_code;
        $currency->symbol = $request->symbol;
        $currency->currency_placement = $request->currency_placement;
        $currency->save();

        if ($request->current_currency) {
            Currency::where('id', $currency->id)->update(['current_currency' => 'on']);
            Currency::where('id', '!=', $currency->id)->update(['current_currency' => 'off']);
        }

        Alert::toast('Currency updated Successfully', 'success');
        return redirect()->route('currency.index')->with('update-message', 'Currency updated Successfully');
    }


    public function delete($id)
    {
        $currency = Currency::findOrFail($id);
        if ($currency->current_currency == 'on') {
            Alert::toast('You can not delete it. It is your current currency.', 'error');
            return redirect()->back()->with('error-message', 'You can not delete it. It is your current currency.');
        } else {
            $currency->delete();
            Alert::toast('Currency deleted Successfully', 'warning');
            return redirect()->route('currency.index')->with('delete-message', 'Currency deleted Successfully');
        }
    }
}
