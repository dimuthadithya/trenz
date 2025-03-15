<x-admin-app-layout>
    <table class="table mb-0 align-middle bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Status</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
            <x-admin.users-row :user="$user"></x-admin.users-row>
            @endforeach
        </tbody>
    </table>
</x-admin-app-layout>