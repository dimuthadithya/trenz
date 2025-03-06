<x-app-layout>
    <div class="container">
        <div class="mx-auto mt-5 col-lg-6">
            <div class="mb-5">
                <div class="">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="mb-5">
                <div class="l">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <!-- 
            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> -->
        </div>
    </div>
</x-app-layout>