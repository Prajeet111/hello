<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather app</title>
</head>
<!--style tag helps to make your webpage attractive-->>
<style>
    .weather table{
        padding: 50px 25px;
        border-radius: 20px 20px 20px 20px;
        color: rgb(97, 97, 97);
        font-size: x-large;
        background-color: rgba(255, 248, 220, 0.678)   

    }
    #g1{
        color :rgb(31, 29, 29)
    }
    #back{
         background-image: url('./5.jpeg');
         background-size: 1540px 750px;
         background-repeat: no-repeat;
         
         
    }
    .icon{
       
       margin-left: 125px;
    }
    h1{
        color: white;
    }
    
    </style>

    <!--javascript code to retrieve live weather data from the OpenWeatherMap API -->
    <script>

    // Register service worker
    if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
    navigator.serviceWorker.register('Serviceworker.js').then(function(registration) {
    // Registration was successful
    console.log('ServiceWorker registration successful');
    }, function(err) {
    // registration failed :(
    console.log('ServiceWorker registration failed: ', err);
    });
    });
    
    }
    
    // Check browser cache first, use if there and less than 10 seconds old
    if(localStorage.when != null
    && parseInt(localStorage.when) + 1000 > Date.now()) {
    let freshness = Math.round((Date.now() - localStorage.when)/1000) + " second(s)";
            document.getElementById("description").innerHTML=localStorage.description
            document.getElementById("city").innerHTML=localStorage.city
            document.getElementById("tem").innerHTML=localStorage.tem+"°C"
            document.getElementById("humidity").innerHTML=localStorage.humidity + "%"
            document.getElementById("speed").innerHTML=localStorage.speed+"km/hr"
            document.getElementById("pre").innerHTML=localStorage.pre + " hPa"
            document.getElementById("maxtem").innerHTML=localStorage.maxtem+"°C"
            document.getElementById("mintem").innerHTML=localStorage.mintem+"°C"
            document.getElementById("datetimes").innerHTML=localStorage.datetimes
            document.getElementById("LastUpdate").innerHTML = freshness;
    
    } 
    // No local cache, access network
    else 
    {
    // Fetch weather data from API for given city
    fetch('retrive-api.php?city=Kathmandu') //retrive the data from the php.
    // Convert response string to json object
    .then(response => response.json())
    .then(response => {

    // Copy one element of response to our HTML paragraph
            document.getElementById("description").innerHTML=response.weather_description
            document.getElementById("city").innerHTML=response.weather_city
            document.getElementById("tem").innerHTML=response.weather_temperature+"°C"
            document.getElementById("humidity").innerHTML=response.weather_humidity + "%"
            document.getElementById("speed").innerHTML=response.weather_speed+"km/hr"
            document.getElementById("pre").innerHTML=response.weather_pressure + " hPa"
            document.getElementById("maxtem").innerHTML=response.weather_maxtemp+"°C"
            document.getElementById("mintem").innerHTML=response.weather_mintemp+"°C"
            document.getElementById("datetimes").innerHTML=response.weather_datetimes
            document.getElementById('icon').src=` http://openweathermap.org/img/wn/${response.weather_icon}@2x.png`
    
    // Save new data to browser, with new timestamp

    localStorage.description = response.weather_description;
    localStorage.tem = response.weather_temperature + '°';
    localStorage.when = Date.now(); // milliseconds since January 1 1970
    localStorage.city = response.weather_city;
    localStorage.humidity = response.weather_humidity;
    localStorage.speed = response.weather_speed;
    localStorage.pre = response.weather_pressure;
    localStorage.maxtem = response.weather_maxtemp;
    localStorage.mintem = response.weather_mintemp;
    localStorage.datetimes = response.weather_datetimes;
    
    
    })
    .catch(err => {
        if(localStorage.when != null) {

    // Get data from browser cache
    let freshness = Math.round((Date.now() - localStorage.when)/1000) + " second(s)";
            document.getElementById("description").innerHTML=localStorage.description
            document.getElementById("city").innerHTML=localStorage.city
            document.getElementById("tem").innerHTML=localStorage.tem+"°C"
            document.getElementById("humidity").innerHTML=localStorage.humidity + "%"
            document.getElementById("speed").innerHTML=localStorage.speed+"km/hr"
            document.getElementById("pre").innerHTML=localStorage.pre + " hPa"
            document.getElementById("maxtem").innerHTML=localStorage.maxtem+"°C"
            document.getElementById("mintem").innerHTML=localStorage.mintem+"°C"
            document.getElementById("datetimes").innerHTML=localStorage.datetimes
            document.getElementById("LastUpdate").innerHTML = freshness; 
    } 
    else
     {
    // Display errors in consolee
    console.log(err);
    }
    
    
    });
    }
    </script>
<body id="back">
    <h1 align="center">Weather app</h1>
    <!--structure of the application-->
    <div class="weather">
        <table align="center">
            
            <tr>
                <th id="g1">Current weather</th>
            </tr>
            <tr>
                <td><img id="icon" src=""></td>
                
            </tr>
            <tr>
                <td>City:</td>
                <td id='city'></td>
                
            </tr>
            <tr>
                <td>Description:</td>
                <td id='description'></td>
                
            </tr>
            <tr>
                <td >Temperature :</td>
                <td id="tem"></td>
            </tr>
            <tr>
                <td >Maximum temperature :</td>
                <td id="maxtem"></td>
            </tr>
            <tr>
                <td >Minimum temperature :</td>
                <td id="mintem"></td>
            </tr>
        
            <tr>
                <td >Pressure :</td>
                <td id="pre"></td>
            </tr>
            <tr>
                <td >Humidity :</td>
                <td id="humidity"></td>
            </tr>
            <tr>
                <td >Wind Speed :</td>
                <td id="speed"></td>
            </tr>     
            <tr>
                <td >Date/Time :</td>
                <td id="datetimes"></td>
            </tr>  
            <tr>
                <td >Last Update:</td>
                <td id="LastUpdate"></td>
            </tr>                  
        </table>
        

    </div>
</body>
</html>