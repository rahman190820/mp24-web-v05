@extends('layouts.apps')
@section('konten')
 <!-- BEGIN: Page Level CSS-->
 <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-modern-menu-template/materialize.css">
 <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-modern-menu-template/style.css">
 <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/form-wizard.css">
 <!-- END: Page Level CSS-->

<div class="col s12">
    <div class="container">
      <div class="section section-form-wizard">
        <div class="card">
            <div class="card-content">
            <p class="caption mb-0">We use <a
                href="https://kinark.github.io/Materialize-stepper/?feedback_email=r%40m.com&feedback_password=sdasdasd#!">Stepper</a>
            as a Form Wizard. Stepper is a fundamental part of material design
            guidelines. It makes forms simplier and a lot of other stuffs.</p>
            </div>
        </div>
        <!-- Horizontal Stepper -->
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content pb-0">
                        <div class="card-header mb-2">
                        <h4 class="card-title">Horizontal Stepper</h4>
                        </div>

                        <ul class="stepper horizontal" id="horizStepper">
                        <li class="step active">
                            <div class="step-title waves-effect">Step 1</div>
                            <div class="step-content">
                            <div class="row">
                                <div class="input-field col m6 s12">
                                <label for="firstName">First Name: <span class="red-text">*</span></label>
                                <input type="text" id="firstName" name="firstName" class="validate" required>
                                </div>
                                <div class="input-field col m6 s12">
                                <label for="lastName">Last Name: <span class="red-text">*</span></label>
                                <input type="text" id="lastName" class="validate" name="lastName" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                <label for="Email1">Email: <span class="red-text">*</span></label>
                                <input type="email" class="validate" name="Email" id="Email1" required>
                                </div>
                                <div class="input-field col m6 s12">
                                <label for="contactNum1">Contact Number: <span class="red-text">*</span></label>
                                <input type="number" class="validate" name="contactNum" id="contactNum1" required>
                                </div>
                            </div>
                            <div class="step-actions">
                                <div class="row">
                                <div class="col m4 s12 mb-3">
                                    <button class="red btn btn-reset" type="reset">
                                    <i class="material-icons left">clear</i>Reset
                                    </button>
                                </div>
                                <div class="col m4 s12 mb-3">
                                    <button class="btn btn-light previous-step" disabled>
                                    <i class="material-icons left">arrow_back</i>
                                    Prev
                                    </button>
                                </div>
                                <div class="col m4 s12 mb-3">
                                    <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                                    Next
                                    <i class="material-icons right">arrow_forward</i>
                                    </button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li class="step">
                            <div class="step-title waves-effect">Step 2</div>
                            <div class="step-content">
                            <div class="row">
                                <div class="input-field col m6 s12">
                                <label for="proposal">Proposal Title: <span class="red-text">*</span></label>
                                <input type="text" class="validate" id="proposal" name="proposal" required>
                                </div>
                                <div class="input-field col m6 s12">
                                <label for="job">Job Title: <span class="red-text">*</span></label>
                                <input type="text" class="validate" id="job" name="job" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                <label for="company">Previous Company:</label>
                                <input type="text" class="validate" id="company" name="company">
                                </div>
                                <div class="input-field col m6 s12">
                                <label for="url">Video Url:</label>
                                <input type="url" class="validate" id="url">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                <label for="exp">Experience: <span class="red-text">*</span></label>
                                <input type="text" class="validate" id="exp" name="exp">
                                </div>
                                <div class="input-field col m6 s12">
                                <label for="desc">Short Description: <span class="red-text">*</span></label>
                                <textarea name="dec" id="desc" rows="4" class="materialize-textarea"></textarea>
                                </div>
                            </div>
                            <div class="step-actions">
                                <div class="row">
                                <div class="col m4 s12 mb-3">
                                    <button class="red btn btn-reset" type="reset">
                                    <i class="material-icons left">clear</i>Reset
                                    </button>
                                </div>
                                <div class="col m4 s12 mb-3">
                                    <button class="btn btn-light previous-step">
                                    <i class="material-icons left">arrow_back</i>
                                    Prev
                                    </button>
                                </div>
                                <div class="col m4 s12 mb-3">
                                    <button class="waves-effect waves dark btn btn-primary next-step" type="submit">
                                    Next
                                    <i class="material-icons right">arrow_forward</i>
                                    </button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li class="step">
                            <div class="step-title waves-effect">Step 3</div>
                            <div class="step-content">
                            <div class="row">
                                <div class="input-field col m6 s12">
                                <label for="eventName">Event Name: <span class="red-text">*</span></label>
                                <input type="text" class="validate" id="eventName" name="eventName" required>
                                </div>
                                <div class="input-field col m6 s12">
                                <select>
                                    <option value="Select" disabled selected>Select Event Type</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Party">Party</option>
                                    <option value="FundRaiser">Fund Raiser</option>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                <select>
                                    <option value="Select" disabled selected>Select Event Status</option>
                                    <option value="Planning">Planning</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>
                                </div>
                                <div class="input-field col m6 s12">
                                <select>
                                    <option value="Select" disabled selected>Event Location</option>
                                    <option value="New York">New York</option>
                                    <option value="Queens">Queens</option>
                                    <option value="Washington">Washington</option>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                <label for="Budget">Event Budget: <span class="red-text">*</span></label>
                                <input type="Number" class="validate" id="Budget" name="Budget">
                                </div>
                                <div class="input-field col m6 s12">
                                <p> <label>Requirments</label></p>
                                <p> <label>
                                    <input type="checkbox">
                                    <span>Staffing</span>
                                    </label></p>
                                <p><label>
                                    <input type="checkbox">
                                    <span>Catering</span>
                                    </label></p>
                                </div>
                            </div>
                            <div class="step-actions">
                                <div class="row">
                                <div class="col m6 s12 mb-1">
                                    <button class="red btn mr-1 btn-reset" type="reset">
                                    <i class="material-icons">clear</i>
                                    Reset
                                    </button>
                                </div>
                                <div class="col m6 s12 mb-1">
                                    <button class="waves-effect waves-dark btn btn-primary" type="submit">Submit</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Horizontal Stepper -->
      </div>
    </div>
</div>

 <!-- BEGIN PAGE VENDOR JS-->
 <script src="../../../app-assets/vendors/materialize-stepper/materialize-stepper.min.js"></script>
 <!-- END PAGE VENDOR JS-->

@endsection