<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete blog entry</h5>
              </div>
              <div class="modal-body">
                Are you sure to delete?
              </div>
              <div class="modal-footer">
              <form method="post">
                  <input class="btn btn-danger btn-sm" type="submit" value="Delete" />
                  @method('delete')
                  @csrf
              </form>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Delete</button>
              </div>
            </div>
          </div>
        </div>