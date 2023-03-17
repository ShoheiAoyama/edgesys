@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 style="text-align: center">生徒管理ページ</h2>
                <div class="mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
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
<!--                --><?php //var_dump($std);
//                exit; ?>
                <div class="card mx-auto mb-5 mt-3" style="max-width: 600px;margin: auto;text-align: center">
                <table class="table table-borderless c2-table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">生徒名</th>
                        <th scope="col">生徒ID</th>
                        <th scope="col">パスワード</th>
                        <th scope="col">表示</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$std->name}}</th>
                        <td>{{$std->stdid}}</td>
                        <td>{{$std->psw}}</td>
                        <td>{{$std->id}}</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <form method="POST" action="{{route('std.update2', ['id' => $std2->id])}}">
                    @csrf
                    <table class="table" style="max-width: 600px;margin: auto">
                        <tbody>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>フリガナ
                            </th>
                            <td><input type="text" name="kana" value="{{$std2->kana}}"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>性別
                            </th>
                            <td><select name="sex">
                                    <option value="">---</option>
                                    <option value="0" @if($std2->sex == 0) selected @endif>男の子</option>
                                    <option value="1" @if($std2->sex == 1) selected @endif>女の子</option>
                                    <option value="2" @if($std2->sex == 2) selected @endif>その他</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>コース
                            </th>
                            <td><select name="course">
                                    <option value="">---</option>
                                    <option value="0" @if($std2->course == 0) selected @endif>Scratch</option>
                                    <option value="1" @if($std2->course == 1) selected @endif>Unity</option>
                                    <option value="2" @if($std2->course == 2) selected @endif>WEB</option>
                                    <option value="3" @if($std2->course == 3) selected @endif>その他</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>月回数
                            </th>
                            <td><select name="times">
                                    <option value="">---</option>
                                    <option value="0" @if($std2->times == 0) selected @endif>スタンダード(2回)</option>
                                    <option value="1" @if($std2->times == 1) selected @endif>ライト(4回)</option>
                                    <option value="2" @if($std2->times == 2) selected @endif>プレミアム(個別4回)</option>
                                    <option value="3" @if($std2->times == 3) selected @endif>その他</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>レッスン曜日
                            </th>
                            <td><select name="week">
                                    <option value="">---</option>
                                    @foreach($weeks as $key => $value)
                                        <option value="{{$key}}" @if($std2->weeks == $key) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>レッスン時間
                            </th>
                            <td><select name="term">
                                    <option value="">---</option>
                                    @for($i=10;$i<20;$i++)
                                        <option value="{{$i}}" @if($std2->term == $i) selected @endif>{{$i}}:00〜{{$i}}:50</option>
                                    @endfor
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>レッスンチーム
                            </th>
                            <td><select name="team">
                                    <option value="">---</option>
                                    @foreach($teams as $key => $value)
                                        <option value="{{$key}}" @if($std2->team == $key) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                保護者様1
                            </th>
                            <td><input type="text" name="pname1" value="@if(isset($std2->pname1)){{$std2->pname1}}@endif"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                保護者様1属性
                            </th>
                            <td><select name="rlt1">
                                    <option value="">---</option>
                                    @foreach($rlts as $key => $value)
                                        <option value="{{$key}}" @if($std2->rlt1 == $key) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                保護者様2
                            </th>
                            <td><input type="text" name="pname2"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                保護者様2属性
                            </th>
                            <td><select name="rlt2">
                                    <option value="">---</option>
                                    @foreach($rlts as $key => $value)
                                        <option value="{{$key}}" @if($std2->rlt2 == $key) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                郵便番号
                            </th>
                            <td><input type="text" name="post"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                都道府県
                            </th>
                            <td><select name="pref">
                                    <option value="">---</option>
                                    @foreach($prefs as $key => $value)
                                        <option value="{{$key}}" @if($std2->pref == $key) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                住所
                            </th>
                            <td><input type="text" name="add"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                入会日
                            </th>
                            <td><input type="date" name="date"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                好きな教科
                            </th>
                            <td><select name="sub">
                                    <option value="">---</option>
                                    @foreach($subs as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                好きなモノ1
                            </th>
                            <td><input type="text" name="favorite1"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                好きなモノ2
                            </th>
                            <td><input type="text" name="favorite2"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                備考1
                            </th>
                            <td><input type="text" name="memo1"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                備考2
                            </th>
                            <td><input type="text" name="memo2"></td>
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
<style>
    .hissu {
        color: white;
        background-color: red;
        padding: 3px;
        margin-right: 3px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: lighter;;
    }
    .c2-table th{
        width: 200px;
    }
    .c2-table td{
        width: 400px;
    }
</style>
