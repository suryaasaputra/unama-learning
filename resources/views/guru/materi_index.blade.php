@extends('guru.layout')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Daftar Materi    
        </div>

        <div class="card-body">
            <a href="{{ url('guru/materi/create?jenis=video') }}" class="btn btn-primary btn-sm">
            Buat Materi Link Video</a>
            <a href="{{ url('guru/materi/create?jenis=teks') }}" class="btn btn-primary btn-sm">
            Buat Materi Teks</a>
            <a href="{{ url('guru/materi/create?jenis=file') }}" class="btn btn-primary btn-sm">
            Buat Materi File</a>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th colspan="2" >Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($model as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                        @if ($item->jenis=="file")
                                            <a href="{{ \Storage::url($item->isi) }}" class="nav-link">
                                            Unduh file
                                            </a>
                                        @else 
                                            {!! $item->isi !!}
                                        @endif
                                    </td>
                                    <td>
                                        
                                        <a href="{{ url('guru/materi/'.$item->id.'/edit') }}" class="btn btn-success btn-sm">
                                        Edit
                                        </a>

                                       
                                    
                                    </td>
                                    <td>
                                        {!! Form::open(['url'=>'guru/materi/'.$item->id,'method'=>'DELETE']) !!}

                                        <button type="submit" class="btn btn-danger btn-sm  ">Hapus</button>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Data Tidak Ada</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
        </div>
    </div>
</div>
@endsection
