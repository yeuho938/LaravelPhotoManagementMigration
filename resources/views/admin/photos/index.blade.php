<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<center><h2>List of Photo</h2></center>
	<div class="container">
		<div class ="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Tilte</th>
						<th scope="col">Category</th>
						<th scope="col">Tag</th>
						<th scope="col">Image</th>
						<th scope="col">Description</th>
						<th scope="col">Delete </th>
						<th scope="col">Edit </th>

					</tr>
				</thead>
				@foreach($photos as $photo)
				<tbody>
					<tr>
						<th scope="row"> {{$photo->id}}</th>
						<td>{{$photo->title}}</td>
						<td>{{$photo->category->name}}</td>
						<td>
							@foreach($photo->tag as $tg)
							{{$tg->name}}
							@endforeach
						</td>
						<td><img src="{{'/storage/'.$photo->image}}" width="150px" height="150px" ></td>
						<td>{{$photo->description->content}}</td>
						<td>
							<form action='{{"/photo/".$photo->id}}' method ="POST">
								@csrf 
								@method("DELETE")
								<button type="submit" name ="delete" style="margin-left: 30px; border: 1px; background: orange; font-size: 17px;"> Delete </button>      
							</form>
						</td>
						<td>
							<a href="{{'/photo/'.$photo->id.'/edit'}}"> Edit</a>
						</td>
					</tr>			
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>