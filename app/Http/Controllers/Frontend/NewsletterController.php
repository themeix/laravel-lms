<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Tools\Repositories\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class NewsletterController extends Controller
{

    public function __construct(Newsletter $category)
    {
        $this->model = new Crud($category);
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email|string|max:255',
        ]);


        $subscription = Newsletter::where('email', $request->email)->first();

        if ($subscription) {
            Alert::info('You are already subscribed to our newsletter');
            return back();

        }
        else{

            $data = [
                'email' => $request->email,
            ];

            $this->model->create($data);
            Alert::success('You have successfully subscribed to our newsletter');
            return back();
        }

    }
}
