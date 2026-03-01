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
    <div class="container"> <div class="projects-page-row">
            @foreach($projects as $index => $project)
            <div class="project-item {{ $index % 2 != 0 ? 'flex-reverse' : '' }}">

                <div class="project_index">0{{ $index + 1 }}</div>

                <div class="project__img_container">
                    <div class="image-wrapper">
                        <img class="img-fluid"
                             src="{{ asset('storage/' . $project->image_path) }}"
                             alt="{{ $project->title }}"
                             loading="lazy">
                    </div>
                </div>

                <div class="project__info_content">
                    <span class="case_category">{{ $project->category }}</span>
                    <h2 class="project_title">{{ $project->title }}</h2>
                    <div class="project_description">
                        <p>{{ $project->description }}</p>
                    </div>
                    <div class="project-button">
                        <a href="#" class="explore-btn"><span>Explore Details</span></a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    /* Section Spacing */
    .portfolio-section-page {
        padding: 80px 0;
        background-color: #fff;
        overflow: hidden;
    }

    /* Main Row Setup */
    .project-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 120px;
        position: relative;
        gap: 50px;
    }

    /* Alternating Layout */
    .flex-reverse {
        flex-direction: row-reverse;
    }

    /* Image Styling */
    .project__img_container {
        flex: 1;
        display: flex;
        justify-content: center;
        z-index: 2;
    }

    .image-wrapper {
        width: 450px;
        height: 450px;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        border: 8px solid #f8f9fa;
    }

    .image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .image-wrapper:hover img {
        transform: scale(1.1);
    }

    /* Content Styling */
    .project__info_content {
        flex: 1;
        z-index: 2;
    }

    .case_category {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #666;
        display: block;
        margin-bottom: 10px;
    }

    .project_title {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #222;
    }

    .project_description {
        font-size: 18px;
        line-height: 1.6;
        color: #555;
        margin-bottom: 30px;
    }

    /* Huge Background Number */
    .project_index {
        position: absolute;
        font-size: 250px;
        font-weight: 900;
        color: rgba(0, 0, 0, 0.03); /* Very faint grey */
        top: -50px;
        left: -20px;
        line-height: 1;
        z-index: 1;
        pointer-events: none;
        user-select: none;
    }

    .flex-reverse .project_index {
        left: auto;
        right: -20px;
    }

    /* Button Styling */
    .explore-btn {
        display: inline-block;
        padding: 12px 30px;
        border-bottom: 2px solid #222;
        text-decoration: none;
        color: #222;
        font-weight: 600;
        transition: all 0.3s;
    }

    .explore-btn:hover {
        background: #222;
        color: #fff;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .project-item, .flex-reverse {
            flex-direction: column;
            text-align: center;
            gap: 30px;
        }
        .image-wrapper {
            width: 300px;
            height: 300px;
        }
        .project_index {
            font-size: 150px;
            top: 0;
        }
    }
</style>

@endsection
