@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="text-center">編集ページだよ</h1>

    <!-- タスク編集フォーム -->
    <form action="{{ url('/tasks'.'/'.$tasks->id)}}"
        method="POST"
        class="form-horizontal">
         @csrf
         @method('PUT')
            <!-- 元のタスク名 -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">タスク</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $tasks->name }}">
                </div>
            </div>

            <!--優先順位ボタン-->
            <div class="form-group col-sm-4　text-center">
                <div class="text-center">
                    現在の優先度：@if($tasks->priority == "HI")高
                                @elseif($tasks->priority == "MID")中
                                @elseif($tasks->priority == "LOW")低
                                @endif

    　               更新後：<input type="radio" name="priority" id="pri1" value="HI" @if($tasks->priority == "HI") checked @endif>
                            <label for="pri1">高</label>

                            <input type="radio" name="priority" id="pri2" value="MID" @if($tasks->priority == "MID") checked @endif>
                            <label for="pri2">中</label>

                            <input type="radio" name="priority" id="pri3" value="LOW"@if($tasks->priority == "LOW") checked @endif>
                            <label for="pri3">低</label>
                </div>
            </div>

            <!-- タスク変更ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-repeat"></i> タスク変更
                    </button>
                </div>
            </div>
    </form>
    </div>
</div>

@endsection
