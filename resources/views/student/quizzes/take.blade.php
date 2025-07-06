@include('components.header');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Quiz</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Quiz</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
 <div class="container mt-4">
    <h2 class="mb-4">Take Quiz: {{ $quiz->title }}</h2>

    <form method="POST" action="{{ route('student.quizzes.submit', $quiz) }}">
        @csrf

        @foreach ($quiz->questions as $question)
            <div class="mb-4">
                <p class="fw-semibold">{{ $loop->iteration }}. {{ $question->question_text }}</p>

                <div class="ms-3">
                    @foreach ($question->options as $option)
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="radio"
                                   name="answers[{{ $question->id }}]"
                                   id="option-{{ $option->id }}"
                                   value="{{ $option->id }}"
                                   required>
                            <label class="form-check-label" for="option-{{ $option->id }}">
                                {{ $option->option_text }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Submit Quiz</button>
    </form>
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