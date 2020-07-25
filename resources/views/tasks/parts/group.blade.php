@foreach($groups as $name => $tasks)
    <h3 class="mt-3">{{__($name)}}:</h3>
    @includeIf('tasks.parts.tasks')
@endforeach
