<div class="col-md-3 sidebar bg-gray-100">
    <div class="row ">
        <div class="col-md-12 col-sm-6 ">

            <div class="image-container mb-4">
                @if (Auth::user()->picture)
                    <img src="{{ asset('storage/' . Auth::user()->picture) }}" alt="{{ Auth::user()->name }}">
                @else
                    <img src="{{ asset('assets/img/team/team-1.jpg') }}" alt="Default Image">
                @endif
            </div>


            <div class="text-container">
                <p style="color: #074173;" class="text-2xl">{{Auth::User()->name}}</p>
                <ul>
                    <li>Program: <span style="color: #788591; font-weight:700;">{{Auth::User()->program}}</span></li>
                    <li>Reg Number: {{Auth::User()->reg}}</li>
                    <li>Year: 5</li>
                </ul>
            </div>
        </div>
    </div>
</div>
