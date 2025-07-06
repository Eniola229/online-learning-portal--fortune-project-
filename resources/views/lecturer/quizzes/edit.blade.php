@include('components.header');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Quizzes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Quizzes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Quiz</h5>

                            <form method="POST" action="{{ route('lecturer.quizzes.update', $quiz) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Quiz Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $quiz->title }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Select Course</label>
                                        <select name="course_id" class="form-select" required>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}" {{ $quiz->course_id == $course->id ? 'selected' : '' }}>
                                                    {{ $course->title }} ({{ $course->level }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control" rows="3">{{ $quiz->description }}</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-warning text-white">Update Quiz</button>
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