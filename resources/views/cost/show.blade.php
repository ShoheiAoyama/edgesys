@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 style="text-align: center">経費管理</h2>

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
                                <th scope="col">日付</th>
                                <th scope="col">{{$costLists->cdate}}</th>
                            </tr>
                            <tr>
                                <th scope="col">ジャンル</th>
                                <th scope="col"></th>
                            </tr>
                            <tr>
                                <th scope="col">項目</th>
                                <th scope="col">{{$costLists->item1}}</th>
                            </tr>
                            <tr>
                                <th scope="col">内容</th>
                                <th scope="col">{{$costLists->del}}</th>
                            </tr>
                            <tr>
                            <th scope="col">金額</th>
                            <th scope="col">{{$costLists->fee}}</th>
                            </tr>
                            <tr>
                                <th scope="col">金額</th>
                                <th scope="col">{{$costLists->staff}}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row text-center justify-content-md-center mb-3">
                        <div class="col-3">
                            <form method="GET" action="{{route('cost.edit', ['id' => $costLists->id])}}">
                                @csrf
                                {{--                    <div style="display: block;text-align: right">--}}
                                <input class="btn btn-success" type="submit" value="変更">
                                {{--                    </div>--}}
                            </form>
                        </div>
                        <div class="col-3">
                            <form method="POST" action="{{route('cost.destroy',['id' => $costLists->id])}}"
                                  id="delete_{{$costLists->id}}">
                                @csrf
                                <a href="#" class="btn btn-danger" data-id="{{$costLists->id}}"
                                   onclick="deletePost(this)">削除</a>
                            </form>
                        </div>
                    </div>{{--row--}}
                </div>{{--card--}}
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
