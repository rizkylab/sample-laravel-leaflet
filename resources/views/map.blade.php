<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }


            #map{
                height: 500px;
                width: 100%;
            }
        </style>
    </head>
    <body>
            <div class="container">
                <div class="row">
                  <div class="main-panel">
                    <div class="content-wrapper">
                    

                    <h4>
                    <span class="badge badge-default">KATEGORI</span></h4>
                    <?php $kategori = array('Bandara', 'Terminal', 'Pelabuhan', 'Kantor', 'Angkot'); ?>
                    <input type="checkbox" name="semua" id="semua" value="semua">
                    <label for="semua" class="text-info">
                        Semua
                    </label> 
                    <br>
                    <?php foreach ($kategori as $key => $value): ?>
                        <input type="checkbox" name="kategori[]" id="{{$value}}" value="{{$value}}">
                        <label for="{{$value}}" class="text-info">
                            {{$value}}
                        </label> 
                        <br>
                    <?php endforeach ?>
                 </div>
             </div>
                 <div class="col-md-10">       
                    <div id="map"></div>
                 </div>
                           
                </div>
                
                <!--
                <div class="title m-b-md">
                    <h4><span class="badge badge-default">KATEGORI</span></h4>
                <select name='kategori'>
                        <option value="semua">SEMUA</option>
                        <option value="pelabuhan">PELABUHAN</option>
                        <option value="bandara">BANDARA</option>
                        <option value="angkot">ANGKOT</option>
                        <option value="terminal">TERMINAL</option>
                    </select>
                </div>
                -->
                
            </div>
        </div>
    </body>
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
 
    <script type="text/javascript">
        var points = {!! $points !!}
        var markersLayer = new L.LayerGroup(); 


        // $(document).ready(function(){
            var map = L.map('map').setView([-3.8253431, 102.2345381], 7);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            markersLayer.addTo(map);
            generateMap();

            $('[name="semua"]').change(function(){
                $('[name="kategori[]"]').each(function(e, obj){
                    $(obj).removeAttr('checked')
                })
                generateMap();
            })
            
            $('[name="kategori[]"]').change(function(){
                $('[name="semua"]').removeAttr('checked')
                categories = getChecked();
                generateMap(categories.join(','));
            })

        // })

        function getChecked(){
            arr = []
            checked_kategori = $('[name="kategori[]"]:checked')
            checked_kategori.each(function(e, obj){
                arr.push($(obj).val())
            })
            return arr;
        }

        function generateMap(filter='semua'){
            var LeafIcon = L.Icon.extend({
                options: {
                    iconSize:     [20, 24],
                    // iconAnchor:   [22, 22],
                    // popupAnchor:  [-3, -76]
                }
            });
            var pelabuhan = new LeafIcon({iconUrl: 'http://rizkysulistyo.com/maps/maker-pelabuhan-dibangun.png'}),
            bandara = new LeafIcon({iconUrl: 'http://rizkysulistyo.com/maps/pesawat.png'}),
            terminal = new LeafIcon({iconUrl: 'http://rizkysulistyo.com/maps/maker-terminal-b.png'}),
            kantor = new LeafIcon({iconUrl: 'http://rizkysulistyo.com/maps/maker-opd.png'}),
            angkot = new LeafIcon({iconUrl: 'http://rizkysulistyo.com/maps/maker-terminal-a.png'});

            markersLayer.clearLayers();

            $.ajax({
                url:'map/points/'+filter,
                method:'get',
                success:function(e){
                    for(i=0; i<e.length;i++){
                        var cur = e[i];
                        var text = '<div class="alert alert-default" role="alert">'+cur.nama+'</div>'+cur.alamat;
                        if(cur.kategori == 'Pelabuhan'){
                            marker = L.marker([cur.latitude, cur.longitude], {icon:pelabuhan}).addTo(map).bindPopup(text);
                        }else if(cur.kategori == 'Bandara'){
                            marker = L.marker([cur.latitude, cur.longitude], {icon:bandara}).addTo(map).bindPopup(text);
                        }else if(cur.kategori == 'Terminal'){
                            marker = L.marker([cur.latitude, cur.longitude], {icon:terminal}).addTo(map).bindPopup(text);
                        }else if(cur.kategori == 'Kantor'){
                            marker = L.marker([cur.latitude, cur.longitude], {icon:kantor}).addTo(map).bindPopup(text);
                        }else if(cur.kategori == 'Angkot'){
                            marker = L.marker([cur.latitude, cur.longitude], {icon:angkot}).addTo(map).bindPopup(text);
                        }else{
                            marker = L.marker([cur.latitude, cur.longitude]).addTo(map).bindPopup(text);
                        }
                        markersLayer.addLayer(marker); 
                    }

                    markersLayer.addTo(map);
                }
            })
        }
    </script>
</html>
