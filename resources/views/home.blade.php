@extends('layout.mainlayout')
@section('content')

<main id="main">
    @include('layout.sections.hero')

    @include('layout.sections.lost-pets'), [
        'pet_colors' => $pet_colors,
        'pet_sizes' => $pet_sizes,
        'pet_types' => $pet_types,
        'locations' => $locations
    ])

    @include('layout.sections.found-pets'), [
        'pet_colors' => $pet_colors,
        'pet_sizes' => $pet_sizes,
        'pet_types' => $pet_types,
        'locations' => $locations
    ])

    @include('layout.sections.about')
    
    @include('layout.sections.contact')
</main>

@endsection