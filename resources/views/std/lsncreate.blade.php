@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 style="text-align: center">生徒管理ページ</h2>

                <div class="mx-auto">
                    <div class="row justify-content-center mt-2 mb-3">
                        <div class="col-md-2 text-center">
                            <a href="{{route('std.create')}}" class="btn btn-success">新規</a>
                        </div>
                        <div class="col-md-10 text-center">
                            <form method="GET" action="{{route('std.index')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-3">
                                        学年<select name="search1">
                                            <option value="0" <?php if (!isset($grd)) {
                                                echo "selected";
                                            } ?>>全て
                                            </option>
                                            <option value="1">小学1年生</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        コース<select name="search2">
                                            <option value="" <?php if (!isset($request->search2)) {
                                                echo "selected";
                                            } ?>>全て
                                            </option>
                                            <option value="0" <?php if ($request->search2 === '0') {
                                                echo "selected";
                                            } ?>>Scratch</option>
                                            <option value="1" <?php if ($request->search2 === '1') {
                                                echo "selected";
                                            } ?>>Unigy</option>
                                            <option value="2" <?php if ($request->search2 === '2') {
                                                echo "selected";
                                            } ?>>WEB</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        時間<select name="search3">
                                            <option value="0" <?php if (!isset($time)) {
                                                echo "selected";
                                            } ?>>全て
                                            </option>
                                            @for($i=10;$i<20;$i++)
                                                {{--                                                        <option value="10">10:00-10:50</option>--}}
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

                <form method="POST" action="{{route('std.store')}}">
                    @csrf
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">生徒氏名</th>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <th scope="row">生徒ID</th>
                            <td><input type="text" name="stdid"></td>
                        </tr>
                        <tr>
                            <th scope="row">パスワード</th>
                            <td><input type="text" name="psw"></td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="display: block;text-align: right">
                        <input class="btn btn-success" type="submit" value="登録">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
