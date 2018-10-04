// APP CONSTRUCTOR
  function App() {

  // all our lets
  let _weatherService,
      _weatherTitleData,
      _weatherConditionData,
      _weatherForecastData,
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

    // nodes for colour changes
    _weatherElementColourForecastOne = document.querySelector(".forecastDayOneColour");
    _weatherElementColourForecastTwo = document.querySelector(".forecastDayTwoColour");
    _weatherElementColourForecastThree = document.querySelector(".forecastDayThreeColour");

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

            _weatherForecastData = data.query.results.channel.item.forecast[0];

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

        console.log(_weatherConditionData)

        // templates before setting the string attributes/text elements
        tempTitle += `
            ${_weatherTitleData}
        `;

        tempCondition += `
            Current weather condition is ${_weatherConditionData['text']} with ${_weatherConditionData['temp']}°C

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


        // TODO - MESSY CODE FOR NOW - CHANGE COLOR BASED ON HIGH TEMP
        if(_weatherForecastDayOneData['high'] > 25){   
            _weatherElementColourForecastOne.setAttribute('diffuseColor', '1 0 0')
        } else if (_weatherForecastDayOneData['high'] >= 5)  {
            _weatherElementColourForecastOne.setAttribute('diffuseColor', '1 0.5 0.25')
        } else if (_weatherForecastDayOneData['high'] >= 15)  {
            _weatherElementColourForecastOne.setAttribute('diffuseColor', '0 1 0')
        } else if (_weatherForecastDayOneData['high'] > 25)  {
            _weatherElementColourForecastOne.setAttribute('diffuseColor', '1 0 0')
        }

        if(_weatherForecastDayTwoData['high'] > 25){   
            _weatherElementColourForecastTwo.setAttribute('diffuseColor', '1 0 0')
        } else if (_weatherForecastDayTwoData['high'] >= 15)  {
            _weatherElementColourForecastTwo.setAttribute('diffuseColor', '1 0.5 0.25')
        } else if (_weatherForecastDayTwoData['high'] >= 5)  {
            _weatherElementColourForecastTwo.setAttribute('diffuseColor', '0 1 0')
        } else if (_weatherForecastDayTwoData['high'] < 5)  {
            _weatherElementColourForecastTwo.setAttribute('diffuseColor', '0 0 1')
        }

        if(_weatherForecastDayThreeData['high'] > 25){   
            _weatherElementColourForecastThree.setAttribute('diffuseColor', '1 0 0')
        } else if (_weatherForecastDayThreeData['high'] >= 5)  {
            _weatherElementColourForecastThree.setAttribute('diffuseColor', '1 0.5 0.25')
        } else if (_weatherForecastDayThreeData['high'] >= 15)  {
            _weatherElementColourForecastThree.setAttribute('diffuseColor', '0 1 0')
        } else if (_weatherForecastDayThreeData['high'] > 25)  {
            _weatherElementColourForecastThree.setAttribute('diffuseColor', '1 0 0')
        }


                   
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