
function WeatherService() {

    var apiKey = "a397e98a53354347b3a04126182709"; 
    const URL = "https://query.yahooapis.com/v1/public/yql?q=select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='gent') and u='c'&format=json";
     
    function loadWeather() {
       
        return AJAX.getJSONByPromise(URL);

    }
 
    return {
       loadWeather: loadWeather
    }
};
