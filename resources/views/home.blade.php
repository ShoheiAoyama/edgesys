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

            {{-- Marketing analysis --}}
            <h2 style="text-align: center" class="mt-3">Marketing analysis</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">地域別</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">学年別</h5>
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
                            <h5 class="card-title">コース比率<br>(Scr/Uni/WEB)</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">月回数比率(2/4)</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">男女比</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">備考</h5>
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
        ?>
        <script>

            let lineCtx = document.getElementById("lineChart");
            // 線グラフの設定
            let lineConfig = {
                type: 'line',
                data: {
                    // ※labelとデータの関係は得にありません
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
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
    @endauth

    @guest
        <div style="text-align: center">ログインしてください</div>
    @endguest
@endsection
