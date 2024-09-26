<div class="col-md-3 sidebar bg-gray-100">
    <div class="row">
        <div class="col-12 text-center"> <!-- Center content on all screen sizes -->
            <div class="image-container mb-3 mt-4 d-flex justify-content-center"> <!-- Flexbox for centering the image -->
                @if (Auth::user()->picture)
                    <img src="{{ asset('storage/' . Auth::user()->picture) }}" alt="{{ Auth::user()->name }}" class="img-fluid rounded-circle" style="max-width: 200px;"> <!-- img-fluid for responsive scaling -->
                @else
                    <img src="{{ asset('assets/img/team/team-1.jpg') }}" alt="Default Image" class="img-fluid rounded-circle" style="max-width: 150px;">
                @endif
            </div>

            <div class="text-container">
                <p style="color: #074173;" class="text-2xl font-weight-bold">{{ Auth::user()->name }}</p>
                <ul class="list-unstyled">
                    <li>Program: <span style="color: #788591; font-weight:700;">{{ Auth::user()->program }}</span></li>
                    <li>Reg Number: {{ Auth::user()->reg }}</li>
                    <li>Year: 5</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Add this CSS for better spacing and responsiveness -->
<style>
    .image-container img {
        width: 100%;
        max-width: 150px; /* Control the size on small screens */
        height: auto;
        margin-bottom: 15px; /* Add space below the image */
    }

    .text-container {
        text-align: center; /* Center text */
    }

    /* Flexbox for centering on small screens */
    @media (max-width: 576px) {
        .row {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center everything */
        }

        .image-container {
            margin-bottom: 10px;
        }

        .text-container p {
            font-size: 1.25rem; /* Adjust font size for smaller screens */
        }

        .text-container ul {
            font-size: 0.875rem; /* Adjust list size for smaller screens */
        }
    }
</style>
