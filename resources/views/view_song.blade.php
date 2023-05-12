@extends('index')
@section('title', 'song')

@section('isihalaman')
    <h3><center>Music List of Roses Music Store</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSongPlus"> 
        Add Data Song
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">Number</td>
                <td align="center">Title</td>
                <td align="center">Singer</td>
                <td align="center">Genre</td>
                <td align="center">Price</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($song as $index=>$bk)
                <tr>
                    <!-- <td align="center" scope="row">    </td> -->
                    <td>{{$bk->id}}</td>
                    <td>{{$bk->Title}}</td>
                    <td>{{$bk->Singer}}</td>
                    <td>{{$bk->Genre}}</td>
                    <td>{{$bk->Price}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSongEdit{{$bk->Number}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Buku -->
                        <div class="modal fade" id="modalSongEdit{{$bk->id}}" tabindex="-1" role="dialog" aria-labelledby="modalSongEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalSongEditLabel">Song Edit Form</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formsongedit" id="formsongedit" action="/song/edit/{{$bk->id}} " method="get" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="Number" class="col-sm-4 col-form-label">Title</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="Title" name="Title" placeholder="Input The Title">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="Singer" class="col-sm-4 col-form-label">Singer</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="Singer" name="Singer" value="{{ $bk->Singer}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="Genre" class="col-sm-4 col-form-label">Genre</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="Genre" name="Genre" value="{{ $bk->Genre}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="Price" class="col-sm-4 col-form-label">Price</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="Price" name="Price" value="{{ $bk->Price}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="addsong" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="/song/removesong/{{$bk->id}}" onclick="return confirm('Are you sure want to delete?')">
                       
                        <button class="btn btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalSongPlus" tabindex="-1" role="dialog" aria-labelledby="modalSongPlusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSongPlusLabel">Form Input Song</h5>
                </div>
                <div class="modal-body">
                    <form name="formsongadd" id="formsongadd" action="/song/addsong " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="Number" class="col-sm-4 col-form-label">Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Title" name="Title" placeholder="Input The Title">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="Singer" class="col-sm-4 col-form-label">Singer</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Singer" name="Singer" placeholder="Input Name of Singer">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="Genre" class="col-sm-4 col-form-label">Type of Genre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Genre" name="Genre" placeholder="Input Type of Genre">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="Price" class="col-sm-4 col-form-label">Price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Price" name="Price" placeholder="Enter the Price">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="addsong" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection