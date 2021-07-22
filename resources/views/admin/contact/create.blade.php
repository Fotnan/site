@extends('admin.admin_master')

@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create Contact</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('store.contact') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="email">Contact Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">

                    </div>
                    <div class="form-group">
                        <label for="phone">Contact Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                    </div>
                    <div class="form-group">
                        <label for="address">Contact Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

