@include('components.header');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Notes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Notes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="card">
      <div class="card-body">
        <h5 class="card-title">Edit Note</h5>

        <form method="POST" action="{{ route('lecturer.notes.update', $note) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="title" class="form-label">Note Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $note->title }}" required>
                </div>

                <div class="col-md-6">
                    <label for="course_id" class="form-label">Select Course</label>
                    <select name="course_id" id="course_id" class="form-select" required>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ $note->course_id == $course->id ? 'selected' : '' }}>
                                {{ $course->title }} ({{ $course->level }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="note_file" class="form-label">Replace File (optional)</label>
                <input type="file" name="note_file" id="note_file" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning text-white">Update</button>
        </form>
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