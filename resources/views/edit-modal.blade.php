<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-label">Edit blog entry</h5>
      </div>
      <div class="modal-body">
        <form action="{{ url('update') }}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="edit-modal-title" name="title" aria-describedby="titleHelp" placeholder="Enter title" maxlength="20">
            <small id="titleHelp" class="form-text text-muted">Title of the blog entry</small>
          </div>
          <div class="form-group">
            <select id="edit-modal-categories" name="category" style="width: 100%;">
              @foreach($categories as $category)
              <option value="{{ $category }}">{{ $category }}</option>
              @endforeach
            </select>
            <small id="categoryHelp" class="form-text text-muted">Category of the new blog entry</small>
          </div>
          <div class="form-group mb-4">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="edit-modal-content" aria-describedby="contentHelp" placeholder="Write something cool" maxlength="250" rows="6"></textarea>
            <small id="contentHelp" class="form-text text-muted">Content of the blog entry</small>
          </div>
          <input type="hidden" name="blog-id" id="edit-modal-blog-id">
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm ml-2">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>