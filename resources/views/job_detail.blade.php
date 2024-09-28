<x-layouts>

    <!-- Header End -->
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->

    <!-- @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                    timer: 30000, // Auto close after 3 seconds
                    timerProgressBar: true,
                });
            });
        </script>
    @endif -->

    <!-- Job Detail Start -->

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">

                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded"
                            src="{{isset($job->company) ? $job->company->company_logo : ''}}" alt=""
                            style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $job->job_name }}</h3>
                            <span class="text-truncate me-3"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{isset($job->company) ? $job->company->company_address : ''}}</span>
                            <span class="text-truncate me-3"><i
                                    class="far fa-clock text-primary me-2"></i>{{$job->job_nature}}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>
                                n{{$job->salary}}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job Description</h4>
                        <p class="txt">{{$job->job_description}}</p>
                        <h4 class="mb-3">Responsibility</h4>
                        <p class="txt">{{$job->responsibility}}</p>
                        <!-- <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam
                            </li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore
                                gubergren</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus
                                erat</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                        </ul> -->
                        <h4 class="mb-3">Qualifications</h4>
                        <p class="txt">{{$job->qualifications}}</p>
                        <!-- <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam
                            </li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore
                                gubergren</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus
                                erat</li>
                            <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                        </ul> -->
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-4">Apply For The Job</h4>
                        @if(session('success'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    Swal.fire({
                                        title: 'Success!',
                                        text: "{{ session('success') }}",
                                        icon: 'success',
                                        confirmButtonText: 'OK',
                                        timer: 30000, // Auto close after 3 seconds
                                        timerProgressBar: true,
                                    });
                                });
                            </script>
                        @endif
                        <form action="{{'/job_application#apply'}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name"
                                        required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" name="job_role" placeholder="Job Role"
                                        required value="{{ old('job_role', $job->job_name) }}">
                                    @error('job_role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="file" class="form-control bg-white" name="resume"
                                        accept=".pdf,.doc,.docx" required>
                                    @error('resume')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" name="cover_letter" rows="5"
                                        placeholder="Cover Letter" required></textarea>
                                    @error('cover_letter')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit" id="apply">Apply Now</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p class="txt"><i class="fa fa-angle-right text-primary me-2"></i>Published On:
                            {{$job->published_date}}
                        </p>
                        <p class="txt"><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{$job->vacancy}}</p>
                        <p class="txt"><i class="fa fa-angle-right text-primary me-2"></i>Job Nature:
                            {{$job->job_nature}}
                        </p>
                        <p class="txt"><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{$job->salary}}</p>
                        <p class="txt"><i class="fa fa-angle-right text-primary me-2"></i>Location:
                            {{$job->location}}
                        </p>
                        <p class="m-0 txt"><i class="fa fa-angle-right text-primary me-2"></i>Date Line:
                            {{$job->date_line}}
                        </p>
                        </p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <p class="m-0 txt">{{$job->company->company_detail}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Detail End -->
</x-layouts>