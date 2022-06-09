@extends('layouts.app')

@section('content') 
<div class="container_form_student">
    <p class="form_student_title">Voeg nieuwe artikel toe</p>
    <form action="{{ route('admin.update', ['admin' => $product->id]) }}" class="form_new_student" method="post">
        @csrf
        @method('PUT')
        <input type="text" class="input_student_text" value="{{ $product->name }}" name="name">
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror

        <input type="number" class="input_student_number" value="{{ $product->price }}" name="price">
        @error('price')
        <p class="error">{{ $message }}</p>
        @enderror

        <textarea name="description" id="description" cols="30" rows="10" class="description">{{ $product->description }}</textarea>
        @error('description')
        <p class="error">{{ $message }}</p>
        @enderror

        <button class="btn_add_student">Opslaan</button>
    </form>
</div>
@endsection