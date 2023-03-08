@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 style="text-align: center">生徒管理ページ</h2>
{{--                <nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">--}}
{{--                        <div class="navbar-nav">--}}
{{--                            <a class="nav-item nav-link active" href="#">TOP<span class="sr-only">(current)</span></a>--}}
{{--                            <a class="nav-item nav-link" href="#">新規作成</a>--}}
{{--                            <a class="nav-item nav-link" href="#">授業レポート</a>--}}
{{--                            <a class="nav-item nav-link" href="#">生徒検索</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </nav>--}}
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a href="{{route('std.index')}}">TOP</a></li>
                    <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a href="{{route('std.create')}}" style="color:dimgrey">新規作成</a></li>
                    <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a href="{{route('std.index')}}" style="color:dimgrey">授業レポート</a></li>
                    <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a href="{{route('std.index')}}" style="color:dimgrey">生徒検索</a></li>
                </ul>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">学年</th>
                        <th scope="col">コース</th>
                        <th scope="col">レッスン時間</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>@mdo</td>
                    </tr>
                    </tbody>
                </table>

{{--                <div class="card">--}}
{{--                    <div class="card-header">生徒一覧</div>--}}
{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
@endsection
