@extends('layouts.app')
@section('title', $data['page_title'])
@section('description', $data['description'])
@section('canonical', $data['canonical'])

@section('content')
    <div class="relative overflow-hidden pb-10 md:pb-5">
        <section class="bg-[#1B1A21] text-white pt-3 md:pt-4 relative">
            <header class="z-10">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-4 pb-32">
                    <h1
                        class="font-black md:text-left leading-relaxed text-4xl md:text-4xl lg:text-5xl tracking-tight md:pr-24">
                        Contribute to Zip Code Directory
                    </h1>
                </div>
            </header>
            <img src="{{ asset('branding/drip-horizontal-multi.png') }}" alt="" width="114"
                class="absolute top-24 left-0 hidden lg:block">
            <div class="bg-paper-tear -bottom-24 absolute flip-y"></div>
        </section>

        <section class="max-w-screen-sm mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div
                class="px-4 py-8 stack-gold font-NanumPenScript text-2xl border dark:bg-gray-900 border-black flex flex-col space-y-6 relative">
                <form id="submit-zip-code-form" autocomplete="off" class="space-y-6 font-Inter">
                    @csrf()

                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Zip Code Directory Submission Form</h2>
                    <div class="text-gray-200 font-NanumPenScript">{{ $data['description'] }}</div>

                    <div class="font-bold text-lg" id="error-msg"></div>
                    <div class="font-bold text-lg" id="success-msg"></div>

                    <div class="mb-6">
                        <label for="countries"
                            class="block mb-2 text-sm font-bold text-gray-900 dark:text-white font-Inter">Select
                            the
                            Region</label>
                        <select name="region" id="selectRegion"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value=""></option>
                            @php
                                $select_opt = ['Zamboanga Peninsula (Region IX)', 'Bangsamoro Autonomous Region in Muslim Mindanao (Region XVI - BARMM)', 'Bicol Region (Region V)', 'Cagayan Valley (Region II)', 'Caraga Region (Region XIII)', 'Central Luzon (Region III)', 'Central Visayas (Region VII)', 'Cordillera Administrative Region (Region XV - CAR)', 'Davao Region (Region XI)', 'Eastern Visayas (Region VIII)', 'Ilocos Region (Region I)', 'National Capital Region (Region XIV - NCR)', 'Northern Mindanao (Region X)', 'Region 18', 'SOCCSKSARGEN (Region XII)', 'Southern Tagalog Mainland (Region IV A - CALABARZON)', 'Southwestern Tagalog Region (Region XVII MIMAROPA Region)', 'Western Visayas (Region VI)'];
                                usort($select_opt, function ($a, $b) {
                                    $regionA = preg_replace('/\(.*\)/', '', $a);
                                    $regionB = preg_replace('/\(.*\)/', '', $b);
                                
                                    return strcmp($regionA, $regionB);
                                });
                                
                            @endphp
                            @foreach ($select_opt as $idx => $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="textareaAddress"
                            class="block mb-2 text-sm font-bold text-gray-900 dark:text-white font-Inter">Address</label>
                        <textarea name="address" id="textareaAddress" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Street, Barangay, City/Town, or Province" autocomplete="off" required></textarea>
                    </div>

                    <div class="mb-6 w-[50%]">
                        <label for="inputZipcode"
                            class="block mb-2 text-sm font-bold text-gray-900 dark:text-white font-Inter">Zip
                            Code</label>
                        <input type="text" name="zipcode" id="inputZipcode" minlength="4" maxlength="4" x-mask="9999"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>

                    <div class="mb-6">
                        <label for="inputName"
                            class="block mb-2 text-sm font-bold text-gray-900 dark:text-white font-Inter">Display
                            Name <small class="text-muted">(Optional)</small></label>
                        <input type="text" name="contributor" id="inputName" placeholder="Your Name or Alias?"
                            autocomplete="off"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-6">
                        <label for="inputEmail"
                            class="block mb-2 text-sm font-bold text-gray-900 dark:text-white font-Inter">Email
                            Address <small class="text-muted">(Optional)</small></label>
                        <input type="email" name="email" id="inputEmail" placeholder="Your Email?" autocomplete="off"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <button type="submit" id="submit-zip-code-btn"
                        class="dark:disabled:bg-gray-700 disabled:text-gray-500 disabled:cursor-wait text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-lg w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </section>

        </section>
    </div>
@endsection



@section('page_scripts')
    <script>
        // add event listener to load when the page is ready
        window.addEventListener('load', function() {

            const submitBtn = document.getElementById('submit-zip-code-btn');

            document.getElementById("submit-zip-code-form").addEventListener("submit", function(event) {

                // prevent the default action of submitting the form
                event.preventDefault();

                const formData = new FormData(this);

                // disable the submit button
                submitBtn.setAttribute('disabled', true);

                // Perform your actions here, such as validating the form or submitting it via AJAX
                fetch(`{{ route('create_zip') }}`, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {

                        setTimeout(() => {

                            /* clear errors wrapper */
                            let msg_wrapper = document.getElementById('error-msg');
                            msg_wrapper.innerHTML = '';

                            if (data.success === false) {

                                // loop through the data.errors
                                for (const [key, value] of Object.entries(data.errors)) {

                                    // append the error message to the error wrapper
                                    msg_wrapper.innerHTML += `<div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-sm dark:bg-gray-900 dark:text-red-400" role="alert">
                                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                                    ${value}
                                                    </div>`;
                                }

                            } else if (data.success === true) {


                                // inform the user that the zip code has been submitted
                                let success_wrapper = document.getElementById('success-msg');
                                success_wrapper.innerHTML = `<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-sm dark:bg-gray-900 dark:text-green-400" role="alert">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"  class="flex-shrink-0 inline w-5 h-5 mr-3"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" /></svg>
                                                    ${data.msg}
                                                </div>`;

                                // clear the form
                                document.getElementById("submit-zip-code-form").reset();

                                // smooth scroll to success_wrapper
                                success_wrapper.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center'
                                });

                            }

                            // disable the submit button
                            submitBtn.removeAttribute('disabled');

                        }, 1500);

                    })
                    .catch(error => {
                        console.error(error);

                        setTimeout(() => {
                            // disable the submit button
                            submitBtn.removeAttribute('disabled');
                        }, 1500);
                    });

            });

        });
    </script>
@endsection
