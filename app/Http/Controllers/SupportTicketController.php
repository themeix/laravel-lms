<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function index(){

        return view('admin.support.index');
    }

    public function openTicket(){

        return view('admin.support.openTicket');
    }


}
