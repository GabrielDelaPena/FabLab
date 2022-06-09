@extends('layouts.app')

@section('content')
<div class="container_form_student">
    <p class="form_student_title">Voeg nieuwe artikel toe</p>
    <form action="{{ route('producten.store') }}" class="form_new_student" method="post">
        @csrf
        <input type="text" class="input_student_text" placeholder="Naam" name="name">
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror

        <input type="number" class="input_student_number" placeholder="Prijs" name="price">
        @error('price')
        <p class="error">{{ $message }}</p>
        @enderror

        <textarea name="description" id="description" cols="30" rows="10" class="description"></textarea>
        @error('description')
        <p class="error">{{ $message }}</p>
        @enderror

        <button class="btn_add_student">Toevoegen</button>
    </form>
</div>
@endsection