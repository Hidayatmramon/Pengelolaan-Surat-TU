<?php

namespace App\Http\Controllers;

use App\Models\LetterType;
use App\Exports\KlasifikasiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $lettertypes = LetterType::paginate(10);
        // dd($lettertypes);
        return view('data-surat.klasifikasi.index', compact('lettertypes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-surat.klasifikasi.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'letter_code' => 'required|string',
            'name_type' => 'required|string',
        ]);

        $dataCreate = LetterType::count();
        // $letterTypeJd = $request->letter_type_jd + $id;

        LetterType::create([

            'letter_code' => $request->letter_code . '-' . $dataCreate  + 1,
            'name_type' => $request->name_type,
        ]);

        return redirect()->route('klasifikasi')->with('succes', 'berhasil Menambahkan User');
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
        $lettertypes = LetterType::find($id);
        return view('data-surat.klasifikasi.edit', compact('lettertypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'letter_code' => 'required|string',
            'name_type' => 'required|string',
        ]);

//        $dataCreate = LetterType::count();
        // $letterTypeJd = $request->letter_type_jd + $id;

        LetterType::where('id', $id)->update([

            'letter_code' => $request->letter_code,// . '-' . $dataCreate,
            'name_type' => $request->name_type,
        ]);

        return redirect()->route('klasifikasi')->with('succes', 'berhasil Menambahkan User');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LetterType::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'berhasil menghapus data!');
    }
    public function search(Request $request)
{
    $search = $request->input('search');
    $lettertypes = LetterType::where('letter_code', 'LIKE', '%' . $search . '%')
                 ->paginate(10);

    return view('data-surat.klasifikasi.index', compact('lettertypes'));
}
    public function downloadexcel(){
        return Excel::download(new KlasifikasiExport, 'dataklasifikasisurat.xlsx');
    }

    public function detail(string $id){
        $lettertypes = LetterType::with('letters')->where('id', $id)->first();
                // dd($lettertypes);

        $created_at = date('d M Y', $lettertypes->created_at->timestamp);
                return view('data-surat.klasifikasi.show', compact('lettertypes', 'created_at',));
    }

}
