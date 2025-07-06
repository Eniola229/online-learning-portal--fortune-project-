@include('components.header');
<!-- Alpine.js CDN -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">'
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>There were some problems:</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
          @if (auth()->user()->level === null || auth()->user()->department === null)
<div class="min-vh-20 d-flex align-items-center justify-content-center bg-light py-4">
    <div class="card border-warning shadow-sm w-100" style="max-width: 500px;">
        <div class="card-body" x-data="formHandler()">
            <h4 class="card-title text-center text-dark mb-4">Complete your Profile</h4>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf

                <!-- Level -->
                <div class="mb-3">
                    <label for="level" class="form-label">Select your Level</label>
                    <select name="level" id="level" class="form-select">
                        <option value="">-- Select Level --</option>
                        <option value="ND1">ND1</option>
                        <option value="ND2">ND2</option>
                        <option value="HND1">HND1</option>
                        <option value="HND2">HND2</option>
                    </select>
                </div>

                <!-- Department -->
                <input type="hidden" name="department" value="Computer Science">
                <!-- <div class="mb-4">
                    <label for="department" class="form-label">Select your Course</label>
                    <select x-model="department" name="department" id="department" class="form-select">
                        <option value="">-- Select Course --</option>
                        <template x-for="course in courses" :key="course">
                            <option x-text="course" :value="course"></option>
                        </template>
                    </select>
                </div> -->

                <!-- Submit -->
                <button type="submit" class="btn btn-primary w-100 fw-bold">Next</button>
            </form>
        </div>
    </div>
</div>

<script>
    // function formHandler() {
    //     return {
    //         level: '',
    //         department: '',
    //         courses: [],
    //         ndCourses: [
    //             "Computer Science", "Computer Engineering", "SLT", "Business Admin", "Accounting", "Electrical Engineering",
    //             "Quantity Surveying", "Civil Engineering", "Architectural Technology", "Estate Management & Valuation"
    //         ],
    //         hndCourses: [
    //             "Software Development", "Micro Biology", "BioChemistry", "Architectural Technology",
    //             "Estate Management & Valuation", "Quantity Surveying"
    //         ],
    //         updateCourses() {
    //             if (this.level.startsWith('ND')) {
    //                 this.courses = this.ndCourses;
    //             } else if (this.level.startsWith('HND')) {
    //                 this.courses = this.hndCourses;
    //             } else {
    //                 this.courses = [];
    //             }
    //             this.department = ''; // reset selected department
    //         },
    //         submitForm() {
    //             if (!this.level || !this.department) {
    //                 alert('Please select both level and course.');
    //                 return;
    //             }
    //             event.target.submit();
    //         }
    //     }
    // }
</script>
@endif
          @if (auth()->user()->level !== null)
<div class="min-vh-20 d-flex align-items-center justify-content-center bg-light py-4">
    <div class="card border-warning shadow-sm w-100" style="max-width: 500px;">
        <div class="card-body" x-data="formHandler()">
            <h4 class="card-title text-center text-dark mb-4">Register Courses</h4>
                <!-- Submit -->
                <a href="{{ url('/student/courses') }}">
                <button type="submit" class="btn btn-primary w-100 fw-bold">CLick Here</button>
              </a>
            </form>
        </div>
    </div>
</div>
 @endif
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