@extends('layouts.app')

@section('content')
<div class="container_form_student">
    <p class="form_student_title">Voeg nieuwe student toe</p>
    <form action="{{ route('student.store') }}" class="form_new_student" method="post">
        @csrf
        <input type="text" class="input_student_text" placeholder="Naam" name="name">
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror

        <input type="text" class="input_student_text" placeholder="Opleiding" name="education">
        @error('education')
        <p class="error">{{ $message }}</p>
        @enderror
        
        <button class="btn_add_student" type="submit">Toevoegen</button>
    </form>
</div>
@endsection