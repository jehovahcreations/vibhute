@extends('layouts.layout')
@section('content')
                 <section id="column-selectors">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- <div class="row">
                                        <div class="col-xl-6"> --}}
                                           <h4 class="card-title">Contact</h4>
                                        {{-- </div> --}}
                                        {{-- <div class="col-xl-6">
                                            <a href="/about/create" class="btn btn-primary">Add+</a>
                                        </div> --}}
                                    {{-- </div> --}}

                                </div>
                                @if(Session::has('message'))
      <div class="alert {{ Session::get('alert-class') }}">
         {{ Session::get('message') }}
      </div>
      @endif
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        {{-- <p class="card-text">All of the data export buttons have a exportOptions option which can be used to specify information about what data should be exported and how. The options given for this parameter are passed directly to the buttons.exportData() method to obtain the required data.
                                        </p>
                                        <p>
                                            The print button will open a new window in the end user's browser and, by default, automatically trigger the print function allowing the end user to print the table. The window will be closed once the print is complete, or has been cancelled.
                                        </p> --}}
                                        <div class="table-responsive">
                                            <table class="table table-striped dataex-html5-selectors">
                                                <thead>
                                                    <tr>
                                                        <th>WhatsApp Number</th>
                                                        <th>Email</th>
                                                        <th>FB Link</th>
                                                        <th>Website</th>
                                                        <th>address</th>
                                                        <th>Offer Text</th>
                                                        <th>Offer Value</th>
                                                        <th>Gpay Number</th>
                                                        <th>Phonepay Number</th>
                                                        <th>Paytm number</th>
                                                        <th>Account Number</th>
                                                        <th>Bank name</th>
                                                        <th>Branch Name</th>
                                                        <th>IFSC</th>
                                                        <th>Renewal Text</th>
                                                        <th>Renewal Date</th>
                                                        <th>Image</th>
                                                        <th>Edit</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                {{-- 'whatsapp','email','facebook','website','address','offer','soffer','gpay',
                                                'phonepe','paytm','acc','bank','btanch','ifsc','ren','rene','image', --}}

                                                        @foreach($table as $tables)

<tr>
                                                        <td>{{ $tables->whatsapp }}</td>
                                                        <td>{{ $tables->email }}</td>
                                                        <td>{{$tables->facebook }}</td>
                                                        <td>{{ $tables->website }}</td>
                                                        <td>{{ $tables->address }}</td>
                                                        <td>{{$tables->offer }}</td>
                                                        <td>{{ $tables->soffer }}</td>
                                                        <td>{{ $tables->gpay }}</td>
                                                        <td>{{$tables->phonepe }}</td>
                                                        <td>{{ $tables->paytm }}</td>
                                                        <td>{{ $tables->acc }}</td>
                                                        <td>{{$tables->bank }}</td>
                                                        <td>{{$tables->btanch }}</td>
                                                        <td>{{ $tables->ifsc }}</td>
                                                        <td>{{ $tables->ren }}</td>
                                                        <td>{{$tables->rene }}</td>
            
                                                        <td><img src="data:image/png;base64, {{ $tables->image }}" width='10%' alt="Image Preview" /></td>
                                                        {{-- <td>@if ($tables->is_Active == 1)
                                                           <a href="{{ route('about.deactive',[$tables->_id]) }}" class="btn btn-danger">Deactivate</a>
                                                           @else
                                                           <a href="{{ route('about.active',[$tables->_id]) }}" class="btn btn-success">Activate</a>
                                                        @endif</td> --}}
                                                        <td><a href="{{ route('contact.edit',[$tables->_id]) }}" class="btn btn-primary">Edit</a></td>
                                                        {{-- <td><a href="{{ route('about.delete',[$tables->_id]) }}" class="btn btn-primary">Delete</a></td> --}}
</tr>
                                                          @endforeach


                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@stop
