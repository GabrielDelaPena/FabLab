@extends('layouts.app')

@section('content')
<div class="container_admin">
    <div class="section_student">
        <p class="list_title">Studenten</p>
        <div class="list">
            @if (count($students) > 0)
            @foreach($students as $student)
            <div class="student">
                <div class="name_uuid">
                    <p class="name">{{ $student->name }}</p>
                    <p class="uuid">{{ $student->id }}</p>
                    <p class="balance">€ {{ $student->balance }}</p>
                </div>
                <form action="{{ route('student.destroy', $student->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn_list btn_link_text" type="submit">Verwijderen</button>
                </form>
            </div>
            @endforeach
            @else
            <p>Geen student actief.</p>
            @endif
        </div>
        <button class="btn_add"><a href="{{ route('student.create') }}" class="btn_link_text">Voeg student toe</a></button>
    </div>

    <div class="section_item">
        <p class="list_title">Artikels</p>
        <div class="list">
            @if (count($products) > 0)
            @foreach($products as $product)
            <div class="item">
                <a href="{{ route('admin.edit', ['admin' => $product->id]) }}" class="name_item">{{ $product->name }}</a>
                <form action="{{ route('producten.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn_list btn_link_text" type="submit">Verwijderen</button>
                </form>
            </div>
            @endforeach
            @else
            <p>Geen producten in stock.</p>
            @endif
        </div>
        <button class="btn_add"><a href="{{ route('producten.create') }}" class="btn_link_text">Voeg artikel toe</a></button>
    </div>
</div>
@endsection