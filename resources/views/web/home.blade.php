@extends('layout.mainlayout')

@section('content')

<main id="main">
    @include('web.sections.hero')

    @include('web.sections.lost-pets')

    @include('web.sections.found-pets')

    @include('web.modals.preview-pet')

    @include('web.sections.about')

    @include('web.sections.contact')
</main>

@endsection