@extends('_html.layouts.app') 
@section('title', 'Freelancer Details') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(http://via.placeholder.com/1920x850);">
    <div class="container">
        <h1>Resume Detail</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Resume Detail Start -->
<section class="detail-desc">
    <div class="container white-shadow">
        <div class="row mrg-0">
            <div class="detail-pic">
                <img src="http://via.placeholder.com/150x150" class="img" alt="" />
                <a href="#" class="detail-edit" title="edit"><i class="fa fa-pencil"></i></a>
            </div>
            <div class="detail-status">
                <span>7 Hour Days Ago</span>
            </div>
        </div>

        <div class="row bottom-mrg mrg-0">
            <div class="col-md-8 col-sm-8">
                <div class="detail-desc-caption">
                    <h4>{{$row->name}}</h4>
                    <span class="designation">{{$row->designation}}</span>
                </div>
                <br>
                <div class="detail-desc-skill">
                    @php $skills = getSkills($row->skill_ids); 
@endphp @for($i = 0; $i
                    < count($skills); $i++) <span>{{$skills[$i]->name}}</span>
                        @endfor
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="get-touch">
                    <h4>Get in Touch</h4>
                    <ul>
                        <li><i class="fa fa-map-marker"></i><span>{{$row->location_name .', '. $row->country_name}}</span></li>
                        <li><i class="fa fa-envelope"></i><span>{{$row->email}}</span></li>
                        <li><i class="fa fa-phone"></i><span>{{$row->mobile}}</span></li>
                        <li><i class="fa fa-money"></i><span>${{$row->hourly_rate}}/Hour</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row no-padd mrg-0">
            <div class="detail pannel-footer">
                <div class="col-md-5 col-sm-5">
                    <ul class="detail-footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-7 col-sm-7">
                    <div class="detail-pannel-footer-btn pull-right">
                        <a href="#" class="footer-btn grn-btn" title="">Apply Now</a>
                        <a href="#" class="footer-btn blu-btn" title="">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Resume Detail End -->

<section class="full-detail-description full-detail">
    <div class="container">

        <div class="row row-bottom mrg-0">
            <h2 class="detail-title">About Resume</h2>
            <p>{{$row->note}}</p>
        </div>

        <div class="row row-bottom mrg-0">
            <h2 class="detail-title">Education</h2>
            <ul class="detail-list">
                @foreach(getEducationbyUser($row->user_id) as $val)
                <li>{{$val->qualification_name}} | {{$val->school_name}}, {{$val->start_date}} to {{$val->end_date}}</li>
                @endforeach
            </ul>
        </div>
        <div class="row row-bottom mrg-0">
            <h2 class="detail-title">Work Experience</h2>
            <ul class="detail-list">
                @foreach(getExperiencebyUser($row->user_id) as $val)
                <li>{{$val->position}} | {{$val->institution}}, {{$val->start_date}} to {{$val->end_date}} <br> {{$val->note}}</li>
                @endforeach
            </ul>
        </div>

        <div class="row row-bottom mrg-0">
            <h2 class="detail-title">Skills</h2>
            <div class="ext-mrg row third-progress">
                <div class="col-md-6 col-sm-6">
                    <div class="panel-body">
                        <h3 class="progressbar-title">Apps Development</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width: 90%; background: #26a9e1;">
                                <span class="progress-icon fa fa-plus" style="border-color:#26a9e1; color:#26a9e1;"></span>
                                <div class="progress-value">90%</div>
                            </div>
                        </div>

                        <h3 class="progressbar-title">iPhone Development</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width: 80%; background: #f6931e;">
                                <span class="progress-icon fa fa-plus" style="border-color:#f6931e; color:#f6931e;"></span>
                                <div class="progress-value">80%</div>
                            </div>
                        </div>

                        <h3 class="progressbar-title">Digital Marketing</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width: 65%; background: #8bc43f;">
                                <span class="progress-icon fa fa-plus" style="border-color:#8bc43f; color:#8bc43f;"></span>
                                <div class="progress-value">52%</div>
                            </div>
                        </div>

                        <h3 class="progressbar-title">SEO/SMO</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width: 52%; background: #d20001;">
                                <span class="progress-icon fa fa-plus" style="border-color:#d20001; color:#d20001;"></span>
                                <div class="progress-value">52%</div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-sm-6">
                    <div class="panel-body">
                        <h3 class="progressbar-title">Apps Development</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width: 90%; background: #26a9e1;">
                                <span class="progress-icon fa fa-plus" style="border-color:#26a9e1; color:#26a9e1;"></span>
                                <div class="progress-value">90%</div>
                            </div>
                        </div>

                        <h3 class="progressbar-title">iPhone Development</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width: 80%; background: #f6931e;">
                                <span class="progress-icon fa fa-plus" style="border-color:#f6931e; color:#f6931e;"></span>
                                <div class="progress-value">80%</div>
                            </div>
                        </div>

                        <h3 class="progressbar-title">Digital Marketing</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width: 65%; background: #8bc43f;">
                                <span class="progress-icon fa fa-plus" style="border-color:#8bc43f; color:#8bc43f;"></span>
                                <div class="progress-value">52%</div>
                            </div>
                        </div>

                        <h3 class="progressbar-title">SEO/SMO</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width: 52%; background: #d20001;">
                                <span class="progress-icon fa fa-plus" style="border-color:#d20001; color:#d20001;"></span>
                                <div class="progress-value">52%</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
 @push('scripts')
<script type="text/javascript">
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageData(page);
    });

    function paginageData(page) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "Customer/ReadFreelancer?page=" + page,
            success: function(data) {
                $('#freelancerList').html(data);
            }
        });
    }

</script>
{{--
<script type="text/javascript" src="{{asset('_html/pages/project.js')}}"></script> --}} 
@endpush