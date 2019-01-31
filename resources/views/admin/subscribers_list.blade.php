@extends('admin.admin-layouts.app')

@section('content')
    <main>
        <div class="container mt-4">
            <div class="row">
                <div class="col-9">
                    <h1>Subscriptions</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subscriber's Name</th>
                                <th>Email</th>
                                <th>Duration (months)</th>
                                <th>Subscribed date</th>
                                <th>Expires on</th>
                                <th>Status</th>
                                <th>
                                    Receipt
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($subscribers as $sub)
                                <tr>
                                    <td>{{$sub->id}}</td>
                                    <td>{{$sub->user->full_name}}</td>
                                    <td>{{$sub->user->email}}</td>
                                    <td>{{$sub->date_length}}</td>
                                    <td>{{$sub->subscribed}}</td>
                                    <td>{{$sub->remaining}}</td>
                                    <td>{{($sub->isConfirmed) ? 'Confirmed' : 'Unconfirmed'}}</td>
                                    <td>
                                        <a href="{{$sub->receipt}}" target="_blank">View receipt</a>
                                    </td>
                                    <td>
                                        @if(!$sub->isConfirmed)
                                            <form action="{{ route('admin.subscribe.accept') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm" name="subscribe" value="{{$sub->id}}">Accept</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>
                        Total: P {{ ($subscribers->where('isConfirmed', true)->sum('date_length') * 400)  }}
                    </p>
                </div>
            </div>
        </div>
    </main>


@endsection