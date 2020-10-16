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
    <div class="container mt-3">

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
                            
                            @csrf()
                            
                            <div class="form-group mb-4">
                                <label for="selectRegion">Region <span class="text-danger">*</span></label>
                                <select class="form-control" name="region" id="selectRegion" required>
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
                                <textarea class="form-control" name="address" id="textareaAddress" rows="3" placeholder="Street, Barangay, City/Town, or Province" autocomplete="off" required></textarea>
                            </div>

                            <div class="form-row mb-4">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="inputZipcode">Zip Code <span class="text-danger">*</span></label>
                                    <input type="input" class="form-control form-control-lg" name="zipcode" id="inputZipcode" placeholder="1234" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="form-group col-sm-12">
                                    <label for="inputName">
                                        Display Name <small class="text-muted">Optional</small>
                                        <br><small class="text-muted float-right mt-1 pr-2">This will be displayed on the Hall of Contributors.</small>
                                    </label>
                                    
                                    <input type="input" class="form-control form-control-lg" name="contributor" id="inputName" placeholder="Your Name or Alias?" autocomplete="off">
                                </div>
                            </div>  

                            <div class="form-row mb-4">
                                <div class="form-group col-sm-12">
                                    <label for="inputEmail">
                                        Email Address <small class="text-muted">Optional</small>
                                    </label>
                                    
                                    <input type="email" class="form-control form-control-lg" name="email" id="inputEmail" placeholder="Your Email?" autocomplete="off">
                                </div>
                            </div>  


                            <hr />
                            
                            <div id="return-msg">
                            <!--  -->
                            </div>
                            
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
<script>
$(function() {

    $(`#submit-zip-code-form`).on(`submit`, function(e) {

        e.preventDefault();

        let this_btn = $(this).find(`button[type="submit"]`);

        var formData = new FormData(this);

        xhr = $.ajax({
            url:            `{{ route('create_zip') }}`,
            type:           `POST`,
            dataType:       `JSON`,
            data:           formData,
            processData:    false,
            contentType:    false,

            beforeSend: function() {

                /* create loading state of the submit button */
                $(this_btn).html(`<div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                                </div>`).addClass('cursor-progress');

                /* abot on-going ajax request */
                if (xhr != null) {
                    xhr.abort();
                }

            },

            success: function(data) {
                
                /* clear errors wrapper */
                let msg_wrapper = $(`#return-msg`).html(``);                
                
                if (data.success === false) {

                    if ( data.errors.region ) msg_wrapper.append(`<div class="alert alert-warning" role="alert">` + data.errors.region + `</div>`);
                    if ( data.errors.address ) msg_wrapper.append(`<div class="alert alert-warning" role="alert">` + data.errors.address + `</div>`);
                    if ( data.errors.zipcode) msg_wrapper.append(`<div class="alert alert-warning" role="alert">` + data.errors.zipcode + `</div>`);
                    if ( data.errors.contributor) msg_wrapper.append(`<div class="alert alert-warning" role="alert">` + data.errors.contributor + `</div>`);

                }
                
                else if (data.success === true) {

                    /* clear this form */
                    /* & */
                    /* display thank msg */
                    $(`#submit-zip-code-form`).html(``).append(
                                                        `<div id="return-msg" class="text-center">`+
                                                            `<img class="img-fluid mb-4" width="350px" src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,q_auto/v1601579449/postalandzipcodes.ph/arabica-1172.png" alt="Thank you message!" />`+
                                                            `<h4 class="font-weight-light mt-3">` + data.msg + `</h4>`+
                                                            `<small classs="small">We will just review your submission and once confirmed, Our visitors will be able to search for that zip code here.</small>`+
                                                        `</div>`
                                                        );

                }

                $(this_btn).text(`Submit`);    
                
            }, 

            error: function() {

                $(this_btn).text(`Submit`);

                if (xhr != null) {
                    xhr.abort();
                }

            }

        });

    });

});
</script>
@endsection