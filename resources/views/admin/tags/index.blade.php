
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<center><h3> List of Tags</h3></center>
	<div class="container">
		<div class ="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Name Tag</th>	
						<th scope="col">Delete</th>	
						<th scope="col">Edit</th>						
					</tr>
				</thead>
				@foreach($tags as $tag)
				<tbody>
					<tr>
						<th scope="row"> {{$tag->id}}</th>
						<td>{{$tag->name}}</td>						
						<td>
							<form action='{{"/tag/".$tag->id}}' method ="POST">
								@csrf 
								@method("DELETE")
								<button type="submit" name ="delete" style="margin-left: 30px; border: 1px; background: pink; font-size: 17px;"> Delete </button>      
							</form>
						</td>
						<td>
							<a href='{{"/tag/".$tag->id."/edit"}}'> Edit</a>
						</td>
					</tr>			
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>