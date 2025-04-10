<x-admin-app-layout>
    <div class="container">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="p-4 card-body p-md-5">
                                <h3 class="pb-2 mb-4 pb-md-0 mb-md-5">Registration Form</h3>
                                <form>
                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" id="firstName" class="form-control form-control-lg" />
                                                <label class="form-label" for="firstName">First Name</label>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-md-6">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" id="lastName" class="form-control form-control-lg" />
                                                <label class="form-label" for="lastName">Last Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-4 col-md-6 d-flex align-items-center">
                                            <div data-mdb-input-init class="form-outline datepicker w-100">
                                                <input type="text" class="form-control form-control-lg" id="birthdayDate" />
                                                <label for="birthdayDate" class="form-label">Birthday</label>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-md-6">
                                            <h6 class="pb-1 mb-2">Gender: </h6>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                                                    value="option1" checked />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                                                    value="option2" />
                                                <label class="form-check-label" for="maleGender">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                                                    value="option3" />
                                                <label class="form-check-label" for="otherGender">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="pb-2 mb-4 col-md-6">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="email" id="emailAddress" class="form-control form-control-lg" />
                                                <label class="form-label" for="emailAddress">Email</label>
                                            </div>
                                        </div>
                                        <div class="pb-2 mb-4 col-md-6">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="tel" id="phoneNumber" class="form-control form-control-lg" />
                                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <select class="select form-control-lg">
                                                <option value="1" disabled>Choose option</option>
                                                <option value="2">Subject 1</option>
                                                <option value="3">Subject 2</option>
                                                <option value="4">Subject 3</option>
                                            </select>
                                            <label class="form-label select-label">Choose option</label>
                                        </div>
                                    </div>
                                    <div class="pt-2 mt-4">
                                        <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-admin-app-layout>