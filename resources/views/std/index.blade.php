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
                                        href="{{route('std.index')}}">TOP</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.create')}}" style="color:dimgrey">新規作成</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.index')}}" style="color:dimgrey">授業レポート</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.index')}}" style="color:dimgrey">生徒検索</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-center">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr style="text-align: center;">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">学年</th>
                            <th scope="col">コース</th>
                            <th scope="col">レッスン時間</th>
                            <th scope="col">詳細</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stdlists as $key => $stdlist)
                            <tr>
                                <th scope="row">
                                    <div class="align-middle">{{$key+1}}</div>
                                </th>
                                <td>{{$stdlist->name}}</td>
                                <td>学年</td>
                                <td>Unityコース</td>
                                <td>10:00-10:50</td>
                                <td><a type="button" class="btn btn-outline-info"
                                       href="{{route('std.show',['id' => $stdlist->id])}}">詳細</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
