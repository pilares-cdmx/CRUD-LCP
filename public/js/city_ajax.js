// postalcodes is filled by the JSON callback and used by the mouse event handlers of the suggest box
var postalcodes;
var alarm;

// this function will be called by our JSON callback
// the parameter jData will contain an array with postalcode objects
function getLocation(jData) {
  if (jData == null) {
    // There was a problem parsing search results
    return;
  }

  // save place array in 'postalcodes' to make it accessible from mouse event handlers
  postalcodes = jData.postalcodes;

  postalcodes[0].postalcode = parseInt(postalcodes[0].postalcode);

  //alert(typeof(postalcodes[0].postalcode));

  if (postalcodes.length > 1) {
    // we got several places for the postalcode
    // make suggest box visible
    document.getElementById('suggestBoxElement').style.visibility = 'visible';
    var suggestBoxHTML  = '';
    // iterate over places and build suggest box content
    for (i=0;i< jData.postalcodes.length;i++) {
      // for every postalcode record we create a html div
      // each div gets an id using the array index for later retrieval
      // define mouse event handlers to highlight places on mouseover
      // and to select a place on click
      // all events receive the postalcode array index as input parameter
      suggestBoxHTML += "<div class='suggestions' id=pcId" + i + " onmousedown='suggestBoxMouseDown(" + i +")' onmouseover='suggestBoxMouseOver(" +  i +")' onmouseout='suggestBoxMouseOut(" + i +")'> " + postalcodes[i].countryCode + ' ' + postalcodes[i].postalcode + ' - ' + postalcodes[i].placeName  +'</div>';
    }
    // display suggest box
    document.getElementById('suggestBoxElement').innerHTML = suggestBoxHTML;
  } else {
    if (postalcodes.length == 1) {


       if (postalcodes[0].postalcode > 9999 && postalcodes[0].postalcode < 10999){

           document.getElementById('state').value = 'Caceres';
       } else {

        // Si comento esta Sale provincia=cataluna en vez de barcelona para el 08170
        // y para 08005 la Poblacion viene vacia y provincia= cataluna
        document.getElementById('state').value = postalcodes[0].adminName1;
       /*document.getElementById('state').value = postalcodes[0].adminName2;
         document.getElementById('state').value = postalcodes[0].adminName3;*/


       vlen1 = document.getElementById('state');
       vlen2 = document.getElementById('state');
       vlen3 = document.getElementById('state');
       vlen4 = '';

      //alert ("ad1 fuera"+vlen1);

      /*if (vlen1.length > 1){
       // alert ("ad1 mayor a 1"+vlen1);
      }

      if (vlen2.length > 1){
       // alert ("ad2 mayor a 1"+vlen2);
      }

      if (vlen3.length > 1){
       // alert ("ad3 mayor a 1"+vlen3);
      }

      if (vlen4.length == 0){
       // alert ("ad4 mayor a 1"+vlen4);
      }*/



      /* alert("fuera admin1: "+postalcodes[0].adminName1);
       alert("fuera admin2: "+postalcodes[0].adminName2);
	   alert("fuera admin3: "+postalcodes[0].adminName3);  */

       if (postalcodes[0].adminName2 == 'undefined'){
       alert("dentro adminname undefined: "+postalcodes[0].adminName3);
          document.getElementById('state').value = postalcodes[0].adminName3;
        }

       if (postalcodes[0].adminName3 == 'undefined'){
       alert("dentro adminname undefined: "+postalcodes[0].adminName3);
          document.getElementById('state').value = postalcodes[0].adminName3;
        }


       }


      // Poblacion
      document.getElementById('city').value = postalcodes[0].placeName;


     // 03001
      if (postalcodes[0].postalcode > 3000 && postalcodes[0].postalcode < 4000){
        document.getElementById('state').value = 'Alicante';
       }



     //04006 ?
      if (postalcodes[0].postalcode > 4000 && postalcodes[0].postalcode < 5000){
        document.getElementById('state').value = 'Almeria';
       }

      if (postalcodes[0].postalcode > 8000 && postalcodes[0].postalcode < 9000){
        document.getElementById('state').value = 'Barcelona';
        //alert('es barcelona'):
       }




     //12006 ?
      if (postalcodes[0].postalcode > 12000 && postalcodes[0].postalcode < 13000){
          document.getElementById('state').value = 'Castellon';
       }

     //15010 OK
      if (postalcodes[0].postalcode > 15000 && postalcodes[0].postalcode < 16000){
          document.getElementById('state').value = 'A Coruna';
       }

	 //23760 OK
      if (postalcodes[0].postalcode > 23000 && postalcodes[0].postalcode < 24000){
          document.getElementById('state').value = 'Jaen';
       }

     //23760 OK
      if (postalcodes[0].postalcode > 25000 && postalcodes[0].postalcode < 26000){
          document.getElementById('state').value = 'Lleida';
       }

     // 11400 OK
     if (postalcodes[0].postalcode > 10999 && postalcodes[0].postalcode < 11999){
          document.getElementById('state').value = 'Cadiz';
       }

    // 45250 OK
     if (postalcodes[0].postalcode > 45000 && postalcodes[0].postalcode < 46000){
          document.getElementById('state').value = 'Toledo';
       }

// 45250 OK
     if (postalcodes[0].postalcode > 51000 && postalcodes[0].postalcode < 52000){
          document.getElementById('state').value = 'Ceuta';
       }
// 45250 OK
     if (postalcodes[0].postalcode > 52000 && postalcodes[0].postalcode < 53000){
          document.getElementById('state').value = 'Melilla';
       }





    // 05003 OK
     if (postalcodes[0].postalcode > 04999 && postalcodes[0].postalcode < 05999){
          document.getElementById('state').value = 'Avila';
       }

     // 05003 OK
     if (postalcodes[0].postalcode > 7000 && postalcodes[0].postalcode < 8000){
          document.getElementById('state').value = 'Baleares';
          //alert('codigo postal de baleares');
       }


     //33012 - Asturias-Oviedo-Gijon
      if (postalcodes[0].postalcode > 33000 && postalcodes[0].postalcode < 34000){
          document.getElementById('state').value = 'Asturias';
       }
     //33012 - Asturias-Oviedo-Gijon
      if (postalcodes[0].postalcode > 35000 && postalcodes[0].postalcode < 36000){
          document.getElementById('state').value = 'Las Palmas';
       }


      //39001 - Santander-Cantabria
      if (postalcodes[0].postalcode > 39000 && postalcodes[0].postalcode < 40000){
          document.getElementById('state').value = 'Cantabria';
       }

     // 48001 OK
     if (postalcodes[0].postalcode > 48000 && postalcodes[0].postalcode < 49000){
          document.getElementById('state').value = 'Vizcaya';
       }

         // 48001 OK
     if (postalcodes[0].postalcode > 20000 && postalcodes[0].postalcode < 21000){
          document.getElementById('state').value = 'Guipuzcoa';
       }

          // 48001 OK
     if (postalcodes[0].postalcode > 22000 && postalcodes[0].postalcode < 23000){
          document.getElementById('state').value = 'Huesca';
       }

      if (postalcodes[0].postalcode > 26000 && postalcodes[0].postalcode < 27000){
          document.getElementById('state').value = 'La Rioja';
       }

      if (postalcodes[0].postalcode > 29000 && postalcodes[0].postalcode < 30000){
          document.getElementById('state').value = 'Malaga';
       }



    }
    closeSuggestBox();
  }
}


function closeSuggestBox() {
  document.getElementById('suggestBoxElement').innerHTML = '';
  document.getElementById('suggestBoxElement').style.visibility = 'hidden';
}


// remove highlight on mouse out event
function suggestBoxMouseOut(obj) {
  document.getElementById('pcId'+ obj).className = 'suggestions';
}

// the user has selected a place name from the suggest box
function suggestBoxMouseDown(obj) {
  closeSuggestBox();
 //alert("pc: " +postalcode);
  var comp1 = postalcodes[obj].adminName1;
  var comp2 = postalcodes[obj].adminName2;

 //04510(Desplegable SI) 04006(No desplegable no)
  if (comp2.charAt(0) == 'A' && comp2.charAt(1) == 'l' && comp2.charAt(2) == 'm'){
   comp2 = "Almeria";
  }

  //12006 (NO) 12100 (SI)
  if (comp2.charAt(0) == 'C' && comp2.charAt(1) == 'a' && comp2.charAt(2) == 's' && comp2.charAt(3) == 't' && comp2.charAt(4) == 'e'){
   comp2 = "Castellon";
  }

 //24010(SI)   24191(SI)
  if (comp2.charAt(0) == 'L' && comp2.charAt(1) == 'e' && comp2.charAt(4) == 'n'){
   comp2 = "Leon";
  }

 //23211(SI)  23760(fallo acento)
 if (comp2.charAt(0) == 'J' && comp2.charAt(1) == 'a' && comp2.charAt(4) == 'n'){
   comp2 = "Jaen";
  }
 // 11008 (OK)
  if (comp2.charAt(3) == 'd' && comp2.charAt(4) == 'i' && comp2.charAt(5) == 'z'){
   comp2 = "Cadiz";
  }

 //14014 (SI)
  if (comp2.charAt(4) == 'd' && comp2.charAt(5) == 'o' && comp2.charAt(6) == 'b' && comp2.charAt(7) == 'a'){
   comp2 = "Cordoba";
  }

 //15109 (SI)
  if (comp2.charAt(0) == 'C' && comp2.charAt(1) == 'o' && comp2.charAt(2) == 'r' && comp2.charAt(3) == 'u'){
   comp2 = "A Coruna";
  }



  //alert("c1: " +comp1);
  //alert("c2: " +comp2);

  document.getElementById('city').value = postalcodes[obj].placeName;

  //document.getElementById('zone').value = postalcodes[obj].adminName1;

  //document.getElementById('zone').value = postalcodes[obj].adminName2;

  document.getElementById('state').value = comp1;

  document.getElementById('state').value = comp2;

  //alert("pc: " +postalcode);
}

// function to highlight places on mouse over event
function suggestBoxMouseOver(obj) {
  document.getElementById('pcId'+ obj).className = 'suggestionMouseOver';
}


// this function is called when the user leaves the postal code input field
// it call the geonames.org JSON webservice to fetch an array of places
// for the given postal code
function postalCodeLookup() {

			var country = document.getElementById('country').value;


  if (geonamesPostalCodeCountries.toString().search(country) == -1) {
     return; // selected country not supported by geonames
  }
  // display 'loading' in suggest box
  document.getElementById('suggestBoxElement').style.visibility = 'visible';
  document.getElementById('suggestBoxElement').innerHTML = '<img src="/images/progress_arrow.gif" border="0"><small><i>Cargando...</i></small>';

  var postalcode = document.getElementById('postcode').value;

  request = 'http://www.geonames.org/postalCodeLookupJSON?postalcode=' + postalcode  + '&country=' + country  + '&callback=getLocation';

  //alert("request: "+request);

  // Create a new script object
  aObj = new JSONscriptRequest(request);
  //alert("JSONrequest: "+aObj);
  // Build the script tag
  aObj.buildScriptTag();
  // Execute (add) the script tag
  aObj.addScriptTag();

}

// set the country of the user's ip (included in geonamesData.js) as selected country
// in the country select box of the address form
function setDefaultCountry() {
  var countrytheSelect = document.getElementById('country');
  for (i=0;i< countrytheSelect.length;i++) {
    // the javascript geonamesData.js contains the countrycode
    // of the userIp in the variable 'geonamesUserIpCountryCode'
    if (countrytheSelect[i].value == geonamesUserIpCountryCode) {
      // set the country selectionfield
      //alert(countrytheSelect[i].value);
      countrytheSelect.selectedIndex = countrytheSelect[i].value;
    }
  }
}