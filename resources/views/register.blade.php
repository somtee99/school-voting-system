<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Register Page </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: #f1f1f1;  
}  
button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: white;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid grey;   
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
    <center> <h1> Student Register </h1> </center>   
    <form action="{{ url('register-action') }}" method="POST">  
        @csrf
        @method('POST')
        <div class="container">   
            <label>First Name : </label>   
            <input type="text" placeholder="Enter First Name" name="first_name" required>  

            <label>Last Name : </label>   
            <input type="text" placeholder="Enter Last Name" name="last_name" required> 

            <label>Matric No : </label>   
            <input type="text" placeholder="Enter Matric No" name="matric_no" required> 

            <label>Email : </label>   
            <input type="text" placeholder="Enter Email" name="email" required>  

            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required> 

            <button type="submit">Register</button>
            <a href="{{ url('login') }}"> Already Have an Account?  </a>
             
        </div>   
    </form>     
</body>     
</html> 