      <x-admin-app-layout>
          <div class="container">
              <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="form-group">
                      <label for="slug">Slug</label>
                      <input type="text" class="form-control" id="slug" name="slug" required>
                  </div>
                  <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                  </div>
                  <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" class="form-control" id="price" name="price" required>
                  </div>
                  <div class="form-group">
                      <label for="stock">Stock</label>
                      <input type="number" class="form-control" id="stock" name="stock" required>
                  </div>
                  <div class="form-group">
                      <label for="main_image">Main Image</label>
                      <input type="file" class="form-control-file" id="main_image" name="main_image" required>
                  </div>
                  <div class="form-group">
                      <label for="category">Main Category</label>
                      <select class="form-control" id="category" name="parent_category_id" required>
                          <option value="">Select Category</option>
                          @foreach ($parentCategories as $category)
                          <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="category">Sub Category</label>
                      <select class="form-control" id="category" name="child_category_id" required>
                          <option value="">Select Category</option>
                          @foreach ($childCategories as $category)
                          <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="other_images">Other Images (Up to 5)</label>
                      <input type="file" class="form-control-file" id="other_images" name="other_images[]" multiple>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </x-admin-app-layout>