@extends('layouts.master')

@section('content')
    <div class="mt-3 ml-3">
            <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Tabel Proyek</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                <a href="/proyek/create" class="mb-2 btn btn-primary">Buat Proyek Baru</a>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">NO</th>
                      <th>Judul Proyek</th>
                      <th>Deskripsi</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($proyek as $key => $post)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td style="display: flex;">
                                <a href="/proyek/{{$post->id}}" class="btn btn-info btn-sm">Show</a>
                                <a href="/proyek/{{$post->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                <form action="/proyek/{{$post->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" align="center">no question</td>
                        </tr>
                    @endforelse                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer clearfix"> 
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div> -->
            </div>
    </div>
@endsection