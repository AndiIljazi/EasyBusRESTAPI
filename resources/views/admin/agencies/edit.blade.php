@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Agency</h3>
                        <div class="card-options">
                            <form action="{{ route('admin.agencies.destroy', $agency->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-outline-danger">
                                    <i class="fe fe-trash-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route("admin.agencies.update", [$agency->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <x-input name="name" type="text" label="Title*" required="true"
                                     :value="$agency->name"></x-input>
                            <x-input name="contact" type="text" label="Contact" required="false"
                                     :value="$agency->contact ?? ''"></x-input>

                            <div class="d-flex">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Schedule</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route("admin.schedule.store", $agency->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="start_location">Start Location*</label>
                                <select name="start_location" id="start_location"
                                        class="form-control {{ $errors->has('start_location') ? 'is-invalid' : '' }}">
                                    <option value="">--Please choose an option--</option>
                                    <option value="gostivar">Gostivar</option>
                                    <option value="tetove">Tetove</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="end_location">End Location*</label>
                                <select name="end_location" id="end_location"
                                        class="form-control {{ $errors->has('end_location') ? 'is-invalid' : '' }}">
                                    <option value="">--Please choose an option--</option>
                                    <option value="gostivar">Gostivar</option>
                                    <option value="tetove">Tetove</option>
                                    <option value="shkup">Shkup</option>
                                    <option value="itali">Itali</option>
                                    <option value="zvicer">Zvicer</option>
                                    <option value="gjermani">Gjermani</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="time">Time*</label>
                                <input class="form-control {{ $errors->has('time') ? 'is-invalid' : '' }}" type="time"
                                       id="time" name="time" min="04:00" max="21:00">
                            </div>

                            <div class="d-flex">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">Schedules</div>

                    <div class="card-body">
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Start Location</th>
                                <th>End Location</th>
                                <th>Time</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>
                                        {{ ucfirst($schedule->start_location) }}
                                    </td>
                                    <td>
                                        {{ ucfirst($schedule->end_location) }}
                                    </td>
                                    <td>
                                        {{ $schedule->time }}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.schedule.destroy', $schedule->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-xs btn-outline-danger">
                                                <i class="fe fe-trash-2"></i>
                                            </button>
                                        </form>
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
