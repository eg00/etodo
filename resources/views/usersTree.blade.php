<ul class="">
    @foreach($users as $user)
        <li>
            {{$user->username}}<span> - {{$user->name }}</span>
            @if(count($user->staff))
                @include('usersTree',['users' => $user->staff])
            @endif
        </li>
    @endforeach
</ul>
