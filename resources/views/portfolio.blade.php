@extends('layouts.app')
@section('title', 'Portfolio')
@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <h1 class="breadcrumb-title">Our Projects</h1>
        <ul class="page-list">
            <li><a href="/">Home</a></li>
            <li class="separator">/</li>
            <li>Portfolio</li>
        </ul>
    </div>
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
