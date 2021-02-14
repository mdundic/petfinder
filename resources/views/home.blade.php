@extends('layout.mainlayout')
@section('content')

<main id="main">
    @include('layout.sections.hero')

    @include('layout.sections.lost-pets')

    @include('layout.sections.found-pets')

    @include('layout.modals.preview-pet')

    @include('layout.sections.about')
    
    @include('layout.sections.contact')
</main>

@endsection