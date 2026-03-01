@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container text-white py-5">
    <h1>Welcome to Sarab Tech</h1>
    <p>This is the homepage. Use the navigation to browse the portfolio or contact us.</p>
</div>

<div class="portfolio-section-page">
    <div class="projects-page-row">
        @foreach($projects as $index => $project)
        <div class="project-row {{ $index % 2 != 0 ? 'project-row-right' : '' }}">
            <div class="project_index">0.{{ $index + 1 }}</div>
            <div class="project__img">
                <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
            </div>
            <div class="container">
                <div class="info-row__info">
                    <span class="case_tt">{{ $project->category }}</span>
                    <h2 class="info-row__title">{{ $project->title }}</h2>
                    <div class="project-desc"><p>{{ $project->description }}</p></div>
                    <div class="project-button">
                        <a href="#"><span>Explore Details</span></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
