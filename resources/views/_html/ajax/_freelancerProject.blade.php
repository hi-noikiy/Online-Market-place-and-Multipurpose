<!-- Company Searrch Filter Start -->
{{--
<div class="row extra-mrg">
    <div class="wrap-search-filter">
        <form>
            <div class="col-md-4 col-sm-4">
                <input type="text" class="form-control" placeholder="Keyword: Name, Tag">
            </div>
            <div class="col-md-3 col-sm-3">
                <input type="text" class="form-control" placeholder="Location: City, State, Zip">
            </div>
            <div class="col-md-3 col-sm-3">
                <select class="selectpicker form-control" multiple title="All Categories">
                          <option>Information Technology</option>
                          <option>Mechanical</option>
                          <option>Hardware</option>
                        </select>

            </div>
            <div class="col-md-2 col-sm-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>
</div> --}}
<!-- Company Searrch Filter End -->
  @foreach($data['data'] as $item)
<div class="item-click">
    <article>
      
        <div class="brows-job-list">
            <div class="col-md-1 col-sm-2 small-padding">
                <div class="brows-job-company-img">
                    <a href="job-detail.html"><img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" /></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-5">
                <div class="brows-job-position">
                    <a href="job-apply-detail.html">
                        <h3>{{$item->title}}</h3>
                    </a>
                    <p>
                        {{-- <span>Google</span> --}}
                        <span class="brows-job-sallery"><i class="fa fa-money"></i>$810 - 900</span> {{-- <span class="job-type bg-trans-warning cl-warning">Part Time</span>                        --}}
                    </p>
                    <p><span class="cmp-time">End Date: {{$item->end_date}}</span></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="brows-job-location">
                    @if($item->location)
                    <p><i class="fa fa-map-marker"></i> {{$item->location}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="brows-job-link">
                    <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
                </div>
            </div>
        </div>
       
    </article>
</div>
 @endforeach {!! $data['data']->links() !!}
<!--/.row-->