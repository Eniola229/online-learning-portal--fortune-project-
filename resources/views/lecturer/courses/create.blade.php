@include('components.header');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Create Course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create Course</h5>

          <form method="POST" action="{{ route('lecturer.courses.store') }}">
            @csrf

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Course Title</label>
                <input type="text" name="title" class="form-control" required>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Course Code</label>
                <input type="text" name="code" class="form-control" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Level (e.g. ND1)</label>
              <input type="text" name="level" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Save Course</button>
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