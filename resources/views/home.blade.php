<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>D4S Test</title>
        <link rel="stylesheet" href="../css/app.css">
    </head>
    <body>
      <div class="container">

        <!-- Header --> 
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">D4S Blog</h1>
            <p class="lead">Laravel CRUD app</p>
          </div>
        </div>

        <div class="card mb-4" style="width: 10rem;">
          <button type="button" class="btn btn-primary btn-sm add-button" data-toggle="modal" data-target="#addModal">Add new</button>
        </div>

        <!-- Content -->
        @if(empty($blogs))
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">No blog entries yet.. add a new one with the 'Add new' button.</h5>
            </div>
          </div>
        @else
          @foreach($blogs as $blog)
            <div class="card mb-4" id="blog-{{ $blog-> id }}">
              <div class="card-header">{{ $blog->title }}</div>
              <div class="card-body">
                <h5 class="card-title">{{ $blog->content }}</h5>
              </div>
              <div class="card-footer text-muted">
                <button type="button" class="btn btn-sm btn-outline-info edit-button" 
                  data-toggle="modal" data-target="#editModal" data-id="{{ $blog->id }}">Edit</button>
                <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
              </div>
            </div>
          @endforeach
        @endif

        <!-- Include modals -->
        @include('delete-modal')
        @include('add-modal')

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
