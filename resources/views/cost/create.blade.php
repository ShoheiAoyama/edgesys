@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 style="text-align: center">生徒管理ページ</h2>
                <form method="POST" action="{{route('cost.store')}}">
                    @csrf
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>日付</th>
                            <td><input type="date" name="cdate"></td>
                        </tr>
                        <tr>
                            <th>項目</th>
                            <td><select name="item1">
                                    <option value="">---</option>
                                    @foreach($items as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <th>内容</th>
                            <td><input type="text" name="del"></td>
                        </tr>
                        <tr>
                            <th>金額</th>
                            <td><input type="text" name="fee"></td>
                        </tr>
                        <tr>
                            <th>担当</th>
                            <td><input type="text" name="staff"></td>
                        </tr>
                    </table>
                    <div style="display: block;text-align: right">
                        <input class="btn btn-success" type="submit" value="登録">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
