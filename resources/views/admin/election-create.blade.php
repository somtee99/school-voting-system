<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Create Election </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: pink;  
}  
button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head>    
<body>    
    <center> <h1> Create Election </h1> </center>  
    
    <a href="{{ url('elections') }}">
        <button>Show Elections Results</button> 
    </a>

    <form action="{{ url('admin/election/create-action') }}" method="POST">  
        @csrf
        @method('POST')
        <div class="container">   
            <label>Election Position : </label>   
            <input type="text" placeholder="Enter Election's Position" name="position" required>  
            <label>Election Commences : </label>   
            <input type="datetime-local" placeholder="Enter Election's Start Time" name="start_time" required> 
            <label>Election Ends : </label>   
            <input type="datetime-local" placeholder="Enter Election's End Time" name="end_time" required> 
            </br>
            <label>Candidate 1 Name : </label>   
            <input type="text" placeholder="Enter First Candidate's Name" name="candidate1" required>
            <label>Candidate 2 Name : </label>   
            <input type="text" placeholder="Enter Second Candidate's Name" name="candidate2" required>
            <label>Candidate 3 Name : </label>   
            <input type="text" placeholder="Enter Third Candidate's Name" name="candidate3">
            <label>Candidate 4 Name : </label>   
            <input type="text" placeholder="Enter Fourth Candidate's Name" name="candidate4">

            <button type="submit">Create Election</button>   
             
        </div>   
    </form>     
</body>     
</html> 