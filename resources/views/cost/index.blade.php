@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 style="text-align: center">経費管理</h2>
                <div class="mx-auto mt-5">
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-md-2 text-center">
                            <a href="{{route('cost.create')}}" class="btn btn-success">新規</a>
                        </div>
                        <div class="col-md-10 text-center">
                            <form method="GET" action="{{route('std.index')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-3">
                                        項目<select name="search1">
                                            <option value="0" <?php if (!isset($grd)) {
                                                echo "selected";
                                            } ?>>全て
                                            </option>
                                            <option value="1">集客</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        小項目<select name="search2">
                                            <option value="" <?php if (!isset($item)) {
                                                echo "selected";
                                            } ?>>全て
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        期間<select name="search3">
                                            <option value="0" <?php if (!isset($time)) {
                                                echo "selected";
                                            } ?>>---
                                            </option>
                                            @for($i=date('Y');$i<=2022;$i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>年

                                        <select name="search4">
                                            <option value="0" <?php if (!isset($time)) {
                                                echo "selected";
                                            } ?>>---
                                            </option>
                                            @for($i=1;$i<13;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>月

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
                        <th scope="col">日付</th>
                        <th scope="col">ジャンル</th>
                        <th scope="col">項目</th>
                        <th scope="col">内容</th>
                        <th scope="col">金額</th>
                        <th scope="col">詳細</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($costs as $cost)
                        <tr>
                            <td scope="col">{{$cost->cdate}}</td>
                            <td scope="col">
                                @foreach($genres as $key => $value)
                                    @if(false !== strstr($cost->item1, $key))
                                        {{$value}}
                                    @endif
                                @endforeach
                                </td>
                            <td scope="col">
                                @foreach($items as $key => $value)
                                    @if($cost->item1 == $key)
                                        {{$value}}
                                    @endif
                                @endforeach</td>
                            <td scope="col">{{$cost->del}}</td>
                            <td scope="col">{{$cost->fee}}</td>
                            <td scope="col"><a href="">詳細</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
