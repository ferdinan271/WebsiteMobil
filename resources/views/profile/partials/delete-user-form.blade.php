<div class="card">
  <div class="card-header ">
    Delete Account
  </div>
  <div class="card-body">
    <h5 class="card-title">Once deleted, all account data will be permanently deleted...</h5>
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
      Delete Account
    </button>
  
    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteAccountModalLabel">Are you sure?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')
  
            <div class="modal-body">
              <p>Once deleted, all account data will be permanently deleted...</p>
  
              <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger">Delete</button>  
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>