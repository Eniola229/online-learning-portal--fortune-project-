@include('components.header');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registered Courses</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Registered Courses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container mt-4">
            <h2 class="mb-4 fw-bold">My Registered Courses</h2>

            @if($courses->isEmpty())
                <div class="alert alert-info">
                    You have not registered for any courses yet.
                </div>
            @else
                <ul class="list-group">
                    @foreach($courses as $course)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('student.courses.show', $course->id) }}" class="text-decoration-none text-primary">
                                {{ $course->title }} ({{ $course->code }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
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