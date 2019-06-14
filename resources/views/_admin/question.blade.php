@extends('_admin.layouts.app') 
@section('title', 'Question') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Questions</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Question</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                     <div class="card-header">
                        <h4>Question List</h4>
                    </div>
                     <div style="padding-bottom:2%">
                            <button type="button" class="btn-success" data-toggle="modal" data-target="#exampleModal">
                                <i class=" glyphicon glyphicon-plus"></i> Add New
                            </button>
                        </div>
                     <table class="table table-striped card-body">
                        <thead>
                            <tr>
                            <th scope="col">SI</th>
                            <th scope="col">question</th>
                            <th scope="col">Created at</th>
                                                 
                            </tr>
                        </thead>
                        <tbody>
                            @if($questions)
                            @php
                                $si=1;
                            @endphp
                               @foreach($questions as $question)
                               <tr>
                                <th scope="row">{{$si}}</th>
                                <td>{{$question->question}}</td>
                                <td>{{$question->created_at}}</td>
                               
                                </tr>
                                @php
                                    $si++;
                                @endphp
                               @endforeach
                            @endif   
                            
                        </tbody>
                    </table>
                </div>

                 <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add a new Question</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('Add/question')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="question">Question</label>
                                            <input type="text" name="question" id="question" onkeyup="findquestion()" class="form-control">
                                            <div id="question_search">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control" value="save">
                                        </div>
                                    </form>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                    {{-- modal --}}
            </div>
        </div>
    </div>
</div>
<script>
function findquestion(){
    var str=$('#question').val();
     $.ajax({
                type: 'get',
                data:{'value':str}, 
                url : '{{URL::to('question_search')}}',
              
                success:function(data){
                    console.log(data);
                    $('#question_search').html(data);
                    
                }
            })
}
</script>
@endsection