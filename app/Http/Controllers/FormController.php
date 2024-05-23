<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    function index(): View
    {
        return view('index');
    }
    
    function store(Request $request): RedirectResponse
    {
        $data = $request->validate(
            [
                'fname' => 'required|string',
                'lname' => 'required|string',
                'email' => 'required|string',
                'pwd' => 'required|string',
                'cpwd' => 'required|string',
            ]);
        
        $isstudent = Student::query()
        ->where('email', $data['email'])
        ->first('id');

        if(isset($isstudent))
        {
            return back()->withErrors('Такой абиритуриент уже cуществует!');
        }

        if($data['pwd'] !== $data['cpwd'])
        {
            return back()->withErrors('Пароли не совподают!');
        }

        Student::create(
            [
                'firstName' => $data['fname'],
                'lastName' => $data['lname'],
                'email' => $data['email'],
                'password' => Hash::make($data['pwd']),
            ]
        );

        return redirect()->route('home')->with('success', 'Абиритуриент успешно зарегестрирован!');
    }
}
