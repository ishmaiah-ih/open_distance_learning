@extends('admin.common')
@section('title', 'Dashboard | LuggageListings')
@section('content')

    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>
                        Luggage's List
                    </h4>

                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped table-hover mb-0" id="myTable">
                        <thead class="text-center">
                        <tr>

                            <th>Customer-Id</th>
                            <th>LuggageItemName</th>
                            <th>Character 1</th>
                            <th>Character 2</th>
                            <th>Character 3</th>
                            <th>Created At</th>

                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($luggageItems as $luggageItem)

                            <tr>
                                <td>{{ $luggageItem->customer_id}}</td>
                                <td>{{ $luggageItem->luggage_name}}</td>
                                <td>{{ $luggageItem->char_1}}</td>
                                <td>{{ $luggageItem->char_2}}</td>
                                <td>{{ $luggageItem->char_3}}</td>
                                <td>{{ $luggageItem->created_at}}</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
