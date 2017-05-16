<?php 
include"funkcjephp.php";
$zalogowanyuser="anonimowy";

?>


<!DOCTYPE html>

<html>
    <head>
    <!--
        Customize the content security policy in the meta tag below as needed. Add 'unsafe-inline' to default-src to enable inline JavaScript.
        For details, see http://go.microsoft.com/fwlink/?LinkID=617521
    -->
        <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self' 'unsafe-inline' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *"> -->
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" />
        <link href="css/app.css" rel="stylesheet" />
        <link href="css/themes/1/challenge-app1.min.css" rel="stylesheet" />
        <link href="css/themes/1/jquery.mobile.icons.min.css" rel="stylesheet" />
        <link href="../../lib/jqm/1.4.4/jquery.mobile.structure-1.4.4.min.css" rel="stylesheet" />

        <title>MobileApp</title>
    </head>
    <body>
        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="scripts/platformOverrides.js"></script>
        <script type="text/javascript" src="scripts/index.js"></script>
        <!-- <script src="scripts/ewa.js"></script> -->
        <script src="scripts/jquery-1.8.0.min.js"></script>
        <script src="scripts/jquery.mobile-1.4.5.min.js"></script>

        <div data-role="page" id="pageMain">
            <div data-role="header" class="header">
                <h1>Challenge App</h1>
            </div>
			
            <div id="divMain" data-role="main" class="ui-content">
					<?php d_usr($zalogowanyuser) ?>
                <h2 class="mc-text-center">Welcome!</h2>
                <a href="#pageAbout" class="ui-btn">About...</a>
                <p class="mc-top-margin-1-5"><b>Existing Users</b></p>
                <a href="#dlgSignIn" class="ui-btn ui-btn-b ui-corner-all" >Sign In</a>
                <p class="mc-top-margin-1-5"><b>Don't have an account?</b></p>
                <a href="#dlgSignUp" class="ui-btn ui-btn-b ui-corner-all">Sign Up</a>
            </div>
            <footer data-role="footer" data-position="fixed">
                <p>&copy; Copyright Ewa Kołodziejczyk & DJ_LKP & trochę Kornel 2017</p>
            </footer>
        </div>

        <div data-role="page" id="pageAbout">
            <div data-role="header" class="header">
                <h1 id="app-title">Challenge App</h1>
            </div>
            <div id="divMain" data-role="main" class="ui-content">
                <p>Test pobierania tabel z bazy:</p>
				<p><?php
					
					print"<br> userowie";
					$zapytanie="select * from users";
					wd($con, $zapytanie);
					print"<br>czelendże <br>";
					$zapytanie="select * from challanges";
					wd($con, $zapytanie);
					print"<br> przypisania <br>";
					$zapytanie="select * from us_ch";
					wd($con, $zapytanie);
					?>
				</p>
				
				<p> 
					Dane serwera PHP: </br>
					<?php  phpinfo() ?>
				</p>
                <a href="#pageMain" class="ui-btn">Ok</a>
            </div>
            <footer data-role="footer" data-position="fixed">
                <p>&copy; Copyright Ewa Kołodziejczyk & DJ_LKP & trochę Kornel 2017</p>
            </footer>
        </div>

        <div data-role="page" data-dialog="true" id="dlg-right-credentials">
            <div data-role="header">
        <a href="#pageMain" data-direction="reverse" class="ui-btn-left ui-btn  ui-btn-icon-notext ui-corner-all ui-icon-back">Back</a>
                <h1>Challenge App</h1>
				<?php d_usr($zalogowanyuser) ?>
                <p class="mc-top-margin-1-5">If you are ready make a choice you must click to the right-hand or left-hand corner</p>
                <a href="#popupNested" data-rel="popup" class="ui-btn-right ui-btn ui-btn-icon-notext ui-corner-all ui-icon-bullets" data-transition="pop"></a>
                <!--<a href="#pageMain" data-direction="reverse" class="ui-btn-left ui-btn ui-btn-icon-notext ui-corner-all ui-icon-back">Back</a> -->
                    <div data-role="popup" id="popupNested">
                    <div data-role="collapsibleset" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d" style="margin:0; width:250px;">
                        <div data-role="collapsible" data-inset="false">
                            <h2>Challenge App</h2>
                                <ul data-role="listview">
                                    <li><a href="#dlgNazwa">Create challenge</a></li>
                                    <li><a href="#dlgLista">Take the challenge</a></li>
                                </ul>
                        </div><!-- /collapsible -->
                    </div><!-- /collapsible set -->
                </div><!-- /popup -->
           </div>
        </div>

        
        <div data-role="page" id="dlgSignIn">
            <div data-role="header">
                <h1>Challenge App</h1>
            </div><!-- /header -->
            <div id="divMain" class="ui-content">
                <h3>Sign In</h3>
                <label for="txt-email">E-mail Address</label>
                <input type="text" name="txt-email" id="txt-email" value=""><br><br>
                <label for="txt-password">Password</label>
                <input type="password" name="txt-password" id="txt-password" value="">
                <fieldset data-role="controlgroup">
                    <input type="checkbox" name="chck-rememberme" id="chck-rememberme" checked="">
                    <label for="chck-rememberme">Remember me</label>
                </fieldset>
                <a href="#dlg-invalid-credentials" data-rel="popup" data-transition="pop" data-position-to="window" id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Submit</a>

                    <div data-role="popup" id="dlg-invalid-credentials" data-dismissible="false" style="max-width:400px;">
                    <div role="main" class="ui-content">
                        <h3 class="mc-text-danger">You enter the right credentials</h3>
                        <div class="mc-text-center"><a href="#dlg-right-credentials" data-direction="reverse" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">Click me</a></div>
                    </div>
                </div>
            </div><!-- /content -->
        </div><!-- /page -->

        <div data-role="page" id="dlgSignUp">
                <div data-role="header">
                    <h1>Challenge App</h1>
                </div>
                    <div role="main" class="ui-content">
                        <h3>Sign Up</h3>
                            <label for="txt-first-name">First Name</label>
                            <input type="text" name="txt-first-name" id="txt-first-name" value=""><br><br>
                            <label for="txt-last-name">Last Name</label>
                            <input type="text" name="txt-last-name" id="txt-last-name" value=""><br><br>
                            <label for="txt-email">e-Mail Address</label>
                            <input type="text" name="txt-email" id="txt-email" value=""><br><br>
                            <label for="txt-password">Password</label>
                            <input type="password" name="txt-password" id="txt-password" value=""><br><br>
                            <label for="txt-password-confirm">Confirm password</label>
                            <input type="password" name="txt-password-confirm" id="txt-password-confirm" value=""><br><br>
                            <a href="#dlg-sign-up-sent" data-rel="popup" data-transition="pop" data-position-to="window" id="btn-submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Submit</a>
                    <div data-role="popup" id="dlg-sign-up-sent" data-dismissible="false" style="max-width:400px;">
                        <div data-role="header"> <!-- do sprawdzenia -->
                            <h1>Almost done...</h1>
                        </div>
                          <div role="main" class="ui-content">
                                <h3>Confirm Your Email Address</h3>
                                <p>We sent you an email with instructions on how to confirm your email address. Please check your inbox and follow the instructions in the email.</p>
                            <div class="mc-text-center"><a href="#dlgSignIn" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>  
              
                        </div>
                    </div>
                    </div><!-- /content -->
        </div><!-- /page -->


        <div data-role="page" id="pageOne">
            <div data-role="header" class="header">
            <h1 id="app-title">Challenge App</h1>
            </div>
               <div id="mainOne" data-role="main" class="ui-content">
                <a href="#dlgNazwa" class="ui-btn" >Create challenge</a>
                <a href="#dlgLista" class="ui-btn">Take the challenge</a>
            </div>
        </div>

        <div data-role="page" data-dialog="true" id="dlgNazwa">
            <div id="divMain" data-role="dialog" class="ui-content">
                <form action="#pageCreate">
                    <label for="nazwaChallenge">Name your challenge:</label>
                    <input id="nazwaChallenge" name="nazwaChallenge" required onchange="spanName.innerText=nazwaChallenge.value" /> 
                    <a href="#pageCreate" class="ui-btn ui-btn-inline" data-icon="plus">Ok</a>
                    <a href="#pageMain" class="ui-btn ui-btn-inline" data-icon="home">Cancel</a>
                </form>
            </div>
        </div>

        <script>
            function dlgAddClick() {
                sInnHtml = listaPktCreate.innerHTML;
                sInnHtml += "<li>"
                sInnHtml += addPointDescr.value;
                sInnHtml += " ("
                sInnHtml += addPointGPS.innerText;
                sInnHtml += ")</li>"
                listaPktCreate.innerHTML = sInnHtml;
                }
        </script>

        <div data-role="page" data-dialog="true" id="dlgAddPoint">
            <div id="divMain" data-role="dialog" class="ui-content">
                <p>Dodaj punkt</p>
                <form>
                    <p>Current GPS value:</p>
                    <div id="addPointGPS">....</div>
                    <label for="addPointDescr">Description:</label>
                    <input id="addPointDescr" name="addPointDescr" required  />
                    <a href="#pageCreate" id="OKgps" class="ui-btn ui-btn-inline" onclick="dlgAddClick()">Ok</a>
                    <a href="#pageCreate" class="ui-btn ui-btn-inline">Cancel</a>
                </form>
            </div>
        </div>

        <script>
            function dlgCrtSend() {
                sTxt = "Challenge v0.1, " + nazwaChallenge.value + "\n";
                sTxt += listaPktCreate.innerText;
                //alert(sTxt);
                dlgListaSendBody.value = sTxt;
   
    }

            function dlgGetGPS() {
                //Call the Cordova Geolocation API

                navigator.geolocation.getCurrentPosition(onGetLocationSuccess); // , onGetLocationError,  { enableHighAccuracy: true });
                OKgps.disabled = true;

            }

            function onGetLocationSuccess(position) {
                //Retrieve the location information from the position object
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                addPointGPS.innerText = latitude + " " + longitude;

            }

        </script>

        <div data-role="page" id="pageCreate">
            <div data-role="header" class="header">
                <h1 id="app-title">Challenge App</h1>
            </div>
            <div id="divMain" data-role="main" class="ui-content">
                <p>Challenge: <span id="spanName">.</span></p>
                <p>Points of challenge:</p>
                <ol id="listaPktCreate">
                </ol>
                <form>
                    <a href="#dlgAddPoint" class="ui-btn ui-btn-inline" onclick="dlgGetGPS()">Add point</a>
                    <a href="#pageMain" class="ui-btn ui-btn-inline">Cancel</a>
                    <a href="#dlgListaSend" class="ui-btn ui-btn-inline" onclick="dlgCrtSend()">Ok</a>
                </form>

            </div>
            <footer data-role="footer" data-position="fixed">
                <h4>&copy; Copyright Ewa Kołodziejczyk 2017</h4>
            </footer>
        </div>

         <div data-role="page" data-dialog="true" id="dlgListaSend">
            <div id="divMain" data-role="dialog" class="ui-content">
                <form>
                    <label for="dlgListaSendBody">Send this to friend:</label>
                    <textarea id="dlgListaSendBody" name="dlgListaSendBody" required rows="6"></textarea>
                    <a href="#pageMain" class="ui-btn ui-btn-inline">Home</a>
                </form>
            </div>
        </div>
        <!-- 
Amstedam, Londyn, Paryz
51.5287718,-0.2416818
48.8585195,2.0673762
52.3742807,4.6184359
Wieliczka, Kraków, Zabierzów
49.986111,20.061667
50.061389,19.938333
50.117222,19.799722
-->
        <script>

            var aPkt = new Array(); //tablica kolejnych punktów do zaliczenia (typ:google.marker)
            var iCurrCheckPoint; //numer aktualnego punktu (index do aPkt)
            var iMaxCheckPoint; //liczba elementów w aPkt
            var oMap; // mapa - obiekt google

            function initMap() {
                
                var sTxt = punktyLista.value;

                var aArr = sTxt.split("\n");
                if(aArr.length<2) return;
                
                
                // liczymy srednia - czyli srodek mapki
                dLat=0; dLng=0;  iMaxCheckPoint=0;

                for(i=0; i<aArr.length; i++)
                {
                    var sWsp = aArr[i]
                     var aWsp=sWsp.split(",")
                     if(aWsp.length==2)
                     {
                     itLat=parseFloat(aWsp[0]);
                     itLng=parseFloat(aWsp[1]);
                     
                     dLat+=itLat;
                     dLng+=itLng;
                     iMaxCheckPoint++;
                     
                     }
                }
                 dLat/= iMaxCheckPoint; //Srednia
                 dLng/= iMaxCheckPoint;

                var pSrodek = {lat: dLat, lng: dLng};
                
                // wyliczanie poziomu zoom (wedle rozrzucenia punktow)
                 iMaxDiffLat = 0;
                 iMaxDiffLng = 0;
                for(i=0; i<aArr.length; i++)
                {
                    var sWsp = aArr[i]
                     var aWsp=sWsp.split(",")
                     if(aWsp.length==2)
                     {
                     itLat=Math.abs(parseFloat(aWsp[0])-dLat);
                     // bedzie blad liczenia gdy punkty sa -180 i +180 dlugosci geogr
                     itLng=Math.abs(parseFloat(aWsp[1])-dLng);
                     
                     if(iMaxDiffLat < itLat) iMaxDiffLat = itLat; // iMaxDiffLat= max(iMaxDiffLat,itLat)
                     if(iMaxDiffLng < itLng) iMaxDiffLng = itLng;

                     }
                }
                 
                // konwersja odleglosci na zoom
                // zoom = 6 dla Paryz, Ams, Lond
                iZoom = 4;
                if(iMaxDiffLat < 4 && iMaxDiffLng<4) iZoom=6;
                if(iMaxDiffLat < 1 && iMaxDiffLng<1) iZoom=10;


                oMap = new google.maps.Map(document.getElementById('mapek'), {
                zoom: iZoom,
                zoomControl: true, mapTypeControl: true,
                center: pSrodek});
//            
//            streetViewControl:true,
//            mapTypeId:roadmap
//                });

                iCnt=0;

                for(i=0; i<aArr.length; i++)
                {
                    var sWsp = aArr[i]
                     var aWsp=sWsp.split(",")
                     if(aWsp.length==2)
                     {
                     itLat=parseFloat(aWsp[0]);
                     itLng=parseFloat(aWsp[1]);
                     
                     var sLabel="Punkt " + iCnt;
                     iCnt = iCnt+1;
                     var oTmp  = new google.maps.Marker({position: {lat: itLat, lng: itLng}, map: oMap, label: sLabel});
                     aPkt[iCnt] = oTmp;


                     }
                }

                iCurrCheckPoint = 1;
//                var marker = new google.maps.Marker({
//                position: pSrodek,
//                map: map
//                });
               }

               function sprawdzOdleglosc(lat1,lng1,lat2,lng2)
               {
                var spZ = 6371e3; // metres sredni! promien ziemi
                var fi1 = lat1.toRadians();
                var fi2 = lat2.toRadians();
                var dfi = (lat2-lat1).toRadians();
                var delab = (lng2-lng1).toRadians();

                var firsta = Math.sin(dfi/2) * Math.sin(dfi/2) +
                        Math.cos(fi1) * Math.cos(fi2) *
                        Math.sin(delab/2) * Math.sin(delab/2);
                var firstc = 2 * Math.atan2(Math.sqrt(firsta), Math.sqrt(1-firsta));

                var firstd = spZ * firstc;

                return firstd;
               }

               if(Number.prototype.toRadians===undefined)
                {
                    Number.prototype.toRadians=function()
                    {
                    return this * Math.PI/180;
                    };
                }

               function zrobCheck() {
                navigator.geolocation.getCurrentPosition(onGetLocSuccessCheckpoint); // , onGetLocationError,  { enableHighAccuracy: true });

                   // odczytaj GPS
               }

               function onGetLocSuccessCheckpoint(position) {
                   // sprawdz odleglosc od zadanego 
                   var latitude = position.coords.latitude;
                   var longitude = position.coords.longitude;
                   var iOdl=sprawdzOdleglosc(aPkt[iCurrCheckPoint].getPosition().lat(), aPkt[iCurrCheckPoint].getPosition().lng(),latitude,longitude);
                    // if(ok) zaliczPunkt (idz dalej)
                    if(iOdl<8000) // podwójny błąd GPS (4.9 m na otwartej przestrzeni)
                    {
                        delete aPkt[iCurrCheckPoint];
                        aPkt[iCurrCheckPoint] = null;
                        iCurrCheckPoint++;
                        if(iCurrCheckPoint > iMaxCheckPoint)
                        {// TODO do pozniejszej obslugi - odeslanie wynikow etc.
                            var sMsg = "You just complete Challenge!";
                        }
                        else
                        {
                            var sMsg = "Ok, but this is not the end...";
                            // ustawienie center na wspolrzedne aktualne
                            oMap.setCenter({lat: latitude, lng: longitude });
                        }
                    }
                    else
                    {
                        // else alert(za daleko)
                    var sMsg = "Jestes " + Math.round(iOdl) + " metrów od celu"              
                    }
                    
                    alert(sMsg);
                
            }
        </script>
        <!-- <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtYOqKEGmX_qXmCsZ8X57KDOjBal3lJbI&callback=initMap">
        </script> -->

        <script async defer
            src="https://maps.googleapis.com/maps/api/js?callback=initMap">
        </script>

            <div data-role="page" data-dialog="true" id="dlgLista">
                <div id="divMain" data-role="dialog" class="ui-content">
                    <form>
                        <label for="punktyLista">Wklej tekst challenge:</label>
                        <textarea id="punktyLista" name="punktyLista" required rows="6"></textarea>
                        <a href="#pageTake" class="ui-btn ui-btn-inline" >Ok</a>
                        <a href="#pageMain" class="ui-btn ui-btn-inline">Cancel</a>
                    </form>
                </div>
            </div>      

            <div data-role="page" id="pageTake">
                <div data-role="header" class="header">
                    <h1 id="app-title">Challenge App</h1>
                </div>
                <div id="divMain" data-role="main" class="ui-content">
                    <div id="mapek" style="width: 500px; height: 500px"></div>
                    <form>
                    <a href="#pageTake" class="ui-btn ui-btn-inline" onclick="initMap()">Show Map</a>
                    <a href="#pageTake" class="ui-btn ui-btn-inline" onclick="zrobCheck()">Check point</a>
                    <a href="#pageMain" class="ui-btn ui-btn-inline">Cancel</a>
                    </form>
                </div>
                <footer data-role="footer" data-position="fixed">
                    <p>&copy; Copyright Ewa Kołodziejczyk & LKP & troche Kornel 2017</p>
                </footer>
            </div>


</body >
</html >
