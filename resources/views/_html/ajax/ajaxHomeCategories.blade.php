@foreach ($data['categories'] as $category)
<div class="col-md-3 col-sm-6">
    <div class="category-box" data-aos="fade-up">
        <div class="category-desc">
            <div class="category-icon">
                <i class="{{$category->icon}}" aria-hidden="true"></i>
                <i class="{{$category->icon}} abs-icon" aria-hidden="true"></i>
            </div>

            <div class="category-detail category-desc-text">
                <h4> <a href="{{URL::to('/JobByCategory/'.$category->slug)}}">{{$category->name}}</a></h4>
                <p></p>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="col-md-12">
    {!! $data['categories']->links() !!}
</div>