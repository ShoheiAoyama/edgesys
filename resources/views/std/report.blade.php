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
                                        href="{{route('std.report')}}">レポート管理</a></li>
                                <li class="list-group-item" style="border: none;background-color: #f8fafc;"><a
                                        href="{{route('std.contact')}}" style="color:dimgrey">連絡事項</a></li>
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
{{--                        @foreach($stdlists as $key => $stdlist)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">--}}
{{--                                    <div class="align-middle">{{$key+1}}</div>--}}
{{--                                </th>--}}
{{--                                <td>{{$stdlist->name}}</td>--}}
{{--                                <td>学年</td>--}}
{{--                                <td>Unityコース</td>--}}
{{--                                <td>10:00-10:50</td>--}}
{{--                                <td><a type="button" class="btn btn-outline-info"--}}
{{--                                       href="{{route('std.show',['id' => $stdlist->id])}}">詳細</a></td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
