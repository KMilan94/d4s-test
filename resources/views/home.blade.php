<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>D4S Test</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="bg-light text-dark">
  <div class="container">

    <!-- Header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4 text-primary">D4S Blog</h1>
        <p class="lead text-secondary">Laravel CRUD app</p>
      </div>
    </div>

    <h5>Select filter</h5>
    <select class="select2-multiple form-control" name="filters[]" multiple="multiple" id="filters">
      @foreach($categories as $category)
      <option value="{{ $category }}">{{ $category }}</option>
      @endforeach
    </select>

    <div class="card mb-4 mt-4" style="width: 10rem;">
      <button type="button" class="btn btn-primary btn-sm add-button" data-toggle="modal" data-target="#add-modal">Add new</button>
    </div>

    <!-- Content -->
    @if($blogs->isEmpty())
    <div class="card empty-blog mt-4">
      <div class="card-body">
        <p class="card-text">No blog entry found. Add a new one with the 'Add new' button.</p>
      </div>
    </div>
    @else
    @foreach($blogs as $blog)
    <div class="card blog mt-4" id="blog-{{ $blog->id }}">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title">{{ $blog->title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $blog->category }}</h6>
      </div>
      <div class="card-body">
        <p class="card-text">{{ $blog->content }}</p>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <span class="text-secondary">{{ $blog->updated_at }}</span>
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-sm btn-outline-info edit-button" data-toggle="modal" data-target="#edit-modal" data-id="{{ $blog->id }}">Edit</button>
          <button type="button" class="btn btn-sm btn-outline-danger delete-button ml-2" data-toggle="modal" data-id="{{ $blog->id }}" data-target="#delete-modal">Delete</button>
        </div>
      </div>
    </div>
    @include('empty-filter')
    @endforeach
    @endif

    @include('delete-modal')
    @include('add-modal')
    @include('edit-modal')

    <!-- Load 3rd party dependencies via CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      const categories = @json($categories);

      $(document).ready(function() {

        // Init modals
        $('body').on('click', '.delete-button', function(event) {
          event.preventDefault();
          let id = $(this).attr('data-id')
          $('#delete-modal-blog-id').val(id);
        });

        $('body').on('click', '.edit-button', function(event) {
          event.preventDefault();
          let id = $(this).attr('data-id')
          let blog = $(`#blog-${id}`);
          let title = blog.find('.card-title').html();
          let content = blog.find('.card-text').html();
          let category = blog.find('.card-subtitle').html();
          $('#edit-modal-title').val(title);
          $('#edit-modal-content').val(content);
          $('#edit-modal-blog-id').val(id);
          $("#edit-modal-categories").val(category).trigger('change.select2');
        });

        // Register select2 instances
        $('#filters').select2({
          placeholder: "Select",
          allowClear: true
        });

        $('#add-modal-categories').select2({
          minimumResultsForSearch: -1
        });

        $('#edit-modal-categories').select2({
          minimumResultsForSearch: -1
        });

        $('#filters').on('select2:select select2:unselect', function(e) {
          let blogCount = $(".blog").length;
          if (!blogCount) return;
          let filterValues = $(this).val();
          let hiddenBlogCount = 0;

          $(".blog").each(function(index) {
            if (!filterValues.length) {
              $(this).show();
            } else {
              let blogCategory = $(this).find('.card-subtitle').html().trim();
              if (filterValues.includes(blogCategory)) {
                $(this).show();
              } else {
                hiddenBlogCount++;
                $(this).hide();
              }
            }
          });

          if (hiddenBlogCount < blogCount) {
            $("#empty-filter").addClass('d-none');
          } else {
            $("#empty-filter").removeClass('d-none');
          }
        });
      });
    </script>
</body>

</html>