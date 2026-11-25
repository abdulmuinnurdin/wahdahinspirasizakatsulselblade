@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'jQuery Mask Plugin',
    'headerSubtitle' => 'A plugin to make masks on form fields',
    'breadcrumb' => 'Form mask',
    'headerIcon' => 'pe-7s-note2',
])

@push('css')
    <link href="{{ asset('assets/dist/css/component_ui.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>jQuery Mask Plugin</h4>
                                    </div>
                                </div>
                                <form>
                                    <div class="panel-body">
                                        <div class="form-group row">
                                            <label for="date" class="col-lg-3 col-sm-12 col-form-label">Date</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="date form-control" id="date"/>
                                                <small class="text-muted">Custom date format:<code>mm/dd/yyyy</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="time" class="col-lg-3 col-sm-12 col-form-label">Hour</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="time form-control" id="time"/>
                                                <small class="text-muted">Custom time format:<code>00:00:00</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="date_time" class="col-lg-3 col-sm-12 col-form-label">Date &amp; Hour</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="date_time form-control" id="date_time"/>
                                                <small class="text-muted">Date &amp; Hour format:<code>mm/dd/yyyy & 00:00:00</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cep" class="col-lg-3 col-sm-12 col-form-label">ZIP Code</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="cep form-control" id="cep"/>
                                                <small class="text-muted">ZIP Code Mask<code>00000-000</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cep_with_callback" class="col-lg-3 col-sm-12 col-form-label">With Callbacks (open console)</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="cep_with_callback form-control" id="cep_with_callback"/>
                                                <small class="text-muted">With Callbacks (open console) Mask<code>00000-00</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="crazy_cep" class="col-lg-3 col-sm-12 col-form-label">Crazy Zip Code</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="crazy_cep form-control" id="crazy_cep"/>
                                                <small class="text-muted">Crazy Zip Code Mask<code>0-00-00-00</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="money" class="col-lg-3 col-sm-12 col-form-label">Money</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="money form-control" id="money"/>
                                                <small class="text-muted">Money Mask<code>000.000.000.000.000,00</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="placeholder" class="col-lg-3 col-sm-12 col-form-label">Mask placeholder option</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="placeholder form-control" id="placeholder"/>
                                                <small class="text-muted">Placeholder Mask<code>00/00/0000</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-lg-3 col-sm-12 col-form-label">Telephone</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="phone form-control" id="phone"/>
                                                <small class="text-muted">Telephone Mask<code>0000-0000</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone_with_ddd" class="col-lg-3 col-sm-12 col-form-label">Telephone with Code Area</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="phone_with_ddd form-control" id="phone_with_ddd"/>
                                                <small class="text-muted">Telephone with Code Area Mask<code>(00) 0000-0000</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone_us" class="col-lg-3 col-sm-12 col-form-label">US Telephone</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="phone_us form-control" id="phone_us"/>
                                                <small class="text-muted">US Telephone Mask<code>(000) 000-0000</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sp_celphones" class="col-lg-3 col-sm-12 col-form-label">São Paulo Celphones</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="sp_celphones form-control" id="sp_celphones"/>
                                                <!--<small class="text-muted">São Paulo Celphones Mask<code>(000) 000-0000</code></small>-->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="mixed" class="col-lg-3 col-sm-12 col-form-label">Mixed Type Mask</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="mixed form-control" id="mixed"/>
                                                <small class="text-muted">Mixed Type Mask<code>AAA 000-S0S</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cpf" class="col-lg-3 col-sm-12 col-form-label">CPF</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="cpf form-control" id="cpf"/>
                                                <small class="text-muted">CPF Mask<code>000.000.000-00</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cnpj" class="col-lg-3 col-sm-12 col-form-label">CNPJ</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="cnpj form-control" id="cnpj"/>
                                                <small class="text-muted">CNPJ Mask<code>00.000.000/0000-00</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ip_address" class="col-lg-3 col-sm-12 col-form-label">IP Address</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="ip_address form-control" id="ip_address"/>
                                                <small class="text-muted">IP Address Mask<code>0ZZ.0ZZ.0ZZ.0ZZ</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="clear-if-not-match" class="col-lg-3 col-sm-12 col-form-label">With Clear If Not Match Option</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="clear-if-not-match form-control" id="clear-if-not-match"/>
                                                <small class="text-muted">With Clear If Not Match Option Mask<code>00/00/0000</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fallback" class="col-lg-3 col-sm-12 col-form-label">With a fallback digit</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="fallback form-control" id="fallback"/>
                                                <small class="text-muted">With a fallback digit mask<code>00r00r0000</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="selectonfocus" class="col-lg-3 col-sm-12 col-form-label">With selectOnFocus</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <input type="text" class="selectonfocus form-control" id="selectonfocus"/>
                                                <small class="text-muted">With selectOnFocus mask<code>00/00/0000</code></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-sm-12 col-form-label">Masks on div elements!</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="mask-on-div">12345678909</div> <input type="button" class="bt-mask-it btn btn-inverse" value="Mask it!"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button type="button" class="btn btn-primary w-md m-b-5">Submit</button>
                                                <button type="button" class="btn btn-default w-md m-b-5">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/jQuery-mask-plugin/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jQuery-mask-plugin/examples.js') }}"></script>
    <script src="{{ asset('assets/dist/js/jQuery.style.switcher.js') }}"></script>
@endpush
