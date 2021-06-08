<!DOCTYPE HTML>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <title>Szukaj w Google</title>
        <link rel="icon"  href="icon.png">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="style_results.css">
        <link rel="stylesheet" type="text/css" href="v-autocompleter.css">
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="./v-autocompleter.js"></script>
      </head>
@@ -28,7 +28,13 @@
            <img src="google.png" class="logo">
            <form><br><br>
                <div class="search_elements">
                <div id="app">
                    {{ googleSearch }}
                    <input type="text" v-model="googleSearch" @input="findResultsDebounced" />
                    <div v-for="city in results" :key="city.name">
                    <span class="name">{{ city.name }}</span>
                    </div>
                  </div>
                  <div id="app">
                    {{ googleSearch }}
                    <input type="text" v-model="googleSearch" @input="findResultsDebounced" />
                    <div v-for="city in results" :key="city.name">
                    <span class="name">{{ city.name }}</span>
                    </div>
                  </div>
                    <img src="search_icon.png" class="search_icon"/>
                    <img src="mic.png" class="search_voice"/>
                    <input  type="button" class="search_button" value="Sukaj w google"/>
@@ -238,27 +244,24 @@ <h2>Podobne wyszukiwania</h2>
</body>
<script>
    var app = new Vue({
  var app = new Vue({
      el: '#app',
      data: {
        googleSearch: '',
          results: []
         
      },
      methods: {
        showResults(newValue) {
          this.enterValues.push(newValue);

          if (this.change_class == 0){
            this.change_class = 1;
          }
          else{
            this.$emit('input', '');
            this.change_class = 0;
          }
        }
      methods : {
          findResultsDebounced : Cowboy.debounce(100, function findResultsDebounced() {
              console.log('Fetch: ', this.googleSearch)
              console.log(`http://localhost:8080/search?name=${this.googleSearch}`);
              fetch(`http://localhost:8080/search?name=${this.googleSearch}`)
                  .then(response => response.json())
                  .then(data => {
                      console.log('Data: ', data);
                      this.results = data;
                  });
          })
      }
  });
  })
  </script>
  </html> 

        <script src="./v-autocompleter.js"></script>
      </head>

      <body> 

        <div id="app" :class="[change_class == 1 ? 'results' : 'home']"> 
          
        <nav class="nav_tools">
            <a href ="#">Gmail</a>
            <a href ="#">Grafika</a>
            <img src="bars.png" class="google_apps" role="button"></img>
            <button>Zaloguj się</button>
        </nav>
    
        <section class="search">
            <img src="google.png" class="logo">
            <form><br><br>
                <div class="search_elements">
                  <v-autocompleter v-model="googleSearch" :options="cities" @enter="showResults"></v-autocompleter>
                    <img src="search_icon.png" class="search_icon"/>
                    <img src="mic.png" class="search_voice"/>
                    <input  type="button" class="search_button" value="Sukaj w google"/>
                    <input  type="button" class="search_button" value="Szczęśliwy traf"/>
                </div>
            </form>
        </section>
    
        <footer class="home_futter">
            <h4>Polska</h4>
            <div class="links">
                <div class="link_1">
                    <a href="#">O nas</a>
                    <a href="#">Reklamuj się</a>
                    <a href="#">Dla firm</a>
                    <a href="#">Jak działa wyszukiwarka</a>
                </div>
                <div class="link_2">
                    <a href="#"><img src="leaf.png" class="leaf">Nautralność węglowa od 2007 roku</a>
                </div>
                <div class="link_3">
                    <a href="#">Prywatność</a>
                    <a href="#">Warunki</a>
                    <a href="#">Ustawienia</a>
                </div>
            </div>
        </footer>
    
        <div class="top_nav">
    
            <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png"  alt="">
    
            <ul class="accountOptions">
              <li><a href="#"><img src="bars.png" class="google_apps" role="button"></a></li>
              <li><button class="signIn" type="button" name="button">Zaloguj się</button></li>
            </ul>
    
            <div class="search_tools">
    
              <div class="search_elem">
                <input ref="second" type="text" v-model="googleSearch"/>
                <img src="loupe_icon.png" class="search_icon">
                <img src="mic.png" class="search_voice">
                <img src="keyboard.png" class="search_keyboard">
                <div class="line"></div>
                <img src="x.png" class="search_x">
              </div>
    
              <ul class="search_options">
                <li class="left active"><a href="#">Wszystko</a></li>
                <li class="left"><a href="#">Wiadomości</a></li>
                <li class="left"><a href="#">Grafika</a></li>
                <li class="left"><a href="#">Wideo</a></li>
                <li class="left"><a href="#">Mapy</a></li>
                <li class="left"><a href="#">Więcej</a></li>
                <li class="right"><a class="tools" href="#">Narzędzia</a></li>
                <li class="right"><a href="#">Ustawienia</a></li>
              </ul>
              
            </div>
    
        </div> 
    
        <div class="searchResults">

    <p class="results_number">Około 3 520 000 000 wyników (0,87 s)</p>

    <div class="result">
        <a class="link" href="#">https://pl.wikipedia.org</a>
        <h2><a href="#">Australia – Wikipedia, wolna encyklopedia</a></h2>
        <p>Jest zamieszkiwane przez 25 mln osób, z czego 2/3 populacji mieszka w pięciu największych australijskich metropoliach. Australia jest krajem wysoko ...</p>
    </div>


    <div class="result">
        <a class="link" href="#">https://en.wikipedia.org</a>
        <h2><a href="#"> Australia - Wikipedia</a></h2>
        <p>Australia, officially the Commonwealth of Australia, is a sovereign country comprising the mainland of the Australian continent, the island of Tasmania, and ...</p>
    </div>

    
    <div class="result">
        <a class="link" href="#">https://www.australia.com</a>
        <h2><a href="#">Tourism Australia: Visit Australia - Travel & Tour Information</a></h2>
        <p>Become inspired to travel to Australia. Discover fantastic things to do, places to go and more. Visit the official site of Tourism Australia here.</p>
    </div>


    <div class="result">
        <a class="link" href="#">https://www.gov.pl</a>
        <h2><a href="#">Australia - Ministerstwo Spraw Zagranicznych - Portal Gov.pl</a></h2>
        <p>Australia. Bezpieczeństwo. Światowa Organizacja Zdrowia uznała epidemię wywołaną wirusem SARS-CoV-2 za pandemię. W związku z pogarszającą się ...</p>
    </div>

  
    <div class="result">
        <a class="link" href="#">https://www.australia.gov.au</a>
        <h2><a href="#">Coronavirus (COVID-19) - Official Australian Government ...</a></h2>
        <p>The official Australian Government response website to provide support and updates to Australians on the Coronavirus pandemic.</p>
    </div>




    <div class="result">
        <a class="link" href="#">https://www.bbc.com</a>
        <h2><a href="#">Australia - BBC News</a></h2>
        <p>Get the latest BBC World News: international news, features and analysis from Africa, the Asia-Pacific, Europe, Latin America, the Middle East, South Asia, and ...</p>
    </div>

 

    <div class="result">
        <a class="link" href="#">https://www.dfat.gov.au</a>
        <h2><a href="#">Homepage | Australian Government Department of Foreign ...</a></h2>
        <p>The department provides foreign, trade and development policy advice to the government. We work with other government agencies to ensure that Australia's ...</p>
    </div>

  

    <div class="result">
        <a class="link" href="#">https://www.homeaffairs.gov.au</a>
        <h2><a href="#">Australian Department of Home Affairs</a></h2>
        <p>Home Affairs brings together Australia's federal law enforcement, national and transport security, criminal justice, emergency management, multicultural affairs, ...</title></p>
    </div>


<br>

<div class="related_results">

  <h2>Podobne wyszukiwania</h2>

  <table>
    <tr>
      <td>Australia ciekawostki</td>
      <td>Australia kontynent</td>
    </tr>
    <tr>
      <td>Sydney</td>
      <td>Historia Australii</td>
    </tr>
    <tr>
      <td>Canberra</td>
      <td>Nowa Zelandia</td>
    </tr>
    <tr>
      <td>Australia po angielsku</td>
      <td>Australia stany</td>
    </tr>
  </table>

</div>

<br><br>

<table class="pages">
    <tr>
      <td><span class="blue">G</span></td>
      <td><span class="red">o</span></td>
      <td><span class="yellow">o</span></td>
      <td><span class="yellow">o</span></td>
      <td><span class="yellow">o</span></td>
      <td><span class="yellow">o</span></td>
      <td><span class="yellow">o</span></td>
      <td><span class="yellow">o</span></td>
      <td><span class="yellow">o</span></td>
      <td><span class="yellow">o</span></td>
      <td><span class="yellow">o</span></td>
      <td><span class="blue">g</span></td>
      <td><span class="green">l</span></td>
      <td><span class="red">e</span></td>
      <td rowspan="2" style="width: 10px;"></td>
      <td><span class="blue arrow">></span></td>
    </tr>

    <tr>
      <td class="page_nr"></td>
      <td class="page_nr" style="color: black; cursor: text;">1</td>
      <td class="page_nr">2</td>
      <td class="page_nr">3</td>
      <td class="page_nr">4</td>
      <td class="page_nr">5</td>
      <td class="page_nr">6</td>
      <td class="page_nr">7</td>
      <td class="page_nr">8</td>
      <td class="page_nr">9</td>
      <td class="page_nr">10</td>
      <td colspan="3"></td>
      <td class="page_nr">Następna</td>
    </tr>

  </table>
</div>

<div class="footer">

  <div class="localization">
  <p>
    <a class="country">Polska</a>
    <a class="loc"><strong>Jelesnia</strong> - Z Twojego adresu internetowego </a>
    <a class ="loc_more">- Użyj dokładnej lokalizacji</a><a class ="loc_more"> - Dowiedz się więcej</a>
  </p>
</div>

  <ul>
      <li><a href="#">Pomoc</a></li>
      <li><a href="#">Prześlij opinię</a></li>
      <li><a href="#">Prywatność</a></li>
      <li><a href="#">Warunki</a></li>
  </ul>
  
</div>
</div>
</body>

<script>
    var app = new Vue({
      el: '#app',
      data: {
        enterValues: [],
        cities: window.cities,
        change_class: 0,
        googleSearch: '',
      },
      methods : {
          findResultsDebounced : Cowboy.debounce(100, function findResultsDebounced() {
              console.log('Fetch: ', this.googleSearch)
              console.log(`http://localhost:8080/search?name=${this.googleSearch}`);
              fetch(`http://localhost:8080/search?name=${this.googleSearch}`)
                  .then(response => response.json())
                  .then(data => {
                      console.log('Data: ', data);
                      this.results = data;
                  });
          })
      }
  });
  </script>
  </html>



































