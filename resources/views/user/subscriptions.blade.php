@extends('user.user-layouts.app')

@section('content')
    <main>
        <div class="container mt-4 mb-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <h2>Current subscriptions</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Confirmation</th>
                                <th>Duration (months)</th>
                                <th>Date subscribed</th>
                                <th>Until</th>
                                <th>Receipt</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @foreach($subscriptions as $sub)
                                <tr>
                                    <td>{{ ($sub->isConfirmed) ? 'Confirmed' : 'Unconfimed' }}</td>
                                    <td>{{ $sub->date_length }}</td>
                                    <td>{{ $sub->subscribed }}</td>
                                    <td>{{ $sub->remaining }}</td>
                                    <td>
                                        @if(!is_null($sub->receipt))
                                            <a href="{{ $sub->receipt }}">View receipt</a>
                                        @else
                                            NO RECEIPT
                                        @endif
                                    </td>
                                    <td>
                                        @if(is_null($sub->receipt))
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadReceiptModal" data-subid="{{$sub->id}}">
                                                Add receipt
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subscriptionModal">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="subscriptionModal" tabindex="-1" role="dialog" aria-labelledby="subscriptionModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subscriptionModalTitle">Add a subscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.subscribe.confirm') }}" method="POST">
                    @csrf
                    <p>
                        For only P400.00 / month, we'll help you promote your properties.
                    </p>
                        <div class="form-group">
                            <label for="">Select your subscription</label>
                            <select name="subscription" id="" class="form-control">
                                <option value="1">1 month</option>
                                <option value="2">2 months</option>
                                <option value="3">3 months</option>
                                <option value="12">12 months</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadReceiptModal" tabindex="-1" role="dialog" aria-labelledby="uploadReceiptModalLabel"
        aria-hidden="true">
        <div class="modal-dialog model-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('user.subscribe.upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadReceiptModalLabel">Upload receipt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="sub_id" id="sub_id" value="">
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="receipt" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload receipt</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#uploadReceiptModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var sub_id = button.data('subid')
            var modal = $(this)
            modal.find('#sub_id').val(sub_id);
        });
    
    </script>
@endsection