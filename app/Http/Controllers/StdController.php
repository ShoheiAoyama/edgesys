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
    public function index(Request $request)
    {

        if (isset($request)){
            $sql1 = "select stds.* from stds,std_details where stds.stdid = std_details.stdid";
            if (isset($request->search2)){
                $sql1 .= " and course = '" . $request->search2 . "'";
            }
            if (isset($request->search3)){
                $sql1 .= "";
            }
            $stdData = DB::select($sql1);
        }else{
            $sql1 = 'select * from stds ';
            $stdData = DB::select($sql1);
        }
        $sql2 = 'select * from std_details ';
        $stdData2 = DB::select($sql2);

        $stds = [];
        foreach ($stdData as $key => $value) {
            $stds[$value->id]['oid'] = $value->id;
            $stds[$value->id]['name'] = $value->name;
            $stds[$value->id]['psw'] = $value->psw;
            foreach ($stdData2 as $key2 => $value2) {
                if($value->stdid == $value2->stdid) {
                    foreach ($value2 as $key3 => $value3) {
                        $stds[$value->id][$key3] = $value3;
                        if ($key3 == 'course') {
                            if ($value3 == "0") {
                                $stds[$value->id]['course'] = "Scratch";
                            } elseif ($value3 == "1") {
                                $stds[$value->id]['course'] = "Unity";
                            } elseif ($value3 == "2") {
                                $stds[$value->id]['course'] = "WEB";
                            }
                        }
                    }
                }
            }
        }
        
        return view('std.index', compact('stds','request'));
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

//        echo $std->id;
//        exit;


//        $detailid = DB::select("select std_details.id from stds,std_details where '" . $std->id . "' = std_details.stdid");
        $detailid = DB::table('std_details')->where('stdid', $std->stdid)->value('id');

//        echo '<pre>';
//        var_dump($detailid);
//        echo '</pre>';
//        exit;

        $std2 = StdDetail::find($detailid);


        //曜日一覧
        $weeks = [
            '日曜日', //0
            '月曜日', //1
            '火曜日', //2
            '水曜日', //3
            '木曜日', //4
            '金曜日', //5
            '土曜日', //6
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
        $prefs = [
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
            '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県',
            '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県',
            '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県',
            '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県',
            '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
        ];
        $subs = ["算数", "図工", "理科", "美術", "社会", "国語", "音楽", "体育", "道徳"];

//        var_dump($std2);
//        exit;
        return view('std.show', compact('std', 'std2', 'weeks', 'teams', 'rlts', 'prefs', 'subs'));
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

        //もしstdidが変更になるなら、std_detailsテーブルのstdidも変更させる

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

        //曜日一覧
        $weeks = [
            '日曜日', //0
            '月曜日', //1
            '火曜日', //2
            '水曜日', //3
            '木曜日', //4
            '金曜日', //5
            '土曜日', //6
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
        $prefs = [
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
            '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県',
            '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県',
            '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県',
            '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県',
            '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
        ];
        $subs = ["算数", "図工", "理科", "美術", "社会", "国語", "音楽", "体育", "道徳"];

        return view('std.create2', compact('std', 'weeks', 'teams', 'rlts', 'prefs', 'subs'));
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
            'pname1' => $request->pname1,
            'rlt1' => $request->rlt1,
            'pname2' => $request->pname2,
            'rlt2' => $request->rlt2,
            'post' => $request->post,
            'pref' => $request->pref,
            'add2' => $request->add,
            'date2' => $request->date,
            'sub' => $request->sub,
            'favorite1' => $request->favorite1,
            'favorite2' => $request->favorite2,
            'memo1' => $request->memo1,
            'memo2' => $request->memo2,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        //もしすでに該当する生徒IDの詳細情報が登録されていたら、新規登録せずにリダイレクトさせる処理

        DB::insert('insert into std_details (kana,stdid,course,sex,times,week,term,team,pname1,rlt1,pname2,rlt2,post,pref,`add`,`date`,sub,favorite1,favorite2,memo1,memo2,created_at) values (:kana,:stdid,:course,:sex,:times,:week,:term,:team,:pname1,:rlt1,:pname2,:rlt2,:post,:pref,:add2,:date2,:sub,:favorite1,:favorite2,:memo1,:memo2,:created_at)', $stdlist);

        return redirect('std/index');

    }

    /**
     * 生徒管理
     * 登録画面
     * 2023-03-09 S.Aoyama
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit2(Request $requet, $id)
    {
        //
        $id0 = $requet->std_id;

        //曜日一覧
        $weeks = [
            '日曜日', //0
            '月曜日', //1
            '火曜日', //2
            '水曜日', //3
            '木曜日', //4
            '金曜日', //5
            '土曜日', //6
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
        $prefs = [
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
            '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県',
            '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県',
            '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県',
            '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県',
            '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
        ];
        $subs = ["算数", "図工", "理科", "美術", "社会", "国語", "音楽", "体育", "道徳"];
        $std = DB::table('stds')->where('id', $id0)->first();
        $std2 = StdDetail::find($id);

//            var_dump($std);
//        echo $id0;
//        exit;

        return view('std.edit2', compact('std2', 'std', 'weeks', 'teams', 'rlts', 'prefs', 'subs'));
    }

    /**
     * 生徒管理
     * 更新画面
     * 2023-03-11 S.Aoyama
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, $id)
    {
        //

        $stdlist = [
            'id' => $request->id,
            'kana' => $request->kana,
            'sex' => $request->sex,
            'course' => $request->course,
            'times' => $request->times,
            'week' => $request->week,
            'term' => $request->term,
            'team' => $request->team,
            'pname1' => $request->pname1,
            'rlt1' => $request->rlt1,
            'pname2' => $request->pname2,
            'rlt2' => $request->rlt2,
            'post' => $request->post,
            'pref' => $request->pref,
            'add2' => $request->add,
            'date2' => $request->date,
            'sub' => $request->sub,
            'favorite1' => $request->favorite1,
            'favorite2' => $request->favorite2,
            'memo1' => $request->memo1,
            'memo2' => $request->memo2,

        ];
        $check = DB::update('update std_details set kana =:kana, sex =:sex, course =:course, times =:times, week =:week, term =:term, team =:team, pname1 =:pname1, rlt1 =:rlt1, pname2 =:pname2, rlt2 =:rlt2, post =:post,pref =:pref, `add` =:add2, `date` =:date2, sub =:sub, favorite1 =:favorite1, favorite2 =:favorite2, memo1 =:memo1, memo2 =:memo2 where id =:id', $stdlist);

        //もしstdidが変更になるなら、std_detailsテーブルのstdidも変更させる

        if ($check !== '0') {
            return redirect('std/index');
//            return redirect('std/report');
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
    public function destroy2($id)
    {
        //
//        $std = Std::find($id);
        $stddetail = StdDetail::find($id);
//        $std->delete();
        $stddetail->delete();

        return redirect('std/index');
    }

    /**
     * レッスン管理
     * トップ画面
     * 2023-03-13 S.Aoyama
     * @return \Illuminate\Http\Response
     */
    public function lesson(Request $request)
    {
        $sql2 = 'select * from stds,std_details where stds.stdid = std_details.stdid';
        if (isset($request->search2)){
            $sql2 .= " and std_details.course = '" . $request->search2 . "'";
        }
        $stds = DB::select($sql2);
        foreach ($stds as $key => $value) {
            if (isset($value->course)) {
                if ($value->course == "0") {
                    $stds[$key]->course = "Scratch";
                } elseif ($value->course == "1") {
                    $stds[$key]->course = "Unity";
                } elseif ($value->course == "2") {
                    $stds[$key]->course = "WEB";
                }
            }
        }

        return view('std.lesson',compact('stds','request'));
    }
    /**
     * レッスン管理
     * 新規作成画面
     * 2023-03-13 S.Aoyama
     * @return \Illuminate\Http\Response
     */
    public function lsncreate($id)
    {
        $std = Std::find($id);

        //曜日一覧
        $weeks = [
            '日曜日', //0
            '月曜日', //1
            '火曜日', //2
            '水曜日', //3
            '木曜日', //4
            '金曜日', //5
            '土曜日', //6
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
        $prefs = [
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
            '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県',
            '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県',
            '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県',
            '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県',
            '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
        ];
        $subs = ["算数", "図工", "理科", "美術", "社会", "国語", "音楽", "体育", "道徳"];

        return view('std.create2', compact('std', 'weeks', 'teams', 'rlts', 'prefs', 'subs'));
    }
    /**
     *　レポート管理
     * トップ画面
     * 2023-03-13 S.Aoyama
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        return view('std.report');
    }

    /**
     * 連絡事項
     * トップ画面
     * 2023-03-13 S.Aoyama
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('std.contact');
    }



}
