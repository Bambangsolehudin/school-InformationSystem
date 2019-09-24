@extends('layouts.master')      

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-md-6"> 
        <div class="panel">
        <div class="panel-heading"> 
                @if (session('status'))
                        <div class="alert alert-success">
                           {{ session('status') }}
                        </div>
                @endif  
         <h3 class="panel-title">Ranking 5 Besar</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                 <th>RANKING</th>
                                                <th>NAMA</th>
                                                <TH>NILAI</TH>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            

                                            @foreach (ranking5besar() as $s)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$s->nama_lengkap()}}</td>
                                                <td>{{$s->rataRataNilai}}</td>
                                            </tr>

                                            @endforeach
                                           
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-user"></i></span>
                                        <p>
                                            
                                            <span class="number">

                                            {{$count}}</span>
                                          
                                            <span class="title">Total Siswa</span>
                                        </p>
                                    </div>
                             </div>

                             <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-user"></i></span>
                                        <p>
                                            
                                            <span class="number">

                                            {{$count1}}</span>
                                          
                                            <span class="title">Total Guru</span>
                                        </p>
                                    </div>
                             </div>
                    </div>
                </div>
            </div>
        </div>
        
@stop