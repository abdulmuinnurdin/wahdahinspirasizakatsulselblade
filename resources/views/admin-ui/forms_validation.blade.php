@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Validation Form',
    'headerSubtitle' => 'A simple and user-friendly form validator plugin for Bootstrap 3. Documentation here <a href="https://1000hz.github.io/bootstrap-validator/" target="_blank"></a>',
    'breadcrumb' => 'Validation Form',
    'headerIcon' => 'pe-7s-note2',
])

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Validator</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>This plugin adheres to the <a href="http://getbootstrap.com/javascript/#js-overview">conventions</a> set forth by Bootstrap's core jQuery plugins, so be sure to check those out to get a better understanding of the goals and design of this plugin.</p>
                                    <p>Form validation can be enabled in markup via the data-api or via JavaScript. Automatically enable form validation by adding <code>data-toggle="validator"</code> to your form element.</p>
                                    <form data-toggle="validator">
                                        <div class="form-group">
                                            <label for="inputName" class="control-label">Name</label>
                                            <input type="text" class="form-control" id="inputName" placeholder="Cina Saffary" required>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="inputTwitter" class="control-label">Twitter</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">@</span>
                                                <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="inputTwitter" placeholder="1000hz" required>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            <div class="help-block">Hey look, this one has feedback icons!</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="control-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
                                            <div class="help-block"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="control-label">Password</label>
                                            <div class="form-inline row">
                                                <div class="form-group col-sm-6">
                                                    <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
                                                    <div class="help-block">Minimum of 6 characters</div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="underwear" required>
                                                    Boxers
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="underwear" required>
                                                    Briefs
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="terms" data-error="Before you wreck yourself" required>
                                                    Check yourself
                                                </label>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection