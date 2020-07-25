@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tasks') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                {{ __('Group by') }}
                            </div>
                            <div class="col">
                                <div class="btn-group mb-3" role="group">
                                    <a href="{{route('tasks.index')}}?groupBy=date" type="button"
                                       class="btn btn-outline-primary {{ $groupBy === 'date' ? 'active' : '' }}">
                                        {{__('By date')}}
                                    </a>
                                    @if(auth()->user()->staff()->exists())
                                        <a href="{{route('tasks.index')}}?groupBy=name" type="button"
                                           class="btn btn-outline-primary {{ $groupBy === 'name' ? 'active' : '' }}">
                                            {{__('By responsible')}}
                                        </a>
                                    @endif
                                    <a href="{{route('tasks.index')}}" type="button"
                                       class="btn btn-outline-primary {{ $groupBy === null ? 'active' : '' }}">
                                        {{__('Without groups')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @isset($groupBy)
                            @includeIf('tasks.parts.group', ['groups' => $tasks])
                        @endisset
                        @empty($groupBy)

                            @includeIf('tasks.parts.tasks')
                        @endempty
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTaskModal">
                            {{__('New task')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@include('tasks.modals.addTaskModal')
