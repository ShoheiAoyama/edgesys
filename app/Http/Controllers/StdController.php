<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Std;
use Illuminate\Support\Facades\DB;

class StdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stdlists = DB::select('select * from stds');
        return view('std.index', ['stdlists' => $stdlists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('std.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        //
//        $std = new Std;
//        $std->name = $request->input('name');
//        $std->stdid = $request->input('stdid');
//        $std->ps = $request->input('ps');
//        $std->sava();

        $stdlist = [
            'name' => $request->name,
            'stdid' => $request->stdid,
            'psw' => $request->psw,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        DB::insert('insert into stds (name,stdid,psw,created_at) values (:name, :stdid, :psw,:created_at)', $stdlist);

        return redirect('std/index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $std = Std::find($id);

        return view('std.show', compact('std'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $std = Std::find($id);
        return view('std.edit', compact('std'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $stdlist = [
            'id' => $request->id,
            'name' => $request->name,
            'stdid' => $request->stdid,
            'psw' => $request->psw,
        ];
        $check = DB::update('update stds set name =:name, stdid =:stdid, psw =:psw where id =:id', $stdlist);

        if ($check !== '0') {
            return redirect('std/index');
        } else {
            return redirect('std/edit');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $std = Std::find($id);
        $std->delete();

        return redirect('std/index');
    }
}
