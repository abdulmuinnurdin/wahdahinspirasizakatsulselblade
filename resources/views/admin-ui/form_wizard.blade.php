@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Free Bootstrap Wizard',
    'headerSubtitle' => 'This is a free responsive Bootstrap form wizard. Download it on <a href="http://azmind.com/bootstrap-wizard/" target="_blank"> AZMIND</a>, customize and use it as you like!',
    'breadcrumb' => 'Form wizard',
    'headerIcon' => 'pe-7s-note2',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Free Bootstrap Wizard</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                                            <form method="post" class="f1">
                                                <h3 class="m-t-0">Register To Our App</h3>
                                                <p>Fill in the form to get instant access</p>
                                                <div class="f1-steps">
                                                    <div class="f1-progress">
                                                        <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                                                    </div>
                                                    <div class="f1-step active">
                                                        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                                        <p>about</p>
                                                    </div>
                                                    <div class="f1-step">
                                                        <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                                        <p>account</p>
                                                    </div>
                                                    <div class="f1-step">
                                                        <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                                                        <p>social</p>
                                                    </div>
                                                </div>
                                                <fieldset>
                                                    <h4 class="m-t-0">Tell us who you are:</h4>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-first-name">First name</label>
                                                        <input type="text" name="f1-first-name" placeholder="First name..." class="form-control" id="f1-first-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-last-name">Last name</label>
                                                        <input type="text" name="f1-last-name" placeholder="Last name..." class="form-control" id="f1-last-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-about-yourself">About yourself</label>
                                                        <textarea name="f1-about-yourself" placeholder="About yourself..." 
                                                                  class="form-control" id="f1-about-yourself" rows="5"></textarea>
                                                    </div>
                                                    <div class="f1-buttons">
                                                        <button type="button" class="btn btn-success btn-next">Next</button>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <h4>Set up your account:</h4>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-email">Email</label>
                                                        <input type="text" name="f1-email" placeholder="Email..." class="form-control" id="f1-email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-password">Password</label>
                                                        <input type="password" name="f1-password" placeholder="Password..." class="form-control" id="f1-password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                                                        <input type="password" name="f1-repeat-password" placeholder="Repeat password..." 
                                                               class="form-control" id="f1-repeat-password">
                                                    </div>
                                                    <div class="f1-buttons">
                                                        <button type="button" class="btn btn-previous">Previous</button>
                                                        <button type="button" class="btn btn-success btn-next">Next</button>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <h4>Social media profiles:</h4>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-facebook">Facebook</label>
                                                        <input type="text" name="f1-facebook" placeholder="Facebook..." class="form-control" id="f1-facebook">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-twitter">Twitter</label>
                                                        <input type="text" name="f1-twitter" placeholder="Twitter..." class="form-control" id="f1-twitter">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-google-plus">Google plus</label>
                                                        <input type="text" name="f1-google-plus" placeholder="Google plus..." class="form-control" id="f1-google-plus">
                                                    </div>
                                                    <div class="f1-buttons">
                                                        <button type="button" class="btn btn-previous">Previous</button>
                                                        <button type="submit" class="btn btn-success btn-submit">Submit</button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/bootstrap-wizard/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-wizard/form.scripts.js') }}"></script>
@endpush
