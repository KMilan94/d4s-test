<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add new blog entry</h5>
              </div>
              <div class="modal-body">
                <form action="{{ url('create') }}" method="post">
                  @csrf  
                  @method('POST')
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" aria-describedby="titleHelp" 
                      placeholder="Enter title" maxlength="20">
                    <small id="titleHelp" class="form-text text-muted">Title of the new blog entry</small>
                  </div>
                  <div class="form-group mb-4">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" aria-describedby="contentHelp" 
                      placeholder="Write something cool" maxlength="250" rows="6"></textarea>
                    <small id="contentHelp" class="form-text text-muted">Content of the new blog entry</small>
                  </div>
                    <button type="button" class="btn btn-secondary btn-sm mr-auto" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>