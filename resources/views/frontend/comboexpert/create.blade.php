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
                                                                <span>MinimumAgeatEntry</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="MinimumAgeatEntry" placeholder="MinimumAgeatEntry">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>MaximumAgeatEntry</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="MaximumAgeatEntry" placeholder="MaximumAgeatEntry">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>MaximumMaturityAge</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="decp" class="form-control" name="MaximumMaturityAge" placeholder="MaximumMaturityAge">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>PolicyTerm</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="PolicyTerm" placeholder="PolicyTerm">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>MinimumSumAssured</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="decp" class="form-control" name="MinimumSumAssured" placeholder="MinimumSumAssured">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>MaximumSumAssured</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="MaximumSumAssured" placeholder="MaximumSumAssured">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>PremiumMode</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="decp" class="form-control" name="PremiumMode" placeholder="PremiumMode">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>RidersAvailable</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="RidersAvailable" placeholder="RidersAvailable">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>SurrenderValue</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="decp" class="form-control" name="SurrenderValue" placeholder="SurrenderValue">
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>LoanAvailable</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="LoanAvailable" placeholder="LoanAvailable">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>OtherBenefit</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="decp" class="form-control" name="OtherBenefit" placeholder="OtherBenefit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>name</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" class="form-control" name="name" placeholder="name">
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
