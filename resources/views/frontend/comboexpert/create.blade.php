@extends('layouts.layout')
@section('content')
 <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Category</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal"action="/comboexpert/addabout" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-body">
                                                <div class="row">
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Main Menu</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                 <fieldset class="form-group">
                                                                    <select class="form-control" id="" name="mainMenu">
                                                                       {{-- // @foreach($table as $tables) --}}
                                                                        @foreach ($table->unique('mainMenu') as $tables)
                                                                           <option value="{{ $tables->mainMenu }}">{{ $tables->mainMenu }}</option>
                                                                           @endforeach
                                                                       </select>
                                                                   </fieldset>
                                                          </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Sub Menu</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                 <fieldset class="form-group">
                                                                    <select class="form-control" id="" name="subMenu">
                                                                        @foreach($table as $tables)
                                                                           <option value="{{ $tables->subMenu }}">{{ $tables->subMenu }}</option>
                                                                           @endforeach
                                                                       </select>
                                                                   </fieldset>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Name</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="name" placeholder="SMS content">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>SMS</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="sms" placeholder="SMS content">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Whatsapp</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="whatsapp" placeholder="Whatsapp Content">
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
                                                     <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Upload plan</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                               <input type="file" id="image" name="plan" class="custom-file-input">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Upload pdf</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                               <input type="file" id="image" name="pdf" class="custom-file-input">
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
