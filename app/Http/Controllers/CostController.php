<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Egulias\EmailValidator\Exception\ConsecutiveAt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $costs = Cost::all();
        var_dump($costs);
        exit;

        return view('cost.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items = [
            'a1' => "アポロン",
            'b1' => "事務用品",
            'c1' => "交際費",
            'd1' => "会議費",
            'e1' => "交通費",
            'f1' => "チラシ",
            'f2' => "Google広告",
            'f3' => "Instagram広告",
            'f4' => "コエテコ",
            'g1' => "システム",
            'h2' => "その他"
        ];
        return view('cost.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        echo '<pre>';
//        echo '</pre>';
//        echo $request->cdate;
//        exit;

        $costs = new Cost;
        $costs->cdate = $request->input('cdate');
        $costs->item1 = $request->input('item1');
        $costs->del = $request->input('del');
        $costs->fee = $request->input('fee');
        $costs->staff = $request->input('staff');

        $costs->save();

        return view('cost.index');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
