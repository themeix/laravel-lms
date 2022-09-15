<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SupportTicketController extends Controller
{
    public function index(){

        return view('admin.support.index');
    }

    public function openTicket(){

        return view('admin.support.openTicket');
    }


}
