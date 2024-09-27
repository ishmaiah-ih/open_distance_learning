@if(session('success'))
    <span id="success-message" class="alert alert-success alert-dismissible fade show my-1" role="alert">

        <p class="text-white">  {{ session('success') }}</p>
    </span>
@endif



@if ($errors->any())
    <div id="flash-message" class="alert alert-danger p-1 my-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-white">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif











<script>
    // Hide the flash message after 4 seconds (4000 milliseconds)
    setTimeout(function () {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.transition = "opacity 0.5s ease"; // Add smooth fade out
            flashMessage.style.opacity = "0";
            setTimeout(function () {
                flashMessage.remove(); // Remove element from DOM
            }, 500); // Wait for the fade-out transition to finish
        }
    }, 4000); // 4 seconds
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 4000); // 4 seconds
        }
    });
</script>
