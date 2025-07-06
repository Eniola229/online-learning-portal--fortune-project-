@include('components.header');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Questions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Questions</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="p-6 max-w-2xl mx-auto bg-white shadow rounded m-4 p-4">
            <h2 class="text-xl font-semibold mb-4">Add Question to: {{ $quiz->title }}</h2>

            <form method="POST" action="{{ route('lecturer.questions.store', $quiz) }}">
                @csrf

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

                <div class="row">
                    {{-- Question Text --}}
                    <div class="col-12 mb-3">
                        <label class="form-label fw-semibold">Question</label>
                        <textarea name="question_text" class="form-control" rows="3" required></textarea>
                    </div>

                    {{-- Options --}}
                    <div class="col-12 mb-3">
                        <label class="form-label fw-semibold mb-2">Options</label>
                        @for ($i = 0; $i < 4; $i++)
                            <div class="input-group mb-2">
                                <input type="text"
                                       name="options[{{ $i }}][text]"
                                       placeholder="Option {{ $i + 1 }}"
                                       class="form-control"
                                       required>
                                <span class="input-group-text">
                                    <input type="radio"
                                           name="correct_option"
                                           value="{{ $i }}"
                                           {{ $i === 0 ? 'checked' : '' }}>
                                    <span class="ms-2">Correct</span>
                                </span>
                            </div>
                        @endfor
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Add Question</button>
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