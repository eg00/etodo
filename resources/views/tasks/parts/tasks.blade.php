<div class="list-group">
    @foreach($tasks as $task)
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 {{$task->css_class}}">
                    {{$task->title}}
                </h5>
                <small>{{__('Priority')}}: {{__($task->priority)}}</small>
            </div>

            <p>{{__('Finish ')}}{{$task->finish_at}}</p>
            <p>{{__('Responsible')}}: {{__($task->name)}}</p>

            <p>{{__('Status')}}: {{__($task->status)}}</p>
        </a>
    @endforeach
</div>
