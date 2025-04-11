<x-admin-app-layout>
    <form action="{{ route('admin.categories.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3 row">
            <div class="col-md-12">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
                <div class="invalid-feedback">
                    Please provide a category name.
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
    <form action="{{ route('admin.categories.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3 row">
            <div class="col-md-12">
                <label for="subcategory_name" class="form-label">Subcategory Name</label>
                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" required>
                <div class="invalid-feedback">
                    Please provide a subcategory name.
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-12">
                <label for="parent_category" class="form-label">Select Parent Category</label>
                <select class="form-control" id="parent_category" name="parent_category_id" required>
                    <option value="">Choose parent category...</option>
                    @foreach ($mainCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please select a parent category.
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Subcategory</button>
    </form>

    <script>
        // Bootstrap 5 form validation
        (function() {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</x-admin-app-layout>