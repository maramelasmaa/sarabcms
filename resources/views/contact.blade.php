@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <h1 class="breadcrumb-title">Contact us</h1>
    </div>
</div>

<div class="contant-section-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="contact-element">
                    <h3 class="title">Call us today</h3>
                    <p><a href="tel:+12029984099">+1(202)9984099</a></p>
                </div>
            </div>
            <div class="col-md-8">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6"><input type="text" placeholder="Name" class="form-control"></div>
                        <div class="col-md-6"><input type="email" placeholder="Email" class="form-control"></div>
                    </div>
                    <textarea class="form-control" placeholder="Message" rows="5"></textarea>
                    <button type="submit" class="btn btn-style1">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
