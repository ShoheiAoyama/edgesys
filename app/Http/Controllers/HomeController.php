<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prefs = [
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
            '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県',
            '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県',
            '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県',
            '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県',
            '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
        ];

        $earnings = [];
        $expenses = [];
        $profit = [];
//        $stdDetails = DB::table('std_details')->pluck('pref');
        $stdDetails = DB::table('std_details')->get();

//        echo "<pre>";
//        var_dump($stdDetails);
//        echo "</pre>";
//        exit;

        $benes = [];//利益
        $locations = [];//地域別
        $grds = [];//学年別
        $courses = [];//コース別
        $times = [];//月回数比
        $sexs = [];//男女比
        foreach ($stdDetails as $stdDetail) {
            if (isset($stdDetail->date)) {
                if ($stdDetail->course == 0) {
                    $benes[][mb_substr($stdDetail->date, 0, 7)] = 3980;
                } elseif ($stdDetail->course == 1) {
                    $benes[][mb_substr($stdDetail->date, 0, 7)] = 5980;
                } elseif ($stdDetail->course == 2) {
                    $benes[][mb_substr($stdDetail->date, 0, 7)] = 3980;
                }
            }
            if (isset($stdDetail->pref)) {
                $locations[] = $stdDetail->pref;
            }
            if (isset($stdDetail->grd)) {
                $grds[] = "";
            }
            if (isset($stdDetail->course)) {
                $courses[] = $stdDetail->course;
            }
            if (isset($stdDetail->times)) {
                $times[] = $stdDetail->times;
            }
            if (isset($stdDetail->sex)) {
                $sexs[] = $stdDetail->sex;
            }
        }

        //年月ごとに売上を計算

        //courses
        $course = [];
        $course[0] = 0;//Scratch
        $course[1] = 0;//Unity
        $course[2] = 0;//WEB
        foreach ($courses as $key => $value) {
            if ($value == 0) {
                $course[0] += 1;
            } elseif ($value == 1) {
                $course[1] += 1;
            } elseif ($value == 2) {
                $course[2] += 1;
            }
        }
        arsort($course);

        //location
        $location = [];
//        var_dump($locations);
//        exit;

        foreach ($locations as $key => $value) {
            if (!is_null($value)) {
                if (isset($location[$prefs[$value]]) && $location[$prefs[$value]] >= 1) {
                    $location[$prefs[$value]] += 1;
                } else {
                    $location[$prefs[$value]] = 1;
                }
            }
        }
        arsort($location);
        //time

        $time = [];
        $time[0] = 0;//2回
        $time[1] = 0;//4回
        $time[2] = 0;//4回prem
        foreach ($times as $key => $value) {
            if ($value == 0) {
                $time[0] += 1;
            } elseif ($value == 1) {
                $time[1] += 1;
            } elseif ($value == 2) {
                $time[2] += 1;
            }
        }
        arsort($time);
        //sex
        $sex = [];
        $sex[0] = 0;//男の子
        $sex[1] = 0;//女の子
        $sex[2] = 0;//その他
        foreach ($sexs as $key => $value) {
//            if (!isset($sex[$value])){
//                $sex[$value] = 0;
//            }
            if ($value == 0) {
                $sex[0] += 1;
            } elseif ($value == 1) {
                $sex[1] += 1;
            } else {
                $sex[2] += 1;
            }
        }
        arsort($sex);

//        echo '<pre>';
//        var_dump($sex);
//        echo '</pre>';
//        exit;
        return view('home', compact('location', 'grds', 'course', 'time', 'sex'));
    }
}
