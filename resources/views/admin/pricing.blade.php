@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Pricing Table',
    'headerSubtitle' => 'Present your events in timeline style.',
    'breadcrumb' => 'Pricing',
    'headerIcon' => 'pe-7s-date',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="promos plan-1">
                                <div class="promo">
                                    <div class="deal">
                                        <div class="ic"><i class="fa fa-server"></i></div>
                                        <span>Starter Pro</span>
                                        <span>Build personal or business websites quickly and easily.</span>
                                    </div>
                                    <div class="price">
                                        <p>form</p>
                                        <span >£4.99/</span><span class="period">pm</span>
                                        <p>ex VAT <br>(Charged at 20%)</p>
                                    </div>
                                    <ul class="features">
                                        <li>Up to 50GB Storage</li>
                                        <li>Free Domain Name</li>
                                        <li>0 - 20 Databases</li>
                                        <li>Unlimited Bandwidth</li>
                                    </ul>
                                    <button class="button center-block">Buy Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="promos plan-2">
                                <div class="promo">
                                    <div class="deal">
                                        <div class="ic"><i class="fa fa-shield"></i></div>
                                        <span>Home Pro</span>
                                        <span>Build personal or business websites quickly and easily.</span>
                                    </div>
                                    <div class="price">
                                        <p>form</p>
                                        <span >£5.99/</span><span class="period">pm</span>
                                        <p>ex VAT <br>(Charged at 20%)</p>
                                    </div>

                                    <ul class="features">
                                        <li>Up to 50GB Storage</li>
                                        <li>Free Domain Name</li>
                                        <li>0 - 20 Databases</li>
                                        <li>Unlimited Bandwidth</li>
                                    </ul>
                                    <button class="button center-block">Buy Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="promos plan-3">
                                <div class="promo">
                                    <div class="deal">
                                        <div class="ic"><i class="fa fa-university"></i></div>
                                        <span>Business Pro</span>
                                        <span>Build personal or business websites quickly and easily.</span>
                                    </div>
                                    <div class="price">
                                        <p>form</p>
                                        <span >£8.99/</span><span class="period">pm</span>
                                        <p>ex VAT <br>(Charged at 20%)</p>
                                    </div>
                                    <ul class="features">
                                        <li>Up to 50GB Storage</li>
                                        <li>Free Domain Name</li>
                                        <li>0 - 20 Databases</li>
                                        <li>Unlimited Bandwidth</li>
                                    </ul>
                                    <button class="button center-block">Buy Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="promos plan-4">
                                <div class="promo">
                                    <div class="deal">
                                        <div class="ic"><i class="fa fa-area-chart"></i></div>
                                        <span>Advanded Pro</span>
                                        <span>Build personal or business websites quickly and easily.</span>
                                    </div>
                                    <div class="price">
                                        <p>form</p>
                                        <span >£9.99/</span><span class="period">pm</span>
                                        <p>ex VAT <br>(Charged at 20%)</p>
                                    </div>
                                    <ul class="features">
                                        <li>Up to 50GB Storage</li>
                                        <li>Free Domain Name</li>
                                        <li>0 - 20 Databases</li>
                                        <li>Unlimited Bandwidth</li>
                                    </ul>
                                    <button class="button center-block">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pricing">
                                <div class="pricing_item">
                                    <h3 class="pricing_title">Basic</h3>
                                    <p class="pricing_sentence">For freelancers</p>
                                    <div class="pricing_price"><span class="pricing_currency">$</span>19<span class="pricing_period">/ month</span></div>
                                    <ul class="pricing_feature-list">
                                        <li class="pricing_feature"><i class="ti-bar-chart"></i>10 presentations/month</li>
                                        <li class="pricing_feature"><i class="ti-comment"></i>Support at $25/hour</li>
                                        <li class="pricing_feature"><i class="ti-rocket"></i>1 campaign/month</li>
                                    </ul>
                                    <button class="pricing_action">Choose plan</button>
                                </div>
                                <div class="pricing_item pricing_item_featured">
                                    <h3 class="pricing_title">Standard</h3>
                                    <p class="pricing_sentence">For medium sized teams</p>
                                    <div class="pricing_price"><span class="pricing_currency">$</span>29<span class="pricing_period">/ month</span></div>
                                    <ul class="pricing_feature-list">
                                        <li class="pricing_feature"><i class="ti-bar-chart"></i>50 presentations/month</li>
                                        <li class="pricing_feature"><i class="ti-comment"></i>5 hours of free support</li>
                                        <li class="pricing_feature"><i class="ti-rocket"></i>10 campaigns/month</li>
                                    </ul>
                                    <button class="pricing_action">Choose plan</button>
                                </div>
                                <div class="pricing_item">
                                    <h3 class="pricing_title">Enterprise</h3>
                                    <p class="pricing_sentence">For large companies</p>
                                    <div class="pricing_price"><span class="pricing_currency">$</span>79<span class="pricing_period">/ month</span></div>
                                    <ul class="pricing_feature-list">
                                        <li class="pricing_feature"><i class="ti-bar-chart"></i>Unlimited presentations</li>
                                        <li class="pricing_feature"><i class="ti-comment"></i>Unlimited support</li>
                                        <li class="pricing_feature"><i class="ti-rocket"></i>Unlimited campaigns</li>
                                    </ul>
                                    <button class="pricing_action">Choose plan</button>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection