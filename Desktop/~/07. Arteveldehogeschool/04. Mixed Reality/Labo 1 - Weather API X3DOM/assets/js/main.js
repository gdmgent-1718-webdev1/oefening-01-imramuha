// APP CONSTRUCTOR
  function App() {

  // all our lets
  let _weatherService,
      _weatherTitleData,
      _weatherConditionData,
      _weatherForecastDayOneData,
      _weatherForecastDayTwoData,
      _weatherForecastDayThreeData;


  // initializing all whats needed in the right order
  function init(){
    
    // instance of our weatherservice & node
    _weatherService = new WeatherService();
    _weatherElementTitle = document.querySelector(".weatherTitle");
    _weatherElementCondition = document.querySelector(".weatherCondition");
    _weatherElementForecastDayOne = document.querySelector(".weatherForecastDayOne");
    _weatherElementForecastDayTwo = document.querySelector(".weatherForecastDayTwo");
    _weatherElementForecastDayThree = document.querySelector(".weatherForecastDayThree");

    // finally loading the data
    loadWeatherData();
  }

  function loadWeatherData() {
    _weatherService.loadWeather()
        .then(function(data) {

            // title for our display
            _weatherTitleData = data.query.results.channel.title

            // saving the loaded data inside _weatherData
            // current condition
            _weatherConditionData = data.query.results.channel.item.condition;

            // weather forecast for the following 3 days
            _weatherForecastDayOneData = data.query.results.channel.item.forecast[1];
            _weatherForecastDayTwoData = data.query.results.channel.item.forecast[2];
            _weatherForecastDayThreeData = data.query.results.channel.item.forecast[3];

            // has acces to data
            displayWeather();
            
        })
        .catch(function(reject) {
            alert("Sorry, there was an error.")
        });
  }

  function displayWeather() {

        // a temp empty string, later used to update data innerHTML
        let tempTitle = '',
            tempCondition = '',
            tempForecastDayOne = '',
            tempForecastDayTwo = '',
            tempForecastDayThree = ''; 

        console.log(_weatherTitleData)

        // templates before setting the string attributes/text elements
        tempTitle += `
            ${_weatherTitleData}
        `;

        tempCondition += `
            Weather on:${_weatherConditionData['date']} in Gent, Oost-vlaanderen, Belgium
            ${_weatherConditionData['temp']}°C

        `;
    
        tempForecastDayOne += `
            Date: ${_weatherForecastDayOneData['date']}
            High: ${_weatherForecastDayOneData['high']}°C
            Low: ${_weatherForecastDayOneData['low']}°C
        `;

        tempForecastDayTwo += `
            Date: ${_weatherForecastDayTwoData['date']}
            High: ${_weatherForecastDayTwoData['high']}°C
            Low: ${_weatherForecastDayTwoData['low']}°C
        `;

        tempForecastDayThree += `
            Date: ${_weatherForecastDayThreeData['date']}
            High: ${_weatherForecastDayThreeData['high']}°C
            Low: ${_weatherForecastDayThreeData['low']}°C
        `;


                   
        // finally setting the consumed data to string attribute
        _weatherElementTitle.setAttribute('string', tempTitle);
        _weatherElementCondition.setAttribute('string', tempCondition);
        _weatherElementForecastDayOne.setAttribute('string', tempForecastDayOne);
        _weatherElementForecastDayTwo.setAttribute('string', tempForecastDayTwo);
        _weatherElementForecastDayThree.setAttribute('string', tempForecastDayThree);

  }

  return {
    init: init
  };

}

// init the application
const app = new App();
app.init();