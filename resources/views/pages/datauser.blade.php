@extends('layouts.master')
@section('content')			
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Data User</li>
						</ul>
					</div>

					<div class="page-content">
						@if(session('sukses'))
						<div class="alert alert-success" role="alert">
							{{session('sukses')}}
						</div>
						@endif
						<div class="row">
							<div class="col-xs-12">
								<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah">
									Tambah Data User
								</button>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-xs-12">
								<table class="table table-hover">
									<thead>
										<tr>
											<th scope="col">Nama</th>
											<th scope="col">Username</th>
											<th scope="col">Role</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
									@foreach($datauser as $row)
									<tr>
										<td>{{$row->nama}}</td>
										<td>{{$row->username}}</td>
										<td>{{$row->role}}</td>
										<td>
											<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$row->id}}">Edit
											</button>
											<a href="/deleteuser/{{$row->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
										</td>
									</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

					@foreach($datauser as $user)
					<!-- Modal Edit -->
					<div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal">&times;</button>
					                <h4 class="modal-title">Tambah Data User</h4>
					            </div>
								<div class="modal-body">
									<form action="/updateuser/{{$user->id}}" method="POST">
										{{csrf_field()}}
										<div class="form-group">
											<label for="exampleInputEmail1">Nama</label>
											<input type="text" class="form-control" name="nama" value="{{$user->nama}}" required>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Username</label>
											<input type="text" class="form-control" name="username" value="{{$user->username}}" required>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Role</label>
											<select class="form-control" id="role" name="role">
												<option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
												<option value="staff" @if($user->role == 'staff') selected @endif>Staff</option>
											</select>
										</div>
								</div>
								<div class="modal-footer">
										<button type="submit" class="btn btn-warning">Update</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					@endforeach

					<!-- Modal Tambah -->
					<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal">&times;</button>
					                <h4 class="modal-title">Tambah Data User</h4>
					            </div>
								<div class="modal-body">
									<form action="/tambahuser" method="POST">
										{{csrf_field()}}
										<div class="form-group">
											<label for="exampleInputEmail1">Nama</label>
											<input type="text" class="form-control" name="nama" required>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Username</label>
											<input type="text" class="form-control" name="username" required>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" class="form-control" name="password" required>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Role</label>
											<select class="form-control" id="role" name="role">
												<option value="admin">Admin</option>
												<option value="staff">Staff</option>
											</select>
										</div>
										<!-- <input type="hidden" name="_token" value="{{csrf_token()}"> -->
								</div>
								<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Simpan</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@stop