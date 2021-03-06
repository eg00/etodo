<div class="list-group">
    @foreach($tasks as $task)
        <a href="{{route('tasks.edit', $task->id)}}" class="list-group-item list-group-item-action i-task-edit">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 {{$task->css_class}}">
                    {{$task->title}}
                </h5>
                <small>{{__('Priority')}}: {{__($task->priority)}}</small>
            </div>

            <p>{{__('Finish')}}: {{$task->finish_at->format('d.m.Y')}}</p>
            <p>{{__('Responsible')}}: {{__($task->name)}}</p>

            <p>{{__('Status')}}: {{__($task->status)}}</p>
        </a>
    @endforeach
</div>
