@extends('welcome')

@section('content')

    <index :categories="{{$categories}}" :posts="{{ $posts }}"></index>

@endsection