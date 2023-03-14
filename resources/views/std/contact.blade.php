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
                                        href="{{route('std.index')}}" style="color:dimgrey">生徒管理</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.lesson')}}" style="color:dimgrey">レッスン管理</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.report')}}" style="color:dimgrey">レポート管理</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.contact')}}">連絡事項</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-center">
                    <div class="mx-auto">
                        <div class="row justify-content-center mt-2 mb-3">
                            <div class="col-md-12 text-center">
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

                    <p>連絡事項</p>
                </div>
            </div>
        </div>
    </div>
@endsection
