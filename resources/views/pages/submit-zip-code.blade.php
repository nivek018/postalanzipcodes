@extends('layouts.app')
@section('title', 'Submit Zip Code')



@section('page_styles')
<style>
.alert {
    background: #fff;
    border-color: #eee;
    border-left-color: #f6b73c;
    border-left-width: 3.5pt;
    color: #000;
}
</style>
@endsection



@section('content')
<div>
    <div class="container mt-5">

        <div class="row">
            
            <div class="col-xl-12">                

                <section>
                    <h1 class="mb-5">
                        <strong>Submit Zip Code</strong>    
                    </h1>

                    <p>
                        You are here on this page to share with us a Zip Code Information, Our team will review your submission and once approved you and others will be able to search it on our "postalandzipcodes.ph" website. We are glad and thankful for your contribution.
                    </p>

                </section>

            </div> <!-- [ .col-xl-12 ] END -->

            <div class="col-xl-12">  
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <strong>Note:</strong> 
                    Kindly fill-up all the information below.
                </div>
            </div> <!-- [ .col-xl-12 ] END -->

            <div class="col-sm-12 col-md-8 col-xl-6">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">

                        <form id="submit-zip-code-form" autocomplete="off">

                            <div class="form-group mb-4">
                                <label for="selectRegion">Region <span class="text-danger">*</span></label>
                                <select class="form-control" id="selectRegion" required>
                                    <option value="">Select Region</option>
                                    @php
                                        $select_opt = [
                                        'Zamboanga Peninsula (Region IX)', 
                                        'Bangsamoro Autonomous Region in Muslim Mindanao (Region XVI - BARMM)', 
                                        'Bicol Region (Region V)', 
                                        'Cagayan Valley (Region II)', 
                                        'Caraga Region (Region XIII)', 
                                        'Central Luzon (Region III)', 
                                        'Central Visayas (Region VII)', 
                                        'Cordillera Administrative Region (Region XV - CAR)', 
                                        'Davao Region (Region XI)', 
                                        'Eastern Visayas (Region VIII)', 
                                        'Ilocos Region (Region I)', 
                                        'National Capital Region (Region XIV - NCR)', 
                                        'Northern Mindanao (Region X)', 
                                        'Region 18', 
                                        'SOCCSKSARGEN (Region XII)', 
                                        'Southern Tagalog Mainland (Region IV A - CALABARZON)', 
                                        'Southwestern Tagalog Region (Region XVII MIMAROPA Region)', 
                                        'Western Visayas (Region VI)'];
                                    @endphp
                                    @foreach($select_opt as $idx => $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                    @endforeach                                  
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="textareaAddress">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="textareaAddress" rows="3" placeholder="Street, Barangay, City/Town, or Province" autocomplete="off" required></textarea>
                            </div>

                            <div class="form-row mb-4">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="inputZipcode">Zip Code <span class="text-danger">*</span></label>
                                    <input type="input" class="form-control form-control-lg" id="inputZipcode" placeholder="1234" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="form-group col-sm-12">
                                    <label for="inputZipcode">Display Name <sup class="text-muted">(optional)</sup></label>
                                    <input type="input" class="form-control form-control-lg" id="inputZipcode" placeholder="Your Name or Alias?" autocomplete="off">
                                    <small class="text-muted pl-3">This will be displayed in the Hall of Contributors.</small>
                                </div>
                            </div>  

                            <hr />
                            
                            <button type="submit" class="btn btn-lg btn-success">Submit</button>

                        </form>


                    </div>
                </div>
            </div> <!-- [ .col-xl-12 ] END -->
             
        </div> <!-- [ .row ] END -->

    </div>
</div>
@endsection



@section('page_scripts')
<!-- jQuery Core 3.5.1 -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<script>
$(function() {

    $(`#submit-zip-code-form`).on('submit', function(e) {

        e.preventDefault();

        console.log(`form is submitted`);

    });

});
</script>
@endsection