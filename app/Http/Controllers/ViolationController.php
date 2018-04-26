<?php

namespace App\Http\Controllers;

use App\Violation;
use App\Events\ViolationCreated;
use App\Http\Requests\ViolationStore;
use Auth;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $items = Violation::orderBy('id', 'desc')->paginate(10);

        // Menampilkan data dengan officer id yg sedang login
        // $items = Violation::where('officer_id',Auth::id())->paginate(10);

        // Jika memakai relationship
        // $items = Auth::user()->violations()->paginate(10);
        $items = $request->user()->violations()->paginate(10);

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
    public function store(ViolationStore $request)
    {
        $violation                              = new Violation();
        $violation->fill($request->all());
        // $violation->violator_identity_number    = $request->violator_identity_number;
        // $violation->violator_name               = $request->violator_name;
        // $violation->officer_id                  = $request->user()->id;
        // $violation->station_id                  = $request->station_id;
        $violation->status                      = 'NEW';

        $violation->station()->associate($request->station_id);
        //Eloquent Way
        $user = $request->user();
        // $violation->user()->associate($user);

        //atau
        $user->violations()->save($violation);

        event(new ViolationCreated($violation));

        // $violation->save();

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
    public function edit(Request $request, Violation $violation)
    {
        // Memakai find, untuk mencari primary key        
        // $violation = Violation::findOrFail($id);
        if($request->user()->can('edit-violation',$violation)){
            return view('violations.edit', ['violation' => $violation]);
        }
            abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Violation $violation)
    {

        // $violation                              = Violation::findOrFail($id);
        // $violation->violator_identity_number    = $request->get('violator_identity_number');
        // $violation->violator_name               = $request->get('violator_name');
        $violation->fill($request->except('violator_identity_number'));
        $violation->station_id                  = $request->get('station_id');
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
    public function destroy(Violation $violation)
    {
        // $violation = Violation::find($id);
        $violation->delete();

        return redirect()   ->route('violations.index')
                            ->with('success', 'Pelanggaran Berhasil Dihapus');
    }
}
