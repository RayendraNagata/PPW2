<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        // $content = [
        //     'name' => 'Si Pri',
        //     'subject' => 'Manusia ganteng',
        //     'body' => 'Info info zaidan ganteng'
        // ];

        // Mail::to('marsdamadiun@gmail.com') -> send(new SendEmail($content));

        // return "Email berhasil dikirim";

        return view('email.kirimEmail');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        dispatch(new SendMailJob($data));
        return redirect()->route('kirim.email')->with('success', 'Email berhasil dikirim');
    }

}
