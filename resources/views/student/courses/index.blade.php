@include('components.header');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Register for Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Register for Course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="container mt-4">
          <h2 class="mb-4">Register for Courses</h2>
                {{-- Success Message --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Error Message --}}
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>There were some problems:</strong>
                        <ul class="mt-2 mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

          @foreach ($courses as $course)
              <div class="card mb-3">
                  <div class="card-body">
                      <h5 class="card-title">{{ $course->title }} ({{ $course->level }})</h5>
                      <p class="card-text text-muted">{{ $course->description }}</p>

                      @if (in_array($course->id, $registered))
                          <span class="badge bg-success">Already Registered</span>
                          <a href="{{ route('student.courses.show', $course) }}" class="text-indigo-600 underline ml-2">View Details</a>
                      @else
                          <form action="{{ route('student.courses.register', $course) }}" method="POST" class="d-inline-block mt-2">
                              @csrf
                              <button type="submit" class="btn btn-primary btn-sm">Register</button>
                          </form>
                          <a href="{{ route('student.courses.show', $course) }}" class="text-indigo-600 underline ml-2">View Details</a>

                      @endif
                  </div>
              </div>
          @endforeach
      </div>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>