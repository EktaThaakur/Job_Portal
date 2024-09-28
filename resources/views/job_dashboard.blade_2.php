<x-layouts>
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            <!-- Your carousel items here -->
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <form action="{{ url('/job') }}" method="GET">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control border-0" name="keyword" placeholder="Keyword" />
                            </div>
                            <div class="col-md-4">
                                <select name="jobName" class="form-select border-0">
                                    <option value="1" selected class="cl">Job_Name</option>
                                    @foreach ($alljobs as $job)
                                    <option value="{{ $job->job_id }}" class="cl">{{ $job->job_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="location" class="form-select border-0">
                                    <option value="1" selected>Location</option>
                                    @foreach ($alljobs as $job)
                                    <option value="{{ $job->location }}" class="cl">{{ $job->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Job Results Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Results</h2>
            <div class="row g-4">
                @if($jobs->isEmpty())
                <div class="col-12 text-center">
                    <p>No jobs found matching your criteria.</p>
                </div>
                @else
                @foreach ($jobs as $job)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="job-item rounded p-4">
                        <h5 class="mb-3">{{ $job->job_name }}</h5>
                        <p class="mb-0">Location: {{ $job->location }}</p>
                        <p class="mb-0">Nature: {{ $job->job_nature }}</p>
                        <a href="{{ route('job.details', $job->id) }}" class="btn btn-primary mt-2">View Details</a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Job Results End -->

    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
                <!-- Your category items here -->
            </div>
        </div>
    </div>
    <!-- Category End -->
</x-layouts>