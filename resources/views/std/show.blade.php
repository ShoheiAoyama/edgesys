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
                <div class="card mx-auto" style="width: 25rem;">
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col-2" colspan="2">基本情報</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">生徒氏名</th>
                                <td>{{$std->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">生徒ID</th>
                                <td>{{$std->stdid}}</td>
                            </tr>
                            <tr>
                                <th scope="row">パスワード</th>
                                <td>{{$std->psw}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row text-center justify-content-md-center mb-3">
                        <div class="col-3">
                            <form method="GET" action="{{route('std.edit', ['id' => $std->id])}}">
                                @csrf
                                {{--                    <div style="display: block;text-align: right">--}}
                                <input class="btn btn-success" type="submit" value="変更">
                                {{--                    </div>--}}
                            </form>
                        </div>
                        <div class="col-3">
                            <form method="POST" action="{{route('std.destroy',['id' => $std->id])}}"
                                  id="delete_{{$std->id}}">
                                @csrf
                                <a href="#" class="btn btn-danger" data-id="{{$std->id}}"
                                   onclick="deletePost(this)">削除</a>
                            </form>
                        </div>
                    </div>{{--row--}}
                </div>{{--card--}}

                {{--詳細情報--}}
                @if(isset($stdDetail->stdid))
                    <div class="card mx-auto mt-3" style="width: 25rem;">
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col-2" colspan="2">詳細情報</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        フリガナ
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        性別
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        コース
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        月回数
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        レッスン曜日
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        レッスン時間
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        レッスンチーム
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        保護者様1
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        保護者様1属性
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        保護者様2
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        保護者様2属性
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        郵便番号
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        都道府県
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        住所
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        入会日
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        好きな教科
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        好きなモノ1
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        好きなモノ2
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        備考1
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        備考2
                                    </th>
                                    <td>{{$std->name}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row text-center justify-content-md-center mb-3">
                            <div class="col-3">
                                <form method="GET" action="{{route('std.edit2', ['id' => $std->id])}}">
                                    @csrf
                                    {{--                    <div style="display: block;text-align: right">--}}
                                    <input class="btn btn-success" type="submit" value="変更">
                                    {{--                    </div>--}}
                                </form>
                            </div>
                            <div class="col-3">
                                <form method="POST" action="{{route('std.destroy',['id' => $std->id])}}"
                                      id="delete_{{$std->id}}">
                                    @csrf
                                    <a href="#" class="btn btn-danger" data-id="{{$std->id}}"
                                       onclick="deletePost(this)">削除</a>
                                </form>
                            </div>
                        </div>{{--row--}}
                    </div>{{--card--}}
                @else
                    <div class="card mx-auto mt-3" style="width: 25rem;">
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col-2" colspan="2">詳細情報</th>
                                </tr>
                                </thead>
                            <tbody>
                            <tr>
                                <th scope="col-2" colspan="2">詳細情報が登録されていません</th>
                            </tr>
                            </tbody>
                            </table>
                            <a href="{{route('std.create2',['id' => $std->id])}}" class="btn btn-success">作成</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{--    削除ボタンをクリックした後の--}}
    {{--    確認アラート表示処理--}}
    <script>
        function deletePost(e) {
            'use strict'
            if (confirm('本当に削除してもいいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>

@endsection
