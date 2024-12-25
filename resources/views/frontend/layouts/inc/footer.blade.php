@php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerIcons = \App\Models\FooterSocialLink::all();
    $footerUsefulLinks = \App\Models\FooterUsefulLink::all();
    $footerContact = \App\Models\FooterContactInfo::first();
    $footerHelpLinks = \App\Models\FooterHelpLink::all();
@endphp
<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About</h2>
                    <p>{{ $footerInfo->info }}</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        @foreach($footerIcons as $footerIcon)
                            <li class="ftco-animate"><a href="{{ $footerIcon->url }}"><span><i
                                            class="{{ $footerIcon->icon }}"></i></span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Links</h2>
                    <ul class="list-unstyled">
                        @foreach($footerUsefulLinks as $footerUsefulLink)
                            <li><a href="{{ $footerUsefulLink->url }}"><span
                                        class="icon-long-arrow-right mr-2"></span>{{ $footerUsefulLink->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Policies</h2>
                    <ul class="list-unstyled">
                        @foreach($footerHelpLinks as $footerHelpLink)
                            <li><a href="{{ $footerHelpLink->url }}"><span class="icon-long-arrow-right mr-2"></span>{{ $footerHelpLink->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <span class="icon icon-map-marker"></span>
                                <span class="text">{{ $footerContact->address }}</span>
                            </li>
                            <li>
                                <a href="tel:{{ $footerContact->phone }}">
                                    <span class="icon icon-phone"></span>
                                    <span class="text">
                                        {{ $footerContact->phone }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="MailTo:{{ $footerContact->email }}">
                                    <span class="icon icon-envelope"></span>
                                    <span class="text">{{ $footerContact->email }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    {{ $footerInfo->copy_right }} | {{ $footerInfo->powered_by }}
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>
