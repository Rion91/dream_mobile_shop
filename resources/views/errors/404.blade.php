<x-main>
    <div class="container-fluid d-flex" style="height: 100vh">
        <!-- 404 Error Text -->
        <div class="my-auto mx-auto">
            <div class="text-center">
                <div class="error mx-auto" data-text="404">404</div>
                <p class="lead text-gray-800 mb-5">Page Not Found</p>
                <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                <a href="{{route('login')}}">&larr; Back to Dashboard</a>
            </div>
        </div>
    </div>
</x-main>
