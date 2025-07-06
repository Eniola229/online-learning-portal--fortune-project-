@include('components.header');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Notes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Notes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row justify-content-center">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Upload Note</h5>

              <form method="POST" action="{{ route('lecturer.notes.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="noteTitle" class="form-label">Note Title</label>
                    <input type="text" name="title" id="noteTitle" class="form-control" required>
                  </div>

                  <div class="col-md-6">
                    <label for="courseSelect" class="form-label">Select Course</label>
                    <select name="course_id" id="courseSelect" class="form-select" required>
                      @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }} ({{ $course->level }})</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="noteFile" class="form-label">Upload File (PDF, DOC, TXT)</label>
                  <input type="file" name="note_file" id="noteFile" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Upload</button>
              </form>

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