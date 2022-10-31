<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{

    public function paypal(){
        return view('admin.app_settings.payment_method.paypal');
    }

    public function stripe(){
        return view('admin.app_settings.payment_method.stripe');
    }

    public function sslcommerz(){
        return view('admin.app_settings.payment_method.sslcommerz');
    }

    public function vimeo(){
        return view('admin.app_settings.upload.vimeo');
    }

    public function vimeoSettingsStore(Request $request){
        $values['VIMEO_CLIENT'] = preg_replace('/\s+/', '', $request->VIMEO_CLIENT);

        $values['VIMEO_SECRET'] = preg_replace('/\s+/', '', $request->VIMEO_SECRET);

        $values['VIMEO_TOKEN_ACCESS'] = preg_replace('/\s+/', '', $request->VIMEO_TOKEN_ACCESS);

        $values['VIMEO_STATUS'] = $request->VIMEO_STATUS;

        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n";
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }
        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str))
            return false;

        Artisan::call('optimize:clear');
        Alert::toast('Successfully Updated', 'success');
        return redirect()->back();
    }

    public function aws(){
        return view('admin.app_settings.upload.aws');
    }

    public function awsSettingsStore(Request $request){

        $values['STORAGE_DRIVER'] = $request->STORAGE_DRIVER;
        $values['AWS_ACCESS_KEY_ID'] = preg_replace('/\s+/', '', $request->AWS_ACCESS_KEY_ID);
        $values['AWS_SECRET_ACCESS_KEY'] = preg_replace('/\s+/', '', $request->AWS_SECRET_ACCESS_KEY);
        $values['AWS_DEFAULT_REGION'] =preg_replace('/\s+/', '', $request->AWS_DEFAULT_REGION);
        $values['AWS_BUCKET'] = preg_replace('/\s+/', '', $request->AWS_BUCKET);

        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n";
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }
        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str))
            return false;

        Artisan::call('optimize:clear');
        Alert::toast('Successfully Updated', 'success');
        return redirect()->back();
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
