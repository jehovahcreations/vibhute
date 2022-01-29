@extends('layouts.layout')
@section('content')
 <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">About Us</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal"action="/contact/update" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                   
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Whatsapp Number</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="whatsapp" placeholder="Heading" value="{{ $table->whatsapp }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Email</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="email" placeholder="Heading" value="{{ $table->email }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>FB Link</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="facebook" placeholder="Heading" value="{{ $table->facebook }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Website</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="website" placeholder="Heading" value="{{ $table->website }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Address</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="address" placeholder="Heading" value="{{ $table->address }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Offer Text</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="offer" placeholder="Heading" value="{{ $table->offer }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Offer Value</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="soffer" placeholder="Heading" value="{{ $table->soffer }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Google Pay number</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="gpay" placeholder="Heading" value="{{ $table->gpay }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Phonepe Number</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="phonepe" placeholder="Heading" value="{{ $table->phonepe }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Paytm Number</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="paytm" placeholder="Heading" value="{{ $table->paytm }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Account Number</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="acc" placeholder="Heading" value="{{ $table->acc }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Bank Name</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="bank" placeholder="Heading" value="{{ $table->bank }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Branch Name</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="btanch" placeholder="Heading" value="{{ $table->btanch }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- 'whatsapp','email','facebook','website','address','offer','soffer','gpay',
                                                'phonepe','paytm','acc','bank','btanch','ifsc','ren','rene','image', --}}
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>IFSC Code</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="ifsc" placeholder="Heading" value="{{ $table->ifsc }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Renewal Text</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="ren" placeholder="Heading" value="{{ $table->ren }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Renewal value</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="rene" placeholder="Heading" value="{{ $table->rene }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                {{-- <span>Decription</span> --}}
                                                            </div>
                                                            <div class="col-md-8">
                                                               {{-- <input type="text" id="decp" class="form-control" name="decp" placeholder="Decription" value="{{ $table->decp }}"> --}}
                                                               <input type="hidden" id="img" class="form-control" name="img" placeholder="Decription" value="{{ $table->image }}">
                                                               <input type="hidden" id="id" class="form-control" name="id" placeholder="Decription" value="{{ $table->_id }}">


                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Upload Image</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                               <input type="file" id="image" name="image" class="custom-file-input">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-8 offset-md-4">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 </section>
@stop
