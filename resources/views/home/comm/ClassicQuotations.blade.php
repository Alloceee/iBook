<div id="testimonials">
    <div class="container">
        <div class="section-title text-center">
            <h2>热门评论</h2>
        </div>
        <div class="row">
            @foreach( $comm as $value)
                <div class="col-md-4" style="height: 170px;">
                    <div class="testimonial">
                        <div class="testimonial-image">
                            <a href="{{ route('user',['username'=>$value->author]) }}" target="_blank">
                                <img src="{{ URL::asset( $value->icon) }}" alt="">
                            </a></div>
                        <div class="testimonial-content">
                            <p>{{ $value->CContent }}</p>
                            <a href="{{ route('article',['id'=>$value->aid]) }}" target="_blank">
                                <div class="testimonial-meta"> - 《{{ $value->title }}》</div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>