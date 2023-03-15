<?php

namespace App\Http\Controllers;

use App\Models\StdDetail;
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
        $detailid = DB::table('std_details')->where('stdid', $std->stdid)->value('id');
        $std2 = StdDetail::find($detailid);

//        var_dump($std2);
//        exit;
        return view('std.show', compact('std','std2'));
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
     * 生徒管理
     * 作成画面
     * 2023-03-09 S.Aoyama
     * @return \Illuminate\Http\Response
     */
    public function create2($id)
    {
        $std = Std::find($id);
//        $stdid = $std->id;
        //曜日一覧
        $weeks = [
            '日', //0
            '月', //1
            '火', //2
            '水', //3
            '木', //4
            '金', //5
            '土', //6
        ];
        //チーム一覧
        $teams = [
            'A', //0
            'B', //1
            'C', //2
            'D', //3
        ];
        $rlts = [
            '母親', //0
            '父親', //1
            '祖母', //2
            '祖母', //3
            'その他', //4
        ];
        $posts = [
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
            '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県',
            '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県',
            '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県',
            '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県',
            '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
        ];
        $subs = ["算数", "図工", "理科", "美術", "社会", "国語", "音楽", "体育", "道徳"];

        return view('std.create2',compact('std','weeks','teams','rlts','posts','subs'));
    }

    public static function store2(Request $request)
    {

        $stdlist = [
            'kana' => $request->kana,
            'stdid' => $request->stdid,
            'course' => $request->course,
            'sex' => $request->sex,
            'times' => $request->times,
            'week' => $request->week,
            'term' => $request->term,
            'team' => $request->team,
//            'pname1' => $request->pname1,
//            'rlt1' => $request->rlt1,
//            'pname2' => $request->pname2,
//            'rlt2' => $request->rlt2,
//            'post' => $request->post,
//            'pref' => $request->pref,
//            'add' => $request->add,
//            'date' => $request->date,
//            'sub' => $request->sub,
//            'favorite1' => $request->favorite1,
//            'favorite2' => $request->favorite2,
//            'memo1' => $request->memo1,
//            'memo2' => $request->memo2,
            'created_at' => date('Y-m-d H:i:s'),
        ];
//        DB::insert('insert into std_details (kana,stdid,course,sex,times,week,term,team,pname1,rlt1,pname2,rlt2,post,pref,add,date,sub,favorite1,favorite2,memo1,memo2,created_at) values (:kana,:stdid,:course,:sex,:times,:week,:term,:team,:pname1,:rlt1,:pname2,:rlt2,:post,:pref,:add,:date,:sub,:favorite1,:favorite2,:memo1,:memo2,:created_at)', $stdlist);
        DB::insert('insert into std_details (kana,stdid,course,sex,times,week,term,team,created_at) values (:kana, :stdid, :course, :sex, :times, :week, :term, :team, :created_at)', $stdlist);

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
