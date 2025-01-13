@extends('layouts.adminmaster')
@section('content')

<div>
    <div>
        <h3><br><br></h3>
        <div>
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Languages</h4>
                      <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Add Language
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                  <!-- Modal -->
                  <div
                  class="modal fade"
                  id="addRowModal"
                  tabindex="-1"
                  role="dialog"
                  aria-hidden="true"
                >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-0">
                        <h5 class="modal-title">
                          <span class="fw-mediumbold"> New</span>
                          <span class="fw-light"> Language </span>
                        </h5>
                        <button
                          type="button"
                          class="close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        >
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                            <form action="{{ route('admin.languages.create') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @csrf
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <label for="name">name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="abbr">abbr</label>
                                        <input type="text" class="form-control" id="abbr" name="abbr" required>
                                    </div>
                                <div class="form-group col-md-6">
                                    <label for="native">native</label>
                                    <input type="text" class="form-control" id="native" name="native" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="local">local</label>
                                    <input type="text" class="form-control" id="local" name="local" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="direction">direction</label>
                                    <select class="form-control" id="direction" name="direction" required>
                                        <option value="ltr">Left To Right</option>
                                        <option value="rtl">Right To Left</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="active">status</label>
                                    <select class="form-control" id="active" name="active" required>
                                        <option value="1">active</option>
                                        <option value="0">Not active</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="flag">flag</label>
                                    <input type="file" class="form-control" id="flag" name="flag">
                                </div>
                            </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-primary">Add</button>

                                <button
                                  type="button"
                                  class="btn btn-danger"
                                  data-bs-dismiss="modal"
                                >
                                  Close
                                </button>
                            </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table
                      id="add-row"
                      class="display table table-striped table-hover"
                    >
                      <thead>
                        <tr>
                            <th>name</th>
                            <th>native</th>
                            <th>flag</th>
                            <th>abbr</th>
                            <th>local</th>
                            <th>direction</th>
                            <th>status</th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @isset($languages)


                            @foreach ($languages as $lang)
                            <tr>
                                <td>{{$lang->name}}</td>
                                <td>{{$lang->native}}</td>
                                <td><img src="{{ asset($lang->flag) }}" alt="Flag" style="height: 35px; width: 40px"/></td>
                                <td>{{$lang->abbr}}</td>
                                <td>{{$lang->local}}</td>
                                <td>{{$lang->direction}}</td>
                                <td>{{$lang->active}}</td>
                                <td>
                                <div class="form-button-action">

                                <div class="form-button-action">
<!-- #################################################################################### -->
                                <div class="form-button-action">
                                    <button
                                    class="btn btn-link btn-primary btn-lg"
                                    data-bs-toggle="modal"
                                        data-bs-target="#editRowModal{{ $lang->id }}"
                                    >
                                    <i class="fa fa-edit"></i>

                                    </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                <!-- Modal -->
                                <div
                                class="modal fade"
                                id="editRowModal{{ $lang->id }}"
                                tabindex="-1"
                                role="dialog"
                                aria-hidden="true"
                                >
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                        <span class="fw-mediumbold"> Edit</span>
                                        <span class="fw-light"> Language </span>
                                        </h5>
                                        <button
                                        type="button"
                                        class="close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                        >
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <form action="{{ route('admin.languages.update',$lang->id) }}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                @csrf
                                                <div class="form-row ">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">name</label>
                                                        <input type="text" class="form-control" id="name" name="name" required value="{{$lang->name}}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="abbr">abbr</label>
                                                        <input type="text" class="form-control" id="abbr" name="abbr" required value="{{$lang->abbr}}">
                                                    </div>
                                                <div class="form-group col-md-6">
                                                    <label for="native">native</label>
                                                    <input type="text" class="form-control" id="native" name="native" required value="{{$lang->native}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="local">local</label>
                                                    <input type="text" class="form-control" id="local" name="local" required value="{{$lang->local}}">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="direction">direction</label>
                                                    <select class="form-control" id="direction" name="direction" required value="{{$lang->direction}}">
                                                        <option value="ltr" {{ $lang->direction == "ltr" ? 'selected' : '' }}>Left To Right</option>
                                                        <option value="rtl" {{ $lang->direction == "rtl" ? 'selected' : '' }}>Right To Left</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="active">status</label>
                                                    <select class="form-control" id="active" name="active" required>
                                                        <option value="1" {{ $lang->active == 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{ $lang->active == 0 ? 'selected' : '' }}>Not Active</option>
                                                    </select>
                                                </div>
                                                <img id="flagPreview" src="{{ asset($lang->flag) }}" alt="" style="height: 35px; width: 40px"/>

                                                <div class="form-group">
                                                    <label for="flag">flag</label>
                                                    <input type="file" class="form-control" id="flag" name="flag" value="{{$lang->flag}}">
                                                </div>
                                            </div>
                                            </div>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="modal-footer border-0">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                                <button
                                                type="button"
                                                class="btn btn-danger"
                                                data-bs-dismiss="modal"
                                                >
                                                Close
                                                </button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
<!-- #################################################################################### -->
                                    <button
                                    class="btn btn-link btn-danger"
                                    >
                                    <a href="{{ route('admin.languages.destroy', $lang->id) }}"
                                        class="btn btn-link btn-danger">
                                    <i class="fa fa-times"></i>
                                    </a>
                                    </button>
                                </div></div>
                                </td>
                            </tr>
                            @endforeach
                        @endisset

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
