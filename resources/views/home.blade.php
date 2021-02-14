@extends('layout.mainlayout')
@section('content')

<main id="main">

    {{var_dump($locations)}} <br>

    @include('layout.sections.hero')
    @include('layout.sections.lost-pets'), ['pet_colors' => $pet_colors, 'pet_sizes' => $pet_sizes, 'pet_types' => $pet_types, 'locations' => $locations] )
    @include('layout.sections.about')
    @include('layout.sections.contact')
</main>

@endsection