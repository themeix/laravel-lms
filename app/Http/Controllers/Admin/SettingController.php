<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{

    public function paypal(){
        return view('admin.app_settings.paypal');
    }


    public function saveSetting(Request $request)
    {
        $this->updateSettings($request);
        Alert::toast('Succesfully saved', 'success');
        return redirect()->back();
    }


    private function updateSettings($request)
    {
        $inputs = Arr::except($request->all(), ['_token']);
        $keys = [];

        foreach ($inputs as $k => $v) {
            $keys[$k] = $k;
        }

        foreach ($inputs as $key => $value) {
            $option = Setting::firstOrCreate(['option_key' => $key]);
            $option->option_value = $value;
            $option->save();

            $oldValue = env($key);
            $newValue = str_replace(' ', '', $value);

            $path = base_path('.env');
            if (file_exists($path)) {
                file_put_contents(
                    $path, str_replace($key . '=' . $oldValue, $key . '=' . $newValue, file_get_contents($path))
                );
            }
        }

    }
}
