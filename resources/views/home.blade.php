@extends('layout.mainlayout')
@section('content')

<main id="main">

	{{var_dump($pet_colors)}} <br>
	{{var_dump($pet_sizes)}} <br>
	{{var_dump($pet_types)}} <br>
	{{var_dump($locations)}} <br>

    @include('layout.sections.hero')
    @include('layout.sections.lost-pets')
    @include('layout.sections.about')
    @include('layout.sections.contact')
</main>

@endsection