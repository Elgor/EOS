@extends('layouts.app')

@section('content')

<div class="container">

    <h4 class="d-flex">COMPARE</h4>
    <div class="line"></div>
    <table class="table table-bordered sm-header">
        <tbody>
            <tr>
                <th style="border:solid Transparent!important; border-width: 1px 0 0px 1px"></th>
                {{-- @foreach ($collection as $item) --}}
                <td class="text-center">Images</td>
                {{-- @endforeach --}}

            </tr>
            <tr>
                <th class="th-borderless" scope="row">Package Name</th>
                {{-- @foreach ($collection as $item) --}}
                <td class="text-center">Name</td>
                {{-- @endforeach --}}
            </tr>
            <tr>
                <th class="th-borderless" scope="row">Seller Name</th>
                {{-- @foreach ($collection as $item) --}}
                <td class="text-center">Seller</td>
                {{-- @endforeach --}}
            </tr>
            <tr>
                <th class="th-borderless" scope="row">Price</th>
                {{-- @foreach ($collection as $item) --}}
                <td class="text-center">Price</td>
                {{-- @endforeach --}}
            </tr>
            <tr>
                <th class="th-borderless" scope="row">Feature</th>
                {{-- @foreach ($collection as $item) --}}
                <td class="text-center">Feature</td>
                {{-- @endforeach --}}
            </tr>
            <tr>
                <th class="th-borderless" scope="row">City</th>
                {{-- @foreach ($collection as $item) --}}
                <td class="text-center">City</td>
                {{-- @endforeach --}}
            </tr>
            <tr>
                <th class="th-borderless" scope="row">Rating</th>
                {{-- @foreach ($collection as $item) --}}
                <td class="text-center">Rating</td>
                {{-- @endforeach --}}
            </tr>
            <tr>
                <th class="th-borderless" scope="row">Completed Transaction</th>
                {{-- @foreach ($collection as $item) --}}
                <td class="text-center">10</td>
                {{-- @endforeach --}}
            </tr>
            <tr>
                <th class="th-borderless align-middle" scope="row">Action</th>
                {{-- @foreach ($collection as $item) --}}
                <td class="text-center">
                    <div>
                        <a class="btn btn-danger" href="" role="button">
                            Delete</a>
                        <a class="btn btn-success" href="" role="button">
                            Add to Cart</a>
                    </div>
                </td>
                {{-- @endforeach --}}
            </tr>
        </tbody>
    </table>
</div>
@endsection
