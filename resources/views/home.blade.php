@extends('master.layout')

@section('title')
        Todolist 
@endsection

@section('content')
<div class="container" style="margin-top: 12px;" >
	<form action="{{route('post.item')}}" method="post" >
  		<div class="input-group mb-3">
	  		<input type="text" class="form-control" placeholder="Insert your todo list here" aria-label="Recipient's username" aria-describedby="basic-addon2" name="todo_text">
	  		<div class="input-group-append">
	    		<button class="btn btn-outline-secondary" type="submit">Submit</button>
  			</div>
  		</div>
  		{{ csrf_field() }}
    </form>
	<!--list body-->
	<form action="{{route('delete.all')}}" method="post">
		<ul class="list-group" id="parent">
			@foreach($todolist as $item)
			<li class="list-group-item d-flex justify-content-between align-items-center" id="{{$item->id}}">
				<input class="form-check-input" type="checkbox" id="gridCheck" name="items[]" value="{!! $item->id !!}" style="left: 30px;">
			    <div style="margin-left: 20px;">
			    	{{$item->todolist}}
			    </div>
			    <a href="#" class="badge badge-danger" onclick="confirmDelete({{$item->id}})" ><i class="far fa-trash-alt"></i></a>
			</li>
			 @endforeach
		</ul>
		<hr>
		<button type="submit" class="btn btn-danger">Delete Selected</button>
		{{ csrf_field() }}
	</form>
	<!--end of list body-->
</div>
@endsection
@section('footer')
<div class="container" >
	<center><span>Copyright@Elbananda Permana 2019</span></center>
</div>
<script type="text/javascript"> 
    var delete_path  = '{{route('delete.item')}}';
    var todoID;
	function confirmDelete(id){
		todoID = id;
		$.ajax({
			    type: 'GET',
			    dataType: 'JSON',
			    data: { 	id: todoID  },
			    url: delete_path,
			    success: function(data){
			       var elem = document.getElementById(id);
			   		elem.parentNode.removeChild(elem);
			    },
			    error: function(xhr){
			        console.log(xhr.responseText);
			    }
			});
	}
</script>

@endsection
