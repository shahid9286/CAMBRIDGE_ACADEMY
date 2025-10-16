@extends('admin.layouts.master')
@section('title', 'All Users')
@section('content')
<div class="container">
    <h2>Package List</h2>
<a href="{{ route('admin.package.add') }}" class="btn btn-success mb-3">Add New Package</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Title</th>
                <th>Amount</th>
                <th>Discount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
                <tr>
                    <td><img src="{{ asset('assets/admin/uploads/package/' . $package->icon) }}" width="50"></td>
                    <td>{{ $package->title }}</td>
                    <td>AED {{ $package->amount }}</td>
                    <td>
                        AED {{ $package->discounted_amount }}
                        <br>
                        <small>({{ number_format((($package->amount - $package->discounted_amount)/$package->amount)*100, 2) }}% off)</small>
                    </td>
                    <td>
                        <a href="{{ route('admin.package.edit', $package->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.package.delete', $package->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

