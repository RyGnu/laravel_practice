@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="col-sm -offset-3 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新しいタスク
                </div>
                <div class="panel-body">

                     <!-- バリデーションエラーの表示 -->
                     @include('common.errors')

                    <!-- 新タスクフォーム -->
                    <form action="{{ url('tasks')}}" method="POST" class="form-horizontal">
                        @csrf

                        <div class="row">
                            <!-- タスク名 -->
                            <div class="form-group col-sm-8">
                                <label for="task-name" class="col-sm-3 control-label">タスク</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                                </div>
                            </div>

                            <!--優先順位ボタン-->
                            <div class="form-group col-sm-4">
                                優先度
                                <input type="radio" name="priority" id="pri1" value="HI">
                                <label for="pri1">高</label>

                                <input type="radio" name="priority" id="pri2" value="MID" checked>
                                <label for="pri2">中</label>

                                <input type="radio" name="priority" id="pri3" value="LOW">
                                <label for="pri3">低</label>
                            </div>
                        </div>

                            <!-- 期限日入力 -->

                            <label for="limit">期日</label>
                            <input type="date" name="limit" id="limit"
                             value="@php echo date("Y-m-d")@endphp" required>


                        <!-- タスク追加ボタン -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i> タスク追加
                                </button>
                            </div>
                        </div>
                     </form>

                </div>
            </div>
            <!--現在のタスク -->
            @if ($task_exit)

                <div class="panel panel-default">
                   <div class="panel-heading">
                       現在のタスク
                    </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                      <!-- テーブルヘッダ -->
                    <thead>
                        <tr>
                           <th>期日</th>
                           <th>タスク</th>
                           <th>&nbsp;</th>
                         </tr>
                   </thead>
                    <!-- テーブル本体 -->
                   <tbody>

                      @foreach ($tasks as $key => $value)
                      @include('add_priority_to_table')
                        @foreach ($value as $task)

                        <tr>
                            <!--期日表示-->
                            <td>
                                <div>{{ $task->limit }}

                              @if($task->over_limit)<span style="color:red">Too Later!</span>@endif

                                </div>
                            </td>

                            <!--タスクの表示-->
                            <td class="table-text">
                                <div id = "change_color">{{ $task->name }}</div>
                            </td>

                            <!-- 編集ボタン -->
                            <td>
                                <form action="{{ url('/tasks'.'/'.$task->id.'/edit')}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-btn fa-pencil-square-o"></i> 編集
                                    </button>
                                </form>
                            </td>

                            <!-- 削除ボタン -->
                            <td>
                                <form action="{{ url('tasks/'.$task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
        　                              <i class="fa fa-btn fa-trash"></i>　削除
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                      @endforeach
                    </tbody>
                    </table>
                </div>
              </div>
            @endif
        </div>
    </div>

<style>
    .colorborder{
        border-left: 10px;
        border-color: red;

    }

 </style>

<script>
    $(function()){


        if($tasks->priority == "HI") {
            $(”#change_color”).addClass(”colorborder”);


        }
        elseif($tasks->priority == "MID") {
            $(”#change_color”);

        }elsef($tasks->priority == "LOW") {
            $(”#change_color”);

        }



    });

</script>


@endsection
