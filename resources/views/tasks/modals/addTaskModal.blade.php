<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title font-heading" id="addTaskModalLabel">
                    {{__('Adding Task')}}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <div class="modal-body">
                <form id="add-product-form" method="POST" action="{{route('tasks.store')}}">
                    @csrf
                    <div class="form-group mt-4">
                        <label for="title"
                               class="form-label text-md-right">{{__('Task title')}}:</label>
                        <input id="title" type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title" value="{{ old('title') }}" required
                               autocomplete="title" autofocus>
                    </div>

                    <div class="form-group mt-4">
                        <label class="form-label text-md-right" for="taskDescription">{{__('Task Description')}}
                            :</label>
                        <textarea rows="3" name="text"
                                  class="form-control form-control-lg" id="taskDescription"
                                  required></textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="priority">{{__('Priority')}}</label>
                        <select name="priority" class="form-control" id="priority">
                            <option value="low">{{__('low')}}</option>
                            <option value="middle">{{__('middle')}}</option>
                            <option value="high">{{__('high')}}</option>
                        </select>
                    </div>
                    @if(count(auth()->user()->staff))
                        <div class="form-group mt-4">
                            <label for="responsible">{{__('Responsible')}}</label>
                            <select name="user_id" class="form-control" id="priority">
                                <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                                @foreach(auth()->user()->staff as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group mt-4">
                        <label for="finish_at">{{__('Finish')}}</label>
                        <div class='input-group date' id='finaldatepicker'>
                            <input id="finish_at" name="finish_at" type='text' class="form-control"
                                   data-field="datetime"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{__('Add task')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

