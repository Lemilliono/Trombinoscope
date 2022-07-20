@extends('layouts.default')

@section('main')
    @php
    $users = DB::select('select * from users');
    @endphp
            <div class="trombinoscope">
                    <div>
                       @foreach($users as $user)
                        <div class="title">
                            <p>{{ $user->login }}</p>
                        </div>
                        <div class="image">
                           <img src = "https://auth.etna-alternance.net/api/users/{{ $user->login }}/photo">
                       </div>
                       @endforeach
                    </div>
            </div>



@endsection