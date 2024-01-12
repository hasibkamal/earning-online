<!-- Start Header Top
============================================= -->
<div class="top-bar-area inline inc-border">
    <div class="container">
        <div class="row">
            <div class="col-md-8 address-info text-left">
                <div class="info box">
                    <ul>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> {{ session()->get('company.company_address') }}
                        </li>
                        <li>
                            <i class="fas fa-envelope-open"></i> {{ session()->get('company.company_email') }}
                        </li>
                        <li>
                            <i class="fas fa-phone"></i> {{ session()->get('company.company_phone') }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 bar-btn text-right">
                <a href="{{url('/login')}}"><i class="fa fa-key"></i> Login</a>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top -->
