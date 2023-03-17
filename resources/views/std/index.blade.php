@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 style="text-align: center">スクール管理</h2>
                <div class="mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <ul class="list-group list-group-horizontal" style="width: 30rem;">
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.index')}}">生徒管理</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.lesson')}}" style="color:dimgrey">レッスン管理</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.report')}}" style="color:dimgrey">レポート管理</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.contact')}}" style="color:dimgrey">連絡事項</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-center">

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
                                            学年<select name="grd">
                                                <option value="0" <?php if (!isset($grd)) {
                                                    echo "selected";
                                                } ?>>全て
                                                </option>
                                                <option value="1">小学1年生</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            コース<select name="course">
                                                <option value="0" <?php if (!isset($course)) {
                                                    echo "selected";
                                                } ?>>全て
                                                </option>
                                                <option value="1">Scratch</option>
                                                <option value="2">Unigy</option>
                                                <option value="3">WEB</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            時間<select name="time">
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
                        @foreach($stds as $key => $value)
                                <tr>
                                    <th scope="row">
                                        <div class="align-middle">{{$key+1}}</div>
                                    </th>
                                    <td>{{$value->name}}</td>
                                    <td>学年</td>
                                    <td>@if(isset($value->course)){{$value->course}}@endif</td>
                                    <td>@if(isset($value->term)){{$value->term}}:00-{{$value->term}}:50 @endif</td>
                                    <td><a type="button" class="btn btn-outline-info"
                                           href="{{route('std.show',['id' => $value->id])}}">詳細</a></td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
