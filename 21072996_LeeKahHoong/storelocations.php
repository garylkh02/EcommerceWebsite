<?php
include 'logtimeout.php';
?>
<?=h_header('Store Location')?>

<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="CSS.css">
    </head>
    <body>
        <div class="recentlyadded content-wrapper">
            <h2>Store Locator<br></h2>
        </div>
        <div class="storebox">
                <div class="storeleft">
                    <div class="location">
                        <h2 style="font-size:20px;margin-left:0px;">Green Stuff KL</h2>
                        <table>
                            <tr>
                                <td style="padding-right:15px;padding-bottom:5px;"><img src="./imgs/location.png" class="locationicon" alt="phone icon"></td>
                                <td style="font-size:15px;padding-bottom:5px;">8 Jalan 7/118B Desa Tun Razak, 56000, Kuala Lumpur</td>
                            </tr> 
                            <tr>
                                <td style="padding-right:15px;padding-bottom:5px;"><img src="./imgs/phone1.png" class="locationicon" alt="phone icon"></td>
                                <td style="font-size:15px;padding-bottom:5px;">03-9171 9464</td>
                            </tr>
                            <tr>
                                <td colspan="2">Working Hours: 10:00a.m. ~ 5.00p.m.</td>
                            </tr>
                        </table> 
                        <button type="button" class="viewmapbutton" onclick="initmap(3.0785317328748008,101.7196154275835,'Green Stuff KL')">
                            View on Map
                        </button>     
                    </div>
                    <div class="location">
                        <h2 style="font-size:20px;margin-left:0px;">Green Stuff Shah Alam</h2>
                        <table>
                            <tr>
                                <td style="padding-right:15px;padding-bottom:5px;"><img src="./imgs/location.png" class="locationicon" alt="phone icon"></td>
                                <td style="font-size:15px;padding-bottom:5px;">Shah Alam Seksyen U5, Jalan Bulan U5/Ca, Subang 2, 40150 Shah Alam, Selangor</td>
                            </tr> 
                            <tr>
                                <td style="padding-right:15px;padding-bottom:5px;"><img src="./imgs/phone1.png" class="locationicon" alt="phone icon"></td>
                                <td style="font-size:15px;padding-bottom:5px;">03-7845 8931</td>
                            </tr>
                            <tr>
                                <td colspan="2">Working Hours: 10:00a.m. ~ 5.00p.m.</td>
                            </tr>
                        </table> 
                        <button type="button" class="viewmapbutton" onclick="initmap(3.160805585555711, 101.54910898169305,'Green Stuff Shah Alam')">
                            View on Map
                        </button>     
                    </div>
                    <div class="location">
                        <h2 style="font-size:20px;margin-left:0px;">Green Stuff Petaling Jaya</h2>
                        <table>
                            <tr>
                                <td style="padding-right:15px;padding-bottom:5px;"><img src="./imgs/location.png" class="locationicon" alt="phone icon"></td>
                                <td style="font-size:15px;padding-bottom:5px;">B 11 Jln Permai 2/1 Taman Subang Permai Petaling Jaya, 47500, Selangor </td>
                            </tr> 
                            <tr>
                                <td style="padding-right:15px;padding-bottom:5px;"><img src="./imgs/phone1.png" class="locationicon" alt="phone icon"></td>
                                <td style="font-size:15px;padding-bottom:5px;">03-5638 4178</td>
                            </tr>
                            <tr>
                                <td colspan="2">Working Hours: 10:00a.m. ~ 5.00p.m.</td>
                            </tr>
                        </table> 
                        <button type="button" class="viewmapbutton" onclick="initmap(3.057660836853169, 101.59910549703322,'Green Stuff Petaling Jaya')">
                            View on Map
                        </button>    
                    </div>
                </div>
                <div id="storeright" ></div>
                        <script>
                      
                        function initmap($lat,$lng,$name){
                            if ($lat == null){
                            var location= {lat: 3.11902, lng: 101.62976}; 
                            var map = new google.maps.Map(document.getElementById("storeright"),{
                               zoom: 11,
                               center: location 
                            });
                            
                            var marker = new google.maps.Marker({
                                position: {lat: 3.0785317328748008, lng: 101.7196154275835},
                                map:map
                            });
                            var infoWindow = new google.maps.InfoWindow({
                                content: 'Green Stuff KL'
                            });

                            marker.addListener('click',function(){
                                infoWindow.open(map,marker);
                            });

                            var marker1 = new google.maps.Marker({
                                position: {lat: 3.160805585555711, lng:  101.54910898169305},
                                map:map
                            });
                            var infoWindow1 = new google.maps.InfoWindow({
                                content: 'Green Stuff Shah Alam'
                            });

                            marker1.addListener('click',function(){
                                infoWindow1.open(map,marker1);
                            });
                            
                            var marker2 = new google.maps.Marker({
                                position: {lat: 3.057660836853169, lng: 101.59910549703322},
                                map:map
                            });
                            var infoWindow2 = new google.maps.InfoWindow({
                                content: 'Green Stuff Petaling Jaya'
                            });

                            marker2.addListener('click',function(){
                                infoWindow2.open(map,marker2);
                            });
                            } 
                            else{
                            var location= {lat: $lat, lng: $lng};
                            var map = new google.maps.Map(document.getElementById("storeright"),{
                               zoom: 15,
                               center: location 
                            });
                            
                            var marker = new google.maps.Marker({
                                position: location,
                                map:map
                            });
                            var infoWindow = new google.maps.InfoWindow({
                                content: $name
                            });

                            marker.addListener('click',function(){
                                infoWindow.open(map,marker);
                            });
                            } 
                        }
                    </script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJKkeU1fZWMfp0h2QTtCHUlV6bSjkHMxE&callback=initmap">
                    </script>
        </div>
    </body>
    </body>  
</html>  

<div class="row">
    <div class="col">
        <p class="abu">Feel free to join our recycling program by donating recyclable stuffs at any Green Stuff store during store operating hours, by dropping them into the Recycling Box or approaching any of our staff.
        <br><br>** Please make sure personal belongings are not with donations. Thank you!
        </p>
</div>

<style>
  .row{
    display: block;
    align-items: center;
    width: 100%;
    justify-content: space-between;
}

.row .col {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.row {
    margin-top: 50px;
}

.abu {
    padding: 0px 40px;  
    margin-top: 0px;
    text-align: justify;
    font-size: larger;
}
</style>

<?=h_footer()?>