@include('components.header');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Courses</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Courses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <a href="{{ route('lecturer.courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">My Courses</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Level</th>
                    <th>Created</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($courses as $course)
                    <tr>
                      <td>{{ $course->title }}</td>
                      <td>{{ $course->code }}</td>
                      <td>{{ $course->level }}</td>
                      <td>{{ $course->created_at->diffForHumans() }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="4" class="text-center">No courses yet.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <div class="mt-3">
                {{ $courses->links() }}
              </div>
            </div>
          </div>
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