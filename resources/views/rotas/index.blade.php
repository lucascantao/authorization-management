@extends('app')
@section('content')

<div>
    <table border="1">
        <thead>
            <tr>
                <tr>#</tr>
                <tr>name</tr>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user) 
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
            @endforeach
        </tbody>
    </table>
</div>

@endsection