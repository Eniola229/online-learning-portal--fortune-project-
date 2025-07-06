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
            <h2 class="mb-4">Quiz Result: {{ $attempt->quiz->title }}</h2>

            <h4 class="mb-4 text-success fw-bold">Your Score: {{ $attempt->score }}%</h4>

            @foreach ($attempt->answers as $answer)
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="fw-semibold">{{ $answer->question->question_text }}</p>
                        <p class="{{ $answer->is_correct ? 'text-success' : 'text-danger' }}">
                            Your Answer: {{ $answer->option->option_text }}
                            @if ($answer->is_correct)
                                <span class="fw-bold">(Correct)</span>
                            @else
                                <span class="fw-bold">(Wrong)</span>
                            @endif
                        </p>
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