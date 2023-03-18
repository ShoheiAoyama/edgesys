@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 style="text-align: center">スクール管理</h2>
                <div class="mx-auto">
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-md-2 text-center">
                            <a href="{{route('std.lsncreate')}}" class="btn btn-success">新規</a>
                        </div>
                        <div class="col-md-10 text-center">
                            <form method="GET" action="{{route('std.lesson')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-3">学年<select name="search1">
                                            <option value="0" <?php if (!isset($grd)) {echo "selected";} ?>>全て</option>
                                            <option value="1">小学1年生</option>
                                        </select>
                                    </div>
                                    <div class="col-4">時間<select name="search3">
                                            <option value="0" <?php if (!isset($request->search3)) {echo "selected";} ?>>全て</option>
                                            @for($i=10;$i<20;$i++)
                                                <option value="{{$i}}">{{$i}}:00-{{$i}}:50</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-warning" type="">検索</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr style="text-align: center;">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">コース</th>
                            <th scope="col">日時</th>
                            <th scope="col">グループ</th>
                            <th scope="col">講師担当</th>
                            <th scope="col">レポート</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="text-align: center;">
                            <th scope="col">1</th>
                            <th scope="col">田中道啓</th>
                            <th scope="col">unityコース</th>
                            <th scope="col">3/13(日)</th>
                            <th scope="col">A</th>
                            <th scope="col">青山</th>
                            <th scope="col">[済]</th>
                        </tr>
                        <tr style="text-align: center;">
                            <th scope="col">2</th>
                            <th scope="col">有村夏芽</th>
                            <th scope="col">unityコース</th>
                            <th scope="col">3/13(日)</th>
                            <th scope="col">A</th>
                            <th scope="col">青山</th>
                            <th scope="col">[済]</th>
                        </tr>
                        <tr style="text-align: center;">
                            <th scope="col">3</th>
                            <th scope="col">野田ハルト</th>
                            <th scope="col">unityコース</th>
                            <th scope="col">3/13(日)</th>
                            <th scope="col">A</th>
                            <th scope="col">青山</th>
                            <th scope="col">[済]</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
