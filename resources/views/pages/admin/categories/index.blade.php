<x-admin-app-layout>
    <h1>Categories</h1>

    <h2>Main Categories</h2>
    @foreach ($mainCategories as $category)
    <p>{{ $category->category_name }}</p>
    @endforeach

    <h2>Sub Categories</h2>
    @foreach ($subCategories as $category)
    <p>{{ $category->category_name }}</p>
    @endforeach
</x-admin-app-layout>