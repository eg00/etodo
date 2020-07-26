@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

        </div>
        <div class="row">

            <div class="col-auto">
                <ul class="list-unstyled" id="ul-data">
                    <li>
                        <ul>
                            @foreach($users as $user)
                                @continue($user->manager_id)
                                <li>
                                    {{$user->username}}<span> - {{$user->name }}</span>
                                    @includeWhen(count($user->staff), 'usersTree', ['users' => $user->staff])
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <div id="chart-container"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script defer>
        document.addEventListener('DOMContentLoaded', function () {
            let orgchart = new OrgChart({
                'chartContainer': '#chart-container',
                'data': '#ul-data',
                'direction': 'l2r'
            });
        });
    </script>
@endsection
