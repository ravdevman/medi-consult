@extends("layouts.portal")
@section("title", "Portal - home")
@section("content")
    <h1>Patient Portal</h1>
    {{ session('success') }}

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
