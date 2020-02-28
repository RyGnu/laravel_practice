@if(count($tasks[$key])>0)
@switch($key)
{{-- @case('tasks_over_pri1')
    <tr>
        <td class="bg-danger text-white">優先度:高</td>
    </tr>
    @break
@case('tasks_over_pri2')
    <tr>
        <td class="bg-primary text-white">優先度:中</td>
    </tr>
    @break
@case('tasks_over_pri3')
    <tr>
        <td class="bg-success text-white">優先度:低</td>
    </tr>
    @break --}}
@case('tasks_pri1')
    <tr>
        <td class="bg-danger text-white">優先度:高</td>
    </tr>
    @break
@case('tasks_pri2')
    <tr>
        <td class="bg-primary text-white">優先度:中</td>
    </tr>
    @break
@case('tasks_pri3')
    <tr>
        <td class="bg-success text-white">優先度:低</td>
    </tr>
    @break
@endswitch
@endif
