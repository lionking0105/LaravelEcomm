@extends('user.layouts.master')

@section('title','Order Detail')

@section('content')
    <div class="card">
        <h5 class="card-header">Order Edit</h5>
        <div class="card-body">
            <form action="{{route('order.update',$order->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="status">Status :</label>
                    <select name="status" id="" class="form-control">
                        <option value="">--Select Status--</option>
                        <option value="new" {{(($order->status=='new')? 'selected' : '')}}>New</option>
                        <option value="process" {{(($order->status=='process')? 'selected' : '')}}>process</option>
                        <option value="delivered" {{(($order->status=='delivered')? 'selected' : '')}}>Delivered
                        </option>
                        <option value="cancel" {{(($order->status=='cancel')? 'selected' : '')}}>Cancel</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .order-info, .shipping-info {
            background: #ECECEC;
            padding: 20px;
        }

        .order-info h4, .shipping-info h4 {
            text-decoration: underline;
        }

    </style>
@endpush