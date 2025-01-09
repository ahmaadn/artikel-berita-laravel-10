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
                        <small>Author : {{$article->user->name}}</small> <br>
                        <small>Date : {{$article->created_at}}</small>
                        <small>Categori : {{$article->category->name}}</small> <br>
                    </div>
                    <div class="about-prea">
                        <p class="about-pera1 mb-25">{{$article->content}}</p>
                    </div>
                    <!-- Like Button -->

                    <button type="submit" class="btn btn-primary" @class(['liked' => $like]) id="btn-like">
                        Like <span id="like-count">{{ $article->likes->count() }}</span>
                    </button>
                    <div class="section-tittle mb-30 pt-30">
                        <h3>Komentar</h3>
                    </div>
                    @foreach ($article->comments as $comment)
                        <div class="card text-body mt-10">
                            <div class="card-body ">
                                <div class="d-flex flex-start">
                                    <div>
                                        <h6 class="fw-bold mb-1">{{$comment->user->name}}</h6>
                                        <div class="d-flex align-items-center mb-3">
                                            <p class="mb-0">
                                                {{$comment->created_at}}
                                            </p>
                                        </div>
                                        <p class="mb-0">
                                            {{$comment->messange}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row mt-10">
                        <div class="col-12">
                            <form class="form-contact contact_form" action="{{route('comments.store', $article->id)}}"
                                id="contactForm" novalidate="novalidate" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100 error" id="message" name="messange"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Message'"
                                                placeholder="Enter Message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        const btnLike = document.getElementById('btn-like')
        const likeCount = document.getElementById('like-count')
        btnLike.addEventListener('click', () => {
            if (btnLike.classList.contains('liked')) {
                fetch('{{ route('articles.dislike', $article->id) }}', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                }).then(response => response.json())
                    .then(data => {
                        likeCount.innerText = data.likes_count;
                        btnLike.classList.remove('liked')
                    });
            } else {
                fetch('{{ route('articles.like', $article->id) }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                }).then(response => response.json())
                    .then(data => {
                        likeCount.innerText = data.likes_count;
                        btnLike.classList.add('liked')
                    });
            }
        })
    </script>

@endpush