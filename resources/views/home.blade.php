@extends('layouts.app')

@section('content')
    {{--                        @if (session('status'))--}}
    @auth
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
        {{--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
        <div class="container">
            <h2 style="text-align: center">Sales analysis</h2>
            {{--Sales analysis(総利益、売上/月、利益/月、経費/月)--}}
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center">総利益</h5>
                                    <p style="font-size:30px;text-align: center;color: #1d68a7">3</p>
                                    <a href="#" class="card-link" style="text-align: right">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center">売上/月</h5>
                                    <p style="font-size:30px;text-align: center;color: #1d68a7">3</p>
                                    <a href="#" class="card-link" style="text-align: right">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center">利益/月</h5>
                                    <p style="font-size:30px;text-align: center;color: #1d68a7">3</p>
                                    <a href="#" class="card-link" style="text-align: right">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center">経費/月</h5>
                                    <p style="font-size:30px;text-align: center;color: #1d68a7">1,300</p>
                                    <a href="#" class="card-link" style="text-align: right">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">利益推移</h5>
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end Sales analysis(総利益、売上/月、利益/月、経費/月)--}}
            <?php //var_dump($location); exit; ?>
            {{-- Marketing analysis --}}
            <h2 style="text-align: center" class="mt-3">Marketing analysis</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">獲得単価</h5>
                            <canvas id="japanese_people_chart" width="500" height="500"></canvas>
                            {{--                            <canvas id="score" class = "chart"></canvas>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">地域別</h5>
                            <canvas id="location" width="500" height="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- end Marketing analysis --}}

            {{-- Student information --}}
            <h2 style="text-align: center" class="mt-3">Student information</h2>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center">コース比率</h5>
                            <?php $coursesum = $course[0]+$course[1]+$course[2]; ?>
                            <div style="text-align:center"><spna style="color: #7fbfff;font-size: 30px;">{{$course[0]/$coursesum*100}}</spna>% | <spna style="color: #7f7fff;font-size: 30px;">{{$course[1]/$coursesum*100}}</spna>% | <spna style="color: #bf7fff;font-size: 30px;">{{$course[2]/$coursesum*100}}</spna>%</div>
                            <div style="text-align:center">(Scr/Uni/WEB)</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center">月回数比率</h5>
                            <?php $timesum = $time[0]+$time[1]+$time[2]; ?>
                            <div style="text-align:center"><spna style="color: #7fbfff;font-size: 30px;">{{$time[0]/$timesum*100}}</spna>% | <spna style="color: #7f7fff;font-size: 30px;">{{$time[1]/$timesum*100}}</spna>% | <spna style="color: #bf7fff;font-size: 30px;">{{$time[2]/$timesum*100}}</spna>%</div>
                            <div style="text-align:center">(2回/4回/4回Prem)</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center">男女比</h5>
                            <?php $sexsum = $sex[0]+$sex[1]+$sex[2]; ?>
                            <div style="text-align:center"><spna style="color: #4dc0b5;font-size: 30px;">{{$sex[0]/$sexsum*100}}</spna>% | <spna style="color: palevioletred;font-size: 30px;">{{$sex[1]/$sexsum*100}}</spna>%</div>
                            <div style="text-align:center">(男の子/女の子)</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center">備考</h5>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end Student information --}}
        </div>

        <?php
        $earnings = [];
        $expenses = [];
        $profit = [];

        $dou1 = [];
        $dou2 = [];
        foreach ($location as $key => $value) {
            $dou1[] = $key;
            $dou2[] = $value;
        }

        $json_dou1 = json_encode($dou1);
        $json_dou2 = json_encode($dou2);


        ?>
        <script>

            let lineCtx = document.getElementById("lineChart");
            // 線グラフの設定
            let lineConfig = {
                type: 'line',
                data: {
                    // ※labelとデータの関係は得にありません
                    labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
                    datasets: [{
                        label: '売上',
                        data: [5980, 5980, 9930, 15910, 15910, 15910, 15910, 15910, 15910, 15910, 15910, 15910],
                        borderColor: '#3498DB',
                    }, {
                        label: '利益',
                        data: [2980, 280, -4430, -15910, 1510, 1510, 1910, 110, 910, 10, -110, 5910],
                        borderColor: '#F5B041',
                    }, {
                        label: '経費',
                        data: [2000, 75000, 24000, 3000, 0, 2000, 13000, 5000, 0, 3000, 3000, 2000],
                        borderColor: '#E74C3C',
                    }],
                },
                options: {
                    scales: {
                        // Y軸の最大値・最小値、目盛りの範囲などを設定する
                        y: {
                            suggestedMin: 0,
                            suggestedMax: 60,
                            ticks: {
                                stepSize: 20,
                            }
                        }
                    },
                },
            };
            let lineChart = new Chart(lineCtx, lineConfig);
        </script>

        {{--獲得単価--}}
        <script>
            var now = new Date();
            var barmonth = [now.getMonth() + '月', (now.getMonth() + 1) + '月', (now.getMonth() + 2) + '月', (now.getMonth() + 3) + '月', (now.getMonth() + 4) + '月', (now.getMonth() + 5) + '月'];
            let barCtx = document.getElementById("japanese_people_chart");
            // 線グラフの設定
            let barConfig = {
                type: 'bar',
                data: {
                    labels: barmonth,
                    datasets: [{
                        label: "ポスティング",
                        data: [127094745, 127041812, 126918546, 126748506, 126555078, 126146099],
                        backgroundColor: ['#4169e1']
                    }, {
                        label: "google広告",
                        data: [80000000, 90000000, 95000000, 100000000, 110000000, 115000000],
                        backgroundColor: ['#ffa500']
                    }, {
                        label: "Insta広告",
                        data: [75000000, 85000000, 93000000, 91000000, 80000000, 75000000],
                        backgroundColor: ['#fa8072']
                    },
                        {
                            label: "門配",
                            data: [127094745, 127041812, 126918546, 126748506, 126555078, 126146099],
                            backgroundColor: ['#4169e1']
                        }, {
                            label: "紹介",
                            data: [80000000, 90000000, 95000000, 100000000, 110000000, 115000000],
                            backgroundColor: ['#ffa500']
                        }, {
                            label: "コエテコ",
                            data: [75000000, 85000000, 93000000, 91000000, 80000000, 75000000],
                            backgroundColor: ['#fa8072']
                        }],
                },
                options: {
                    responsive: false
                }
            };
            let barChart = new Chart(barCtx, barConfig);

        </script>
        {{--地域別--}}
        <?php

        $dou1 = [];
        $dou2 = [];
        foreach ($location as $key => $value) {
            $dou1[] = $key;
            $dou2[] = $value;
        }

        $json_dou1 = json_encode($dou1);
        $json_dou2 = json_encode($dou2);

        ?>
        <script>
            // var js_dou1 = [];
            var js_dou1 = <?php echo $json_dou1; ?>;
            // var js_dou2 = [];
            var js_dou2 = <?php echo $json_dou2; ?>;

                window.onload = function () {
                let context2 = document.querySelector("#location").getContext('2d')
                new Chart(context2, {
                    type: 'doughnut',
                    data: {
                        labels: js_dou1,
                        datasets: [{
                            data: js_dou2,
                        }]
                    },
                    options: {
                        responsive: false,
                    }
                });
            }
        </script>

    @endauth

    @guest
        <div style="text-align: center">ログインしてください</div>
    @endguest
@endsection
