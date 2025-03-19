<x-admin-app-layout>
    <div class="container">
        <table class="table mb-0 align-middle bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th>Orders</th>
                    <th>Payments</th>
                    <th>Status</th>
                    <th>Since</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $user )
                <x-admin.users-row :user="$user"></x-admin.users-row>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-app-layout>