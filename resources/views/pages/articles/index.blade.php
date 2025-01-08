@extends('layouts.default')

@section('title')
Next News | titile here
@endsection

@section('content')

<!-- About US Start -->
<div class="about-area ">
    <div class="container">
        <!-- Hot Aimated News Tittle-->
        <div class="row mt-20">
            <div class="col-lg-8">
                <!-- Trending Tittle -->
                <div class="about-right mb-90">
                    <div class="about-img">
                        <img src="{{asset($article->image)}}" alt="">
                    </div>
                    <div class="section-tittle mb-30 pt-30">
                        <h3>{{$article->title}}</h3>
                    </div>
                    <div class="about-prea">
                        <p class="about-pera1 mb-25">{{$article->content}}</p>
                    </div>
                    <!-- From -->
                    <div class="row">
                        <div class="col-lg-8">
                            <form class="form-contact contact_form mb-80" action="contact_process.php" method="post"
                                id="contactForm" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100 error" name="message" id="message"
                                                cols="30" rows="9" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Message'"
                                                placeholder="Enter Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control error" name="name" id="name" type="text"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter your name'"
                                                placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control error" name="email" id="email" type="email"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control error" name="subject" id="subject" type="text"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
