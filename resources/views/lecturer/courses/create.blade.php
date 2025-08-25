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
            <div class="row">
              <!-- Course Title & Code -->
              <div class="col-md-6 mb-3">
                <label class="form-label">Course Title</label>
                <select name="title" class="form-select" required>
                  <option value="">-- SELECT COURSE --</option>
                  <option value="INTRODUCTION TO COMPUTER SCIENCE">INTRODUCTION TO COMPUTER SCIENCE</option>
                  <option value="COMPUTER PROGRAMMING I">COMPUTER PROGRAMMING I</option>
                  <option value="COMPUTER PROGRAMMING II">COMPUTER PROGRAMMING II</option>
                  <option value="OPERATING SYSTEM">OPERATING SYSTEM</option>
                  <option value="DATA STRUCTURES">DATA STRUCTURES</option>
                  <option value="DATABASE MANAGEMENT SYSTEM">DATABASE MANAGEMENT SYSTEM</option>
                  <option value="SYSTEM ANALYSIS AND DESIGN">SYSTEM ANALYSIS AND DESIGN</option>
                  <option value="COMPUTER ARCHITECTURE">COMPUTER ARCHITECTURE</option>
                  <option value="COMPUTER NETWORKING">COMPUTER NETWORKING</option>
                  <option value="SOFTWARE ENGINEERING">SOFTWARE ENGINEERING</option>
                  <option value="WEB DEVELOPMENT">WEB DEVELOPMENT</option>
                  <option value="HUMAN COMPUTER INTERACTION">HUMAN COMPUTER INTERACTION</option>
                  <option value="PROJECT MANAGEMENT">PROJECT MANAGEMENT</option>
                  <option value="CYBER SECURITY FUNDAMENTALS">CYBER SECURITY FUNDAMENTALS</option>
                  <option value="COMPUTER GRAPHICS">COMPUTER GRAPHICS</option>
                  <option value="ENTREPRENEURSHIP STUDIES">ENTREPRENEURSHIP STUDIES</option>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Course Code</label>
                <select name="code" class="form-select" required>
                  <option value="">-- SELECT CODE --</option>
                  <option value="COM111">COM111</option>
                  <option value="COM112">COM112</option>
                  <option value="COM121">COM121</option>
                  <option value="COM122">COM122</option>
                  <option value="COM211">COM211</option>
                  <option value="COM212">COM212</option>
                  <option value="COM221">COM221</option>
                  <option value="COM222">COM222</option>
                  <option value="COM311">COM311</option>
                  <option value="COM312">COM312</option>
                  <option value="COM321">COM321</option>
                  <option value="COM322">COM322</option>
                  <option value="COM411">COM411</option>
                  <option value="COM412">COM412</option>
                  <option value="COM421">COM421</option>
                  <option value="COM422">COM422</option>
                </select>
              </div>
            </div>

            <!-- Level -->
            <div class="mb-3">
              <label class="form-label">Level</label>
              <select name="level" class="form-select" required>
                <option value="">-- SELECT LEVEL --</option>
                <option value="ND1">ND1</option>
                <option value="ND2">ND2</option>
                <option value="HND1">HND1</option>
                <option value="HND2">HND2</option>
              </select>
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