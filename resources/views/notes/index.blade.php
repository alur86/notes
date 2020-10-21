@extends('layouts.app')

@section('content')
<div class="container spark-screen">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading"><h2>Notes Area</h2></div>
<div class="panel-body">
<h3>Notes</h3>
<table class="table table-striped">  
<thead>  
<tr>  
<th>Id</th>  
<th>Title</th> 
<th>Body</th>
</tr>  
</thead>  
<tbody> 
<div class="panel-body table-responsive">
<router-view name="notesIndex"></router-view>
<router-view></router-view>
</div>
</tbody>  
</table>   
</div>
@endsection

