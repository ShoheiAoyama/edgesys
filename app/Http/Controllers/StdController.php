<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Std;
use Illuminate\Support\Facades\DB;

class StdController extends Controller
{
    /**
     * 生徒管理
     * トップ画面
     * 2023-03-08 S.Aoyama
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stdlists = DB::select('select * from stds');
        return view('std.index', ['stdlists' => $stdlists]);
    }

    /**
     * 生徒管理
     * 作成画面
     * 2023-03-09 S.Aoyama
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('std.create');
    }

    /**
     * 生徒管理
     * 登録処理
     * 2023-03-09 S.Aoyama
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
     * 生徒管理
     * 詳細表示画面
     * 2023-03-09 S.Aoyama
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $std = Std::find($id);

        return view('std.show', compact('std'));
    }

    /**
     * 生徒管理
     * 登録画面
     * 2023-03-09 S.Aoyama
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
     * 生徒管理
     * 更新画面
     * 2023-03-11 S.Aoyama
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
     * 生徒管理
     * 削除画面
     * 2023-03-11 S.Aoyama
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
    /**
     * レッスン管理
     * トップ画面
     * 2023-03-13 S.Aoyama
     * @return \Illuminate\Http\Response
     */
    public function lesson(){
        return view('std.lesson');
    }


    /**
     *　レポート管理
     * トップ画面
     * 2023-03-13 S.Aoyama
     * @return \Illuminate\Http\Response
     */
    public function report(){
        return view('std.report');
    }

    /**
     * 連絡事項
     * トップ画面
     * 2023-03-13 S.Aoyama
     * @return \Illuminate\Http\Response
     */
    public function contact(){
        return view('std.contact');
    }
}
