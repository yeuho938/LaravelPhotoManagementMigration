<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    .box{
      width: 500px;
    }
  </style>
</head>
<body>
  <center>
    <h1 style="color: red;"> Add Photos</h1>
    <div class="box">
      <form class="form" method="POST" action="{{'/photo/'.$photoEdit->id}}" enctype="multipart/form-data">
       @csrf
       @method('PATCH')
       <div class="form-group">
        <label for="title" style="float: left; font-size: 18px;"> Title</label>        
        <input type="text" name="title" class="form-control" value="{{$photoEdit->title}}">
      </div>
      <div class="form-group">
        <label for="category" style="float: left; font-size: 18px;"> Choose Category</label><br>
        <select name="category" id="category" class="form-control" >
         @foreach($categories as $category) 
         <option value="{{$category->id}}"> {{$category->name}}</option>
         @endforeach
       </select>       
     </div>
     <div class="form-group">
      <label for="image" style="float: left; font-size: 18px;">Image</label> 
      <input type="file" name="image" class="form-control" >       
    </div>
    <div class="form-group">
      <label for="tags" style="float: left; font-size: 18px;"> Choose Tag</label><br>
      <select class="form-control" multiple="multiple" name="tags[]" id="tags" > 
        @foreach($tags as $tag) 
        <option value="{{$tag->id}}">{{$tag->name}}</option>    
        @endforeach    
      </select>

    </div>
    <div class="form-group">
      <label for="description" style="float: left; font-size: 18px;">Description</label> 
        <input type="text" name="description" class="form-control" value="{{$photoEdit->description->content}}">  
    </div>
    <button type="submit" class="btn btn-default" style=" font-size: 18px; color:green ;"> Add</button>
  </form>
</div>
</center>
</body>
</html>
