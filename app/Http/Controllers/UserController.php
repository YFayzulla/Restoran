<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index', ['users' => User::query()->where('id', '!=', 1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        User::create([
            'name' => $request->name,
            'password' => $request->phone,
            'phone' => $request->phone,
            'salary' => $request->salary
        ]);

        return redirect()->back()->with('success', 'Malumot muofaqiyatliy saqlandi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'phone' => 'unique:users,phone,' . $user->id,
        ], [
            'phone.unique' => 'Bu telefon allaqachon mavjud',
        ]);


        $user->update([
            'name' => $request->name,
            'password' => $request->password ?? $user->password,
            'salary' => $request->salary,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('successful', 'malumot mufalliy yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Malumot o`chirildi');
    }
}
