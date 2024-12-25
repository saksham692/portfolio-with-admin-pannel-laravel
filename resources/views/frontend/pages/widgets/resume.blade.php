<section class="ftco-section ftco-no-pb goto-here" id="resume-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <nav id="navi">
                    <ul>
                        <li><a href="#page-1">Education</a></li>
                        <li><a href="#page-2">Experience</a></li>
                        <li><a href="#page-3">Skills</a></li>
{{--                        <li><a href="#page-4">Awards</a></li>--}}
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                <div id="page-1" class="page one">
                    <h2 class="heading">Education</h2>
                    @foreach($educations as $education)
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">{{ $education->end_year > now()->format('Y') ? 'Currently' : $education->start_year.' - '.$education->end_year }}</span>
                                <h2>{{ ucfirst($education->degree) }}</h2>
                                <span class="position">{{ ucfirst($education->institute_name) }}</span>
                                @if($education->description)
                                    {!! $education->description !!}
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="page-2" class="page two">
                    <h2 class="heading">Experience</h2>
                    @foreach($experiences as $experience)
                        <div class="resume-wrap d-flex ftco-animate">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date">{{ ($experience->end_year == Null ? 'Present' : $experience->start_year.' - '.$experience->end_year) }}</span>
                                <h2>{{ ucfirst($experience->title) }}</h2>
                                @if($experience->description)
                                    {!! $experience->description !!}
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="page-3" class="page three">
                    <h2 class="heading">Skills</h2>
                    <div class="row">
                        @foreach($skillItems as $skillItem)
                        <div class="col-md-6 animate-box">
                            <div class="progress-wrap ftco-animate">
                                <h3>{{ ucfirst($skillItem->name) }}</h3>
                                <div class="progress">
                                    <div class="progress-bar color-1" role="progressbar" aria-valuenow="{{ $skillItem->percent }}"
                                         aria-valuemin="0" aria-valuemax="100" style="width:{{ $skillItem->percent }}%">
                                        <span>{{ $skillItem->percent }}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
{{--                <div id="page-4" class="page four">--}}
{{--                    <h2 class="heading">Awards</h2>--}}
{{--                    <div class="resume-wrap d-flex ftco-animate">--}}
{{--                        <div class="icon d-flex align-items-center justify-content-center">--}}
{{--                            <span class="flaticon-ideas"></span>--}}
{{--                        </div>--}}
{{--                        <div class="text pl-3">--}}
{{--                            <span class="date">2014-2015</span>--}}
{{--                            <h2>Top 10 Web Developer</h2>--}}
{{--                            <span class="position">Cambridge University</span>--}}
{{--                            <p>A small river named Duden flows by their place and supplies it with the necessary--}}
{{--                                regelialia. It is a paradisematic country, in which roasted parts of sentences fly into--}}
{{--                                your mouth.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="resume-wrap d-flex ftco-animate">--}}
{{--                        <div class="icon d-flex align-items-center justify-content-center">--}}
{{--                            <span class="flaticon-ideas"></span>--}}
{{--                        </div>--}}
{{--                        <div class="text pl-3">--}}
{{--                            <span class="date">2014-2015</span>--}}
{{--                            <h2>Top 5 LeaderShip Exellence Winner</h2>--}}
{{--                            <span class="position">Cambridge University</span>--}}
{{--                            <p>A small river named Duden flows by their place and supplies it with the necessary--}}
{{--                                regelialia. It is a paradisematic country, in which roasted parts of sentences fly into--}}
{{--                                your mouth.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="resume-wrap d-flex ftco-animate">--}}
{{--                        <div class="icon d-flex align-items-center justify-content-center">--}}
{{--                            <span class="flaticon-ideas"></span>--}}
{{--                        </div>--}}
{{--                        <div class="text pl-3">--}}
{{--                            <span class="date">2014-2015</span>--}}
{{--                            <h2>Top 4 Web Tester</h2>--}}
{{--                            <span class="position">Cambridge University</span>--}}
{{--                            <p>A small river named Duden flows by their place and supplies it with the necessary--}}
{{--                                regelialia. It is a paradisematic country, in which roasted parts of sentences fly into--}}
{{--                                your mouth.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="resume-wrap d-flex ftco-animate">--}}
{{--                        <div class="icon d-flex align-items-center justify-content-center">--}}
{{--                            <span class="flaticon-ideas"></span>--}}
{{--                        </div>--}}
{{--                        <div class="text pl-3">--}}
{{--                            <span class="date">2014-2015</span>--}}
{{--                            <h2>Art &amp; Creative Director</h2>--}}
{{--                            <span class="position">Cambridge University</span>--}}
{{--                            <p>A small river named Duden flows by their place and supplies it with the necessary--}}
{{--                                regelialia. It is a paradisematic country, in which roasted parts of sentences fly into--}}
{{--                                your mouth.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</section>
