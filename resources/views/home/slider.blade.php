<section class="section first-section">

            <div class="container-fluid">
            
                <div class="masonry-blog clearfix">
                @foreach($sliderdata as $rs)
                    <div class="left-side">
                        <div class="masonry-box post-media">
                             <img  src="{{Storage::url($rs->image)}}" alt="" class="slider-image img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <h4><a href="{{route('art',['id'=>$rs->id])}}" title="">{{$rs->title}}</a></h4>
                                        <small><a  title=""><span class="rating">
                                                        @php
                                                        $average=$rs->comment->average('rate')
                                                        @endphp
                                                        <i class="fa fa-star @if ($average<1)  fa fa-star-o @endif"></i>
                                                        <i class="fa fa-star @if ($average<2)  fa fa-star-o @endif"></i>
                                                        <i class="fa fa-star @if ($average<3)  fa fa-star-o @endif"></i>
                                                        <i class="fa fa-star @if ($average<4)  fa fa-star-o @endif"></i>
                                                        <i class="fa fa-star @if ($average<5)  fa fa-star-o @endif"></i>
                                            </span></a></small>
                                        <small><a href="{{route('artuser',['id'=>$rs->user->id])}}" title="">{{$rs->user->name}}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->
                    @endforeach
                </div><!-- end masonry -->
                
            </div>
           
        </section>