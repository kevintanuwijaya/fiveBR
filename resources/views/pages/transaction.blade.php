@extends('layout')
@section('title','Transaction History')
@section('main')
    <div class="p-4 overflow-scroll scroll" style="width: 90vw; height: 85vh;">

        @if ($transactions != null)
            <table class="table table-striped">
                <thead>
                    <tr class="table-light" style="color: gray;">
                        <th scope="col">SELLER NAME</th>
                        <th scope="col">GIG TITLE</th>
                        <th scope="col">TYPE</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">TRANSACTION DATE</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($transactions as $transaction)
                    <tr>
                        <td scope="row">{{ $transaction->gig->user->name }}</td>
                        <td>{{ $transaction->gig->title }}</td>
                        <td>{{ $transaction->type }}</td>
                        @php
                            $price = 0;
                            $type = $transaction->type;
                            
                            if($type == "Basic")
                            {
                                $price = $transaction->gig->basic_price;
                            }
                            else
                            if($type == "Standard")
                            {
                                $price = $transaction->gig->standard_price;
                            }
                            else
                            if($type == "Premium")
                            {
                                $price = $transaction->gig->premium_price;
                            }
                        @endphp

                        <td>{{ $price }}</td>
                        <td>{{ $transaction->created_at->format('D, M d, Y h:i A')}}</td>
                        <td>
                            <a type="button" class="btn" href="/gig/{{ $transaction->gig_id }}" style="color: #699D91;">View</a>
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>    

            {{ $transactions->links() }}
        @endif
    </div>
@endsection