@extends("layouts.master")
@section("content")
<div class="inner-header bg-light py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="inner-title mb-0">Contacts</h6>
            </div>
            <div>
                <div class="beta-breadcrumb font-large">
                    <a href="index.html" class="text-decoration-none">Home</a> / <span>Contacts</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="beta-map">
    <div class="abs-fullwidth beta-map wow flipInX">
        <iframe src="http://maps.google.com/maps?output=embed&q=Newyork" width="100%" height="450" style="border:0;"
            allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<div class="container my-5">
    <div id="content">

        <div class="row">
            <div class="col-md-8 mb-5">
                <h2 class="mb-4">Contact Form</h2>
                <p class="mb-4">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit ani m id est laborum.</p>

                <form action="#" method="post" class="contact-form">
                    <div class="mb-3">
                        <input name="your-name" type="text" class="form-control" placeholder="Your Name (required)"
                            required>
                    </div>
                    <div class="mb-3">
                        <input name="your-email" type="email" class="form-control" placeholder="Your Email (required)"
                            required>
                    </div>
                    <div class="mb-3">
                        <input name="your-subject" type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="mb-3">
                        <textarea name="your-message" class="form-control" placeholder="Your Message"
                            rows="5"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Send Message <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <h2 class="mb-4">Contact Information</h2>

                <h6 class="contact-title fw-bold">Address</h6>
                <p class="mb-4">
                    Suite 127 / 267 – 277 Brussel St,<br>
                    62 Croydon, NYC <br>
                    Newyork
                </p>

                <h6 class="contact-title fw-bold">Business Enquiries</h6>
                <p class="mb-4">
                    Doloremque laudantium, totam rem aperiam, <br>
                    inventore veritatio beatae. <br>
                    <a href="mailto:biz@betadesign.com">biz@betadesign.com</a>
                </p>

                <h6 class="contact-title fw-bold">Employment</h6>
                <p>
                    We’re always looking for talented persons to <br>
                    join our team. <br>
                    <a href="mailto:hr@betadesign.com">hr@betadesign.com</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection