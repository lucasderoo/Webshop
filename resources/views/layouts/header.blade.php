<!DOCTYPE HMTL>
<html>
<head>
    <title>Webshop</title>
    <!-- META -->
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
</head>
<body>
<style>
* 
{
 font-family: Arial;
} 

body{
    margin-top: 0;  /* make the website go into the top-left corner/make sure it doesn't have whitespace anywhere */
    margin-left: 0;
    margin-right:0;
    margin-bottom:0;
}

#main{
    position: fixed;
    background: white;
    border-style: solid;
    border-width: 1px;
    border-color:gray;
    width:100%;
    top:0;
    left:0;
    }

    

#small{
    height:50px; 
    position: fixed;
    background: #3b83f7;
    width:100%;
    top:0;
    left:0;
    }


    .button {
        background-color: #3b83f7;
        color: white; /* White text */
        cursor: pointer;
        float: right; /* make header elements huddle next to each other */
        height: 50px;
        width: 100px;
        font-size: 20px;
        text-align:center;
        line-height: 50px; /* trick to center vertically */
    }

    /* Add a background color on hover */
    .button:hover {
        background-color: #46494c;
    }
    
    /* Make the background lighter upon clicking */
    .button:active{
      background-color:#646a70;
    }

    .headertext {
        color: white; 
        float: left; /* make header elements huddle next to each other */
        height: 50px;
        width: 100px;
        font-size: 24px;
        text-align:center;
        line-height: 50px; /* trick to center vertically */
    }




</style>
<div class="row">
    <div class="col-md-12">
        <div id="main"> 
                <header id="small">
                    <a class="headertext"><div>Logohere</div></a> 
                    <a class="button"><div>Account</div></a>
                    <a class="button"><div>Cart🛒</div></a>
                    <a class="button"><div>Home</div></a>
                </header> 
            </div>
        </div>
</div>