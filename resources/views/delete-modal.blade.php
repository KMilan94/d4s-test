<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete blog entry</h5>
      </div>
      <div class="modal-body">
        Sure to delete?
      </div>
      <div class="modal-footer">
        <form action="{{ url('delete') }}" method="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="blog-id" id="delete-modal-blog-id">
          <button class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button class="btn btn-danger btn-sm ml-2" type="submit">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>