<?php

namespace App\Http\Controllers;

use App\Models\letter;
use App\Models\LetterType;
// use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\DatasuratExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = Letter::paginate(10);
        return view('data-surat.surat.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lettertypes = LetterType::with('letters')->get();
        $users = User::all();

        return view('data-surat.surat.create', compact('lettertypes', 'users'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'letter_type_id' => 'required',
            'letter_perihal' => 'required',
            'receipients' => 'required|array',
            'content' => 'required',
            'notulis' => 'required'
        ]);

        $recep = $request->receipients;
        $dataCreate = Letter::where('letter_type_id', $request->letter_type_id)->count();
        Letter::create([
            'letter_type_id' => $request->letter_type_id . '/' . ($dataCreate + 001) . '/SMK WIKRAMA' ,
            'letter_perihal' => $request->letter_perihal,
            'receipients' => json_encode($recep),
            'content' => $request->content,
            // 'attachment' => $request->attachment,
            'notulis' => $request->notulis,
        ]);

        return redirect()->route('datasurat')->with('success', 'Letter created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(letter $letter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $letters = Letter::find($id);
        $users = User::all();
        return view('data-surat.surat.edit', compact('letters', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'letter_perihal' => 'required',
            'receipients' => 'required|array',
            'content' => 'required',
            'notulis' => 'required'
        ]);

        $recep = $request->receipients;
        Letter::where('id', $id)->update([

            'letter_perihal' => $request->letter_perihal,
            'receipients' => json_encode($recep),
            'content' => $request->content,
            'attachment' => $request->attachment,
            'notulis' => $request->notulis,
        ]);

        return redirect()->route('datasurat')->with('success', 'Letter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Letter::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'berhasil menghapus data!');
    }
    public function search(Request $request)
{
    $search = $request->input('search');
    $letters = Letter::where('letter_type_id', 'LIKE', '%' . $search . '%')
                     ->orWhere('letter_perihal', 'LIKE', '%' . $search . '%')
                     ->paginate(10);

    return view('data-surat.surat.index', compact('letters'));

}
    public function downloadexcel(){
        return Excel::download(new DatasuratExport, 'data-surat.xlsx');
    }
}
