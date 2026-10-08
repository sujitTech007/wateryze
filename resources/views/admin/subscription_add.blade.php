@include('admin.include.header')


 <!-- Form Card -->
  <div class="content-area">
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form>

                <div class="row">

                    <!-- Plan Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Plan Name</label>
                        <input type="text" class="form-control" placeholder="e.g. Basic / Pro / Enterprise">
                    </div>

                    <!-- Plan Price -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price (USD)</label>
                        <input type="number" class="form-control" placeholder="e.g. 9.99">
                    </div>

                    <!-- Billing Period -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Billing Period</label>
                        <select class="form-select">
                            <option>Monthly</option>
                            <option>Yearly</option>
                        </select>
                    </div>

                    <!-- Usage Limit -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Usage Limit</label>
                        <input type="text" class="form-control" placeholder="e.g. 10K L/month">
                    </div>

                    <!-- Features -->
                    <div class="col-12 mb-3">
                        <label class="form-label">Plan Features</label>
                        <textarea class="form-control" rows="4"
                            placeholder="Enter one feature per line"></textarea>
                        <small class="text-muted">
                            Example: Up to 10K L/month, Email support, Analytics
                        </small>
                    </div>

                    <!-- Popular Toggle -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Popular Plan</label>
                        <select class="form-select">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>

                </div>

                <!-- Buttons -->
                <div class="text-end mt-4">
                    <button type="reset" class="btn btn-light me-2">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Save Plan
                    </button>
                </div>

            </form>

        </div>
    </div>
    </div>

</div>
@include('admin.include.footer')