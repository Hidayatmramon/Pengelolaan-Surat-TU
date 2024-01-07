<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'staff')->paginate(5);
        return view('staff.index', compact('users'));
    }
    public function indexg()
    {
        $users = User::where('role', 'guru')->paginate(5);
        return view('guru.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }
    public function createg()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|in:staff,guru',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        User::create([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('staff.home')->with('succes', 'berhasil Menambahkan User');
    }
    public function storeg(Request $request)
    {
        $request->validate([
            'role' => 'required|in:staff,guru',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        User::create([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('guru.home')->with('succes', 'berhasil Menambahkan User');
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
        $user = User::find($id);
        return view('staff.edit', compact('user'));
    }
    public function editg(string $id)
    {
        $user = User::find($id);
        return view('guru.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => 'required|in:staff,guru',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|string',
        ]);

        User::where('id', $id)->update([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        return redirect()->route('staff.home')->with('succes', 'berhasil Mengubah User');

    }
    public function updateg(Request $request, string $id)
    {
        $request->validate([
            'role' => 'required|in:staff,guru',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|string',
        ]);

        User::where('id', $id)->update([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        return redirect()->route('guru.home')->with('succes', 'berhasil Mengubah User');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'berhasil menghapus data!');
    }
    public function search(Request $request)
    {
    $search = $request->input('search');
    $users = User::where('role', 'staff')
                 ->where('name', 'LIKE', '%' . $search . '%')
                 ->paginate(5);

    return view('staff.index', compact('users'));
}
    public function searchg(Request $request)
    {
    $search = $request->input('search');
    $users = User::where('role', 'guru')
                 ->where('name', 'LIKE', '%' . $search . '%')
                 ->paginate(5);

    return view('guru.index', compact('users'));
}

}
