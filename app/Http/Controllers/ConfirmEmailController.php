<?php

namespace App\Http\Controllers;

use App\Events\EmailConfirmed;
use App\Models\Application;
use Illuminate\Http\Request;

class ConfirmEmailController extends Controller
{


    public function index($id)
    {
        $application = Application::find($id);

        $application->email_confirmed = true;

        $application->save();

        event(new EmailConfirmed($id));

        return view('email_confirmed');

    }
}
