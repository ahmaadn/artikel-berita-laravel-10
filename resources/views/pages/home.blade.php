@extends('layouts.default')

@section('title')
Next News | Home
@endsection

@section('content')
<main>
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>Kategori</h3>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        @foreach ($categories as $category)
                                            <a class="nav-item nav-link" id="nav-{{$category->id}}-tab" data-toggle="tab"
                                                href="#nav-{{{$category->id}}}" role="tab"
                                                aria-controls="nav-{{{$category->id}}}"
                                                aria-selected="false">{{$category->name}}</a>
                                        @endforeach
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <!-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src='{{asset("assets/img/news/whatNews1.jpg")}}' alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src='{{asset("assets/img/news/whatNews2.jpg")}}' alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src='{{asset("assets/img/news/whatNews3.jpg")}}' alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src='{{asset("assets/img/news/whatNews4.jpg")}}' alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                @foreach ($categories as $category)
                                    <div class="tab-pane fade" id="nav-{{$category->id}}" role="tabpanel"
                                        aria-labelledby="nav-{{$category->id}}-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                @foreach ($category->articles->take(4) as $article)
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="single-what-news mb-100">
                                                            <div class="what-img">
                                                                <img src='{{asset($article->image)}}' alt="{{$article->title}}">
                                                            </div>
                                                            <div class="what-cap">
                                                                <h4><a href="{{route('articles.detail', $article->id)}}">
                                                                        {{ Str::limit($article->content, 30)}}
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--  Recent Articles start -->
    <div class="recent-articles">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Recent Articles</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            @foreach ($articles as $article)
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src='{{asset($article->image)}}' alt="{{$article->title}}">
                                    </div>
                                    <div class="what-cap">
                                        <h4><a href="{{route('articles.detail', $article->id)}}">{{$article->title}}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Recent Articles End -->
</main>
@endsection
