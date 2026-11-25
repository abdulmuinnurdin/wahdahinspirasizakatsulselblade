@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Jquery.sumoselect & select2',
    'headerSubtitle' => 'A jQuery Single/Multi Select plugin which can be used on almost any device',
    'breadcrumb' => 'Select',
    'headerIcon' => 'pe-7s-note2',
])

@push('css')
    <link href="{{ asset('assets/plugins/jquery.sumoselect/sumoselect.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>jquery.sumoselect - Demo</h4>
                                    </div>
                                </div>
                                <div class="panel-body p-t-30 p-l-30 p-r-30">
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Single select</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select name="somename" class="testselect1" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                                <option disabled="disabled" selected="selected">disabled selected</option>
                                                <!--placeholder-->
                                                <option value="australia">Australia</option>
                                                <option value="africa">Africa</option>
                                                <option value="audi">America</option>
                                                <option title="Volvo is a car"  value="bangladesh">Bangladesh</option>
                                                <option value="pakistan">Pakistan</option>
                                                <option value="indonesia">Indonesia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Multiple select</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select multiple="multiple"  class="testselect2">
                                                <option selected value="volvo">Volvo</option>
                                                <option value="saab">Saab</option>
                                                <option disabled="disabled" value="mercedes">Mercedes</option>
                                                <option value="audi">Audi</option>
                                                <option value="bmw">BMW</option>
                                                <option value="porsche">Porche</option>
                                                <option value="ferrari">Ferrari</option>
                                                <option class="someclass" value="audi">Audi</option>
                                                <option class="someclass" value="bmw">BMW</option>
                                                <option class="someclass" value="porsche">Porche</option>
                                                <option value="ferrari">Ferrari</option>
                                                <option value="audi">Audi</option>
                                                <option value="bmw">BMW</option>
                                                <option value="porsche">Porche</option>
                                                <option value="ferrari">Ferrari</option>
                                                <option value="hyundai">Hyundai</option>
                                                <option value="mitsubishi">Mitsubishi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Optgroup Support</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select multiple="multiple" class="optgroup_test">
                                                <option selected value="saab">Saab</option>
                                                <option value="opel">Opel</option>
                                                <option disabled="disabled" value="mercedez">Mercedez</option>
                                                <optgroup label="US Brands">
                                                    <option value="chrysler">Chrysler</option>
                                                    <option value="gm">General Motors</option>
                                                    <option value="ford">Ford</option>
                                                    <option disabled="disabled" value="plymouth">Plymouth</option>
                                                </optgroup>
                                                <optgroup label="French Brands">
                                                    <option value="citroen">Citroën</option>
                                                    <option value="peugeot">Peugeot</option>
                                                    <option selected value="renault">Renault</option>
                                                    <option value="nissan">Nissan</option>
                                                </optgroup>
                                                <optgroup label="Italian brands">
                                                    <option value="fiat">Fiat</option>
                                                    <option value="alpha-Romeo">Alpha Romeo</option>
                                                    <option value="lamborghini">Lamborghini</option>
                                                </optgroup>
                                                <optgroup disabled="disabled" label="German brands">
                                                    <option value="audi">Audi</option>
                                                    <option value="bMW">BMW</option>
                                                    <option value="volkswagen">Volkswagen</option>
                                                </optgroup>
                                                <option value="aston-martin">Aston Martin</option>
                                                <option value="hyundai">Hyundai</option>
                                                <option value="mitsubishi">Mitsubishi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Search Support</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select  class="search_test">
                                                <option class="hemant" selected value="saab">Saab</option>
                                                <option class="hemant" value="opel">Opel</option>
                                                <option disabled="disabled" value="mercedez">Mercedez</option>
                                                <option value="aston-martin">Aston Martin</option>
                                                <option value="hyundai">Hyundai</option>
                                                <option value="mitsubishi">Mitsubishi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Search multiple select support</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select multiple="multiple" onchange="console.log($(this).children(':selected').length)" class="search_test">
                                                <option selected value="volvo">Volvo</option>
                                                <option value="saab">Saab</option>
                                                <option disabled="disabled" value="mercedes">Mercedes</option>
                                                <option value="audi">Audi</option>
                                                <option selected value="bmw">BMW</option>
                                                <option value="porsche">Porche</option>
                                                <option value="ferrari">Ferrari</option>
                                                <option value="mitsubishi">Mitsubishi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Search  Optgroup support</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select multiple="multiple" class="search_test">
                                                <option selected value="saab">Saab</option>
                                                <option value="opel">Opel</option>
                                                <option disabled="disabled" value="mercedez">Mercedez</option>
                                                <optgroup label="US Brands">
                                                    <option value="chrysler">Chrysler</option>
                                                    <option value="gm">General Motors</option>
                                                    <option value="ford">Ford</option>
                                                    <option disabled="disabled" value="plymouth">Plymouth</option>
                                                </optgroup>
                                                <optgroup label="French Brands">
                                                    <option value="citroen">Citroën</option>
                                                    <option value="peugeot">Peugeot</option>
                                                    <option selected value="renault">Renault</option>
                                                    <option value="nissan">Nissan</option>
                                                </optgroup>
                                                <optgroup label="Italian brands">
                                                    <option value="fiat">Fiat</option>
                                                    <option value="alpha-Romeo">Alpha Romeo</option>
                                                    <option value="lamborghini">Lamborghini</option>
                                                </optgroup>
                                                <optgroup disabled="disabled" label="German brands">
                                                    <option value="audi">Audi</option>
                                                    <option value="bMW">BMW</option>
                                                    <option value="volkswagen">Volkswagen</option>
                                                </optgroup>
                                                <option value="aston-martin">Aston Martin</option>
                                                <option value="hyundai">Hyundai</option>
                                                <option value="mitsubishi">Mitsubishi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Select all one</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select multiple="multiple" name="somename4" class="select1">
                                                <option value="volvo">Volvo</option>
                                                <option value="saab">Saab</option>
                                                <option disabled="disabled" value="mercedes">Mercedes</option>
                                                <option value="audi">Audi</option>
                                                <option value="bmw">BMW</option>
                                                <option disabled="disabled" value="porsche">Porche</option>
                                                <option selected="selected" value="ferrari">Ferrari</option>
                                                <option selected="selected" value="hyundai">Hyundai</option>
                                                <option value="mitsubishi">Mitsubishi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Select all two</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select multiple="multiple" name="somename4" class="select2">
                                                <option value="volvo">Volvo</option>
                                                <option value="saab">Saab</option>
                                                <option disabled="disabled" value="mercedes">Mercedes</option>
                                                <option value="audi">Audi</option>
                                                <option value="bmw">BMW</option>
                                                <option disabled="disabled" value="porsche">Porche</option>
                                                <option selected="selected" value="ferrari">Ferrari</option>
                                                <option  value="hyundai">Hyundai</option>
                                                <option value="mitsubishi">Mitsubishi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Select2</h4>
                                    </div>
                                </div>
                                <div class="panel-body p-t-30 p-l-30 p-r-30">
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">The basics</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select class="form-control basic-single">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Multi-select boxes</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select class="form-control basic-multiple" multiple="multiple">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Placeholders</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select class="form-control placeholder-single">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Multiple select placeholders</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select class="form-control placeholder-multiple" multiple="multiple">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">RTL support</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select class="theme-single form-control" dir="rtl" tabindex="-1" style="display: none;">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Multiple languages</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select class="language form-control">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-sm-12 col-form-label">Disabled mode</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <select class="basic-single js-example-disabled form-control" disabled="disabled">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                            <div class="m-t-20">
                                                <button class="js-programmatic-enable btn btn-primary">Enable</button>
                                                <button class="js-programmatic-disable btn btn-warning">Disable</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.sumoselect/sumoselect-active.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2-active.js') }}"></script>
    <script src="{{ asset('assets/dist/js/jQuery.style.switcher.js') }}"></script>
@endpush
