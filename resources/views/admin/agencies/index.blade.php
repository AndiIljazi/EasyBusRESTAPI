@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Create Agency
                    </div>
                    <div class="card-body">
                        <form action="{{ route("admin.agencies.store") }}" method="POST">
                            @csrf

                            <x-input name="name" label="Name*" type="text" required="true" :value="old('name')"></x-input>

                            <x-input name="contact" label="Contact" required="false" type="text" :value="old('contact')"></x-input>

                            <div>
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        All Agencies
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Contact
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($agencies as $agency)
                                <tr>
                                    <td>
                                        {{ $agency->id }}
                                    </td>
                                    <td>
                                        {{ $agency->name }}
                                    </td>
                                    <td>
                                        {{ $agency->contact ?? ''   }}
                                    </td>
                                    <td>
                                        <a class="icon" href="{{ route('admin.agencies.edit', $agency->id) }}">
                                            <i class="fe fe-edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
