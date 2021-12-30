<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete blog entry</h5>
      </div>
      <div class="modal-body">
        Are you sure to delete?
      </div>
      <div class="modal-footer">
        <form action="{{ url('delete') }}" method="post">
          @method('DELETE')
          @csrf
          <input type="hidden" name="blog-id" id="delete-modal-blog-id">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button class="btn btn-danger btn-sm" type="submit">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>