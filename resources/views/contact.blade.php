<x-layouts>
    <!-- Header End -->
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->
    <!-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Contact For Any Query</h1>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex align-items-center bg-light rounded p-4">
                                <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-map-marker-alt text-primary"></i>
                                </div>
                                <span>123 Street, New York, USA</span>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex align-items-center bg-light rounded p-4">
                                <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-envelope-open text-primary"></i>
                                </div>
                                <span>info@example.com</span>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex align-items-center bg-light rounded p-4">
                                <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                                <span>+012 345 6789</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <!-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact
                            form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and
                            you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> -->
                        <!-- @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif -->
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

                        <form action='{{"/query_submission#contact"}}' method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-floating">

                                        <input type="text" class="form-control" id="name" placeholder="Your Name"
                                            name="name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-floating">

                                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                                            name="email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-floating">

                                        <input type="text" class="form-control" id="subject" placeholder="Subject"
                                            name="subject" required>
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-floating">

                                        <textarea class="form-control" placeholder="Leave a message here" id="message"
                                            name="message" style="height: 150px" required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" id="contact">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

</x-layouts>