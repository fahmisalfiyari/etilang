<?php

namespace App\Http\Controllers;

use App\Violation;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Violation::orderBy('id', 'desc')->paginate(10);

        // return $items;
        return view('violations.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('violations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $violation                              = new Violation();
        $violation->violator_identity_number    = $request->violator_identity_number;
        $violation->violator_name               = $request->violator_name;
        $violation->officer_id                  = $request->user()->id;
        $violation->status                      = 'NEW';
        $violation->save();

        return redirect()   ->route('violations.index')
                            ->with('success', 'Pelanggaran Behasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $violation = Violation::find($id);
        return view('violations.edit', ['violation' => $violation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $violation                              = Violation::find($id);
        $violation->violator_identity_number    = $request->get('violator_identity_number');
        $violation->violator_name               = $request->get('violator_name');
        $violation->save(); 

        return redirect()   ->route('violations.index')
                            ->with('success', 'Informasi Pelanggaran Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $violation = Violation::find($id);
        $violation->delete();

        return redirect()   ->route('violations.index')
                            ->with('success', 'Pelanggaran Berhasil Dihapus');
    }
}
