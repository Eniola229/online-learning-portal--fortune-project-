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
         <div class="container mt-4">
            <h2 class="mb-4">{{ $course->title }} ({{ $course->level }})</h2>

            {{-- Notes Section --}}
            <div class="mb-5">
                <h4 class="mb-3">📖 Notes</h4>
                @forelse ($notes as $note)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $note->title }}</h5>
                            <p class="card-text text-muted">{{ $note->description }}</p>
                            <a href="{{ asset('storage/' . $note->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">Download</a>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No notes available for this course yet.</p>
                @endforelse
            </div>

            {{-- Quizzes Section --}}
            <div>
                <h4 class="mb-3">❓ Quizzes</h4>
                @forelse ($quizzes as $quiz)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $quiz->title }}</h5>
                            <p class="card-text text-muted">{{ $quiz->description }}</p>
                            <a href="{{ route('student.quizzes.take', $quiz) }}" class="btn btn-success btn-sm mt-2">Take Quiz</a>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No quizzes available for this course yet.</p>
                @endforelse
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