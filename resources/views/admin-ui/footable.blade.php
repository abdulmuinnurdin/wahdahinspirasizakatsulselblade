@extends('layouts.admin', [
    'title' => 'Adminpage - Responsive Bootstrap Admin Template Dashboard',
    'headerTitle' => 'Foo Tables',
    'headerSubtitle' => 'A responsive table plugin built on jQuery and made for Bootstrap.',
    'breadcrumb' => 'tabs',
    'headerIcon' => 'pe-7s-box1',
])

@push('css')
    <link href="{{ asset('assets/plugins/footable-bootstrap/css/footable.core.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<!-- /. Content Header (Page header) -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Basic example with row toggler option </h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="example2" class="footable table table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Doyle Bosworth </td>
                                                    <td>Marketing Designer</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2012/11/27</td>
                                                    <td>$123,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Marina Piller </td>
                                                    <td>Integration Specialist</td>
                                                    <td>Broken Hill</td>
                                                    <td>59</td>
                                                    <td>2012/12/02</td>
                                                    <td>$123,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Eden Balke t</td>
                                                    <td>Software Engineer</td>
                                                    <td>Grafton</td>
                                                    <td>27</td>
                                                    <td>2008/12/13</td>
                                                    <td>$456,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Lien Gandy </td>
                                                    <td>System Architect</td>
                                                    <td>Sydney</td>
                                                    <td>56</td>
                                                    <td>2011/04/25</td>
                                                    <td>$521,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Marquetta Burns </td>
                                                    <td>Accountant</td>
                                                    <td>Albury</td>
                                                    <td>51</td>
                                                    <td>2011/07/25</td>
                                                    <td>$500,750</td>
                                                </tr>
                                                <tr>
                                                    <td> Marjory Moles </td>
                                                    <td>Junior Technical Author</td>
                                                    <td>Armidale</td>
                                                    <td>36</td>
                                                    <td>2009/01/12</td>
                                                    <td>$425,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Neta Woolum </td>
                                                    <td>Senior Javascript Developer</td>
                                                    <td>Bathurst</td>
                                                    <td>28</td>
                                                    <td>2012/03/29</td>
                                                    <td>$400,060</td>
                                                </tr>
                                                <tr>
                                                    <td>Celine Mcduff </td>
                                                    <td>Accountant</td>
                                                    <td>Blue Mountains</td>
                                                    <td>62</td>
                                                    <td>2008/11/28</td>
                                                    <td>$214,700</td>
                                                </tr>
                                                <tr>
                                                    <td>Ghislaine Cumbo </td>
                                                    <td>Sales Assistant</td>
                                                    <td>Cessnock</td>
                                                    <td>75</td>
                                                    <td>2012/08/06</td>
                                                    <td>$586,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Deneen Wilkie </td>
                                                    <td>Integration Specialist</td>
                                                    <td>Dubbo</td>
                                                    <td>45</td>
                                                    <td>2010/10/14</td>
                                                    <td>$125,900</td>
                                                </tr>
                                                <tr>
                                                    <td>Kristen Bomgardner </td>
                                                    <td>Javascript Developer</td>
                                                    <td>Goulburn</td>
                                                    <td>56</td>
                                                    <td>2009/09/15</td>
                                                    <td>$352,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Ocie Hartsoe </td>
                                                    <td>Office Manager</td>
                                                    <td>Lithgow</td>
                                                    <td>46</td>
                                                    <td>2008/12/19</td>
                                                    <td>$15,560</td>
                                                </tr>
                                                <tr>
                                                    <td>Lekisha Goodwyn </td>
                                                    <td>Support Lead</td>
                                                    <td>Liverpool</td>
                                                    <td>31</td>
                                                    <td>2013/03/03</td>
                                                    <td>$58,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Stanford Eisenmenger </td>
                                                    <td>Regional Director</td>
                                                    <td>Newcastle</td>
                                                    <td>52</td>
                                                    <td>2008/10/16</td>
                                                    <td>$456,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Elena Southwood </td>
                                                    <td>Senior Marketing Designer</td>
                                                    <td>Queanbeyan</td>
                                                    <td>21</td>
                                                    <td>2012/12/18</td>
                                                    <td>$128,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Karey Oubre </td>
                                                    <td>Regional Director</td>
                                                    <td>London</td>
                                                    <td>18</td>
                                                    <td>2010/03/17</td>
                                                    <td>$563,750</td>
                                                </tr>
                                                <tr>
                                                    <td>Hilario Raney</td>
                                                    <td>Chief Financial Officer (CFO)</td>
                                                    <td>New York</td>
                                                    <td>39</td>
                                                    <td>2010/06/09</td>
                                                    <td>$725,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Germaine Fenstermacher</td>
                                                    <td>Systems Administrator</td>
                                                    <td>New York</td>
                                                    <td>36</td>
                                                    <td>2009/04/10</td>
                                                    <td>$237,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Sachiko Edens</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>35</td>
                                                    <td>2012/10/13</td>
                                                    <td>$132,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Della Duca</td>
                                                    <td>Personnel Lead</td>
                                                    <td>Edinburgh</td>
                                                    <td>60</td>
                                                    <td>2012/09/26</td>
                                                    <td>$217,500</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>FooTable with row toggler, sorting, filter and pagination </h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <input type="text" class="form-control input-sm m-b-15" id="filter" placeholder="Search in table">
                                        <table id="example1" class="footable table table-bordered toggle-arrow-tiny" data-page-size="8" data-filter=#filter>
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Job Title</th>
                                                    <th>Started On</th>
                                                    <th data-hide="all">Date of Birth</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Dennise</td>
                                                    <td>Fuhrman</td>
                                                    <td>High School History Teacher</td>
                                                    <td>November 8th 2011</td>
                                                    <td>July 25th 1960</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Elodia</td>
                                                    <td>Weisz</td>
                                                    <td>Wallpaperer Helper</td>
                                                    <td>October 15th 2010</td>
                                                    <td>March 30th 1982</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Raeann</td>
                                                    <td>Haner</td>
                                                    <td>Internal Medicine Nurse Practitioner</td>
                                                    <td>November 28th 2013</td>
                                                    <td>February 26th 1966</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Junie</td>
                                                    <td>Landa</td>
                                                    <td>Offbearer</td>
                                                    <td>October 31st 2010</td>
                                                    <td>March 29th 1966</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Solomon</td>
                                                    <td>Bittinger</td>
                                                    <td>Roller Skater</td>
                                                    <td>December 29th 2011</td>
                                                    <td>September 22nd 1964</td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Bar</td>
                                                    <td>Lewis</td>
                                                    <td>Clown</td>
                                                    <td>November 12th 2012</td>
                                                    <td>August 4th 1991</td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>Usha</td>
                                                    <td>Leak</td>
                                                    <td>Ships Electronic Warfare Officer</td>
                                                    <td>August 14th 2012</td>
                                                    <td>November 20th 1979</td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Lorriane</td>
                                                    <td>Cooke</td>
                                                    <td>Technical Services Librarian</td>
                                                    <td>September 21st 2010</td>
                                                    <td>April 7th 1969</td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Lorriane</td>
                                                    <td>Cooke</td>
                                                    <td>Technical Services Librarian</td>
                                                    <td>September 21st 2010</td>
                                                    <td>April 7th 1969</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">
                                                        <ul class="pagination pull-right"></ul>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/footable-bootstrap/js/footable.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/footable-bootstrap/js/footable-active.js') }}"></script>
@endpush
