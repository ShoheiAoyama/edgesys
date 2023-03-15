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
                        {{--                        <tr>--}}
                        {{--                            <th scope="row">生徒氏名</th>--}}
                        {{--                            <td><input type="text" name="name"></td>--}}
                        {{--                        </tr>--}}
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>フリガナ
                            </th>
                            <td><input type="text" name="kana"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>性別
                            </th>
                            <td><select name="sex">
                                    <option value="">---</option>
                                    <option value="1">男の子</option>
                                    <option value="2">女の子</option>
                                    <option value="3">その他</option>
{{--                                    <option value="3"><?php echo $std->id; ?></option>--}}
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>コース
                            </th>
                            <td><select name="course">
                                    <option value="">---</option>
                                    <option value="1">Scratch</option>
                                    <option value="2">Unity</option>
                                    <option value="3">WEB</option>
                                    <option value="4">その他</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>月回数
                            </th>
                            <td><select name="times">
                                    <option value="">---</option>
                                    <option value="1">スタンダード(2回)</option>
                                    <option value="2">ライト(4回)</option>
                                    <option value="3">プレミアム(個別4回)</option>
                                    <option value="4">その他</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>レッスン曜日
                            </th>
                            <td><select name="week">
                                    <option value="">---</option>
                                    @foreach($weeks as $key => $week)
                                        <option value="{{$key}}">{{$week}}</option>
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
                                        <option value="{{$i}}">{{$i}}:00〜{{$i+1}}:50</option>
                                    @endfor
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="hissu">必須</span>レッスンチーム
                            </th>
                            <td><select name="team">
                                    <option value="">---</option>
                                    @foreach($teams as $key => $team)
                                        <option value="{{$key}}">{{$team}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                保護者様1
                            </th>
                            <td><input type="text" name="pname1"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                保護者様1属性
                            </th>
                            <td><input type="text" name="lrt1"></td>
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
                            <td><input type="text" name="lrt2"></td>
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
                            <td><input type="text" name="pref"></td>
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
                            <td><input type="text" name="date"></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                好きな教科
                            </th>
                            <td><input type="text" name="sub"></td>
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

</style>
