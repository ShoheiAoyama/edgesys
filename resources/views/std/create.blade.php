@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 style="text-align: center">生徒管理ページ</h2>
                <div class="mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <ul class="list-group list-group-horizontal" style="width: 25rem;">
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.index')}}" style="color:dimgrey">TOP</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.create')}}">新規作成</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.index')}}" style="color:dimgrey">授業レポート</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.index')}}" style="color:dimgrey">生徒検索</a></li>
                            </ul>
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
