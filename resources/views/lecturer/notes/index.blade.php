@include('components.header');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Notes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Notes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">My Notes</h5>
              <a href="{{ route('lecturer.notes.create') }}" class="btn btn-primary mb-3">Upload New Note</a>

              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Course</th>
                    <th>File</th>
                    <th>Uploaded</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($notes as $note)
                    <tr>
                      <td>{{ $note->title }}</td>
                      <td>{{ $note->course->title }}</td>
                      <td>
                        <a href="{{ asset('storage/' . $note->file_path) }}" class="text-primary" target="_blank">View</a>
                      </td>
                      <td>{{ $note->created_at->diffForHumans() }}</td>
                      <td class="border p-2">
                          <div class="d-flex align-items-center gap-2">
                              <a href="{{ route('lecturer.notes.edit', $note) }}" class="btn btn-sm btn-primary">Edit</a>

                              <form action="{{ route('lecturer.notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                              </form>
                          </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="4" class="text-center">No notes uploaded.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>

              <div class="mt-3">
                {{ $notes->links() }}
              </div>
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