<div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title font-heading" id="editTaskModalLabel">
                    {{__('Editing Task')}}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <div class="modal-body">
                <form id="add-product-form" method="POST" action="{{route('tasks.update', $task->id)}}"
                      aria-label="Добавление товара">
                    @method('PATCH')
                    @csrf
                    <div class="form-group mt-4">
                        <label for="title"
                               class="form-label text-md-right">{{__('Task title')}}:</label>
                        <input id="title" type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title" value="{{ old('title') ?? $task->title }}" required
                               autocomplete="title" autofocus
                               @cannot('edit-task', $task) readonly @endcannot>
                    </div>

                    <div class="form-group mt-4">
                        <label class="form-label text-md-right" for="taskDescription">{{__('Task Description')}}
                            :</label>
                        <textarea rows="3" name="text"
                                  class="form-control form-control-lg" id="taskDescription" required
                                  @cannot('edit-task', $task) readonly @endcannot>{{ old('text') ?? $task->text }}
                        </textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="priority">{{__('Status')}}</label>
                        <select name="status" class="form-control" id="priority">
                            <option value="new" {{$task->status === 'new' ? 'selected' : ''}}>
                                {{__('new')}}
                            </option>
                            <option value="in_progress" {{$task->status === 'in_progress' ? 'selected' : ''}}>
                                {{__('in_progress')}}
                            </option>
                            <option value="completed" {{$task->status === 'completed' ? 'selected' : ''}}>
                                {{__('completed')}}
                            </option>
                            <option value="canceled" {{$task->status === 'canceled' ? 'selected' : ''}}>
                                {{__('canceled')}}
                            </option>
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <label for="priority">{{__('Priority')}}</label>
                        @can('edit-task', $task)
                            <select name="priority" class="form-control" id="priority">
                                <option value="low" {{$task->priority === 'low' ? 'selected' : ''}}>
                                    {{__('low')}}
                                </option>
                                <option value="middle" {{$task->priority === 'middle' ? 'selected' : ''}}>
                                    {{__('middle')}}
                                </option>
                                <option value="high" {{$task->priority === 'high' ? 'selected' : ''}}>
                                    {{__('high')}}
                                </option>
                            </select>
                        @else
                            <input type="text" class="form-control" value="{{$task->priority}}" readonly/>
                        @endcan
                    </div>

                    <div class="form-group mt-4">
                        <label for="finish_at">{{__('Finish')}}</label>
                        <div class='input-group date' id='finaldatepicker'>
                            <input id="finish_at" name="finish_at" type='text' class="form-control"
                                   value="{{ old('finish_at') ?? $task->finish_at->format('d-m-Y H:i') }}"
                                   @can('edit-task', $task) data-field="datetime" @else readonly @endcan/>

                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{__('Edit task')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


