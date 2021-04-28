    <!--==========================
      Videos Section
    ============================-->

<section id="videos" class="wow fadeInUp" >


<div class="container-fluid">

<div class="section-header ">
  <h2>Videos</h2>
  <p>Event videos</p>
</div>

<?php


        $youtubeId = array('Vgf_U-pQxF0','qzrT-dP14qA','pkd5B6wTTZI','pQqCw8CtCrg','41uXN8c3WoU','ekzUVE7PziI');
        //Its different for all users
        $myApiKey = 'AIzaSyAPWF5yQhQeaLtZuQ1hiZU8u5nWvHMVLnQ'; 
        // $googleApi = 
        //     'https://www.googleapis.com/youtube/v3/videos?id='
        //     . $youtubeId . '&key=' . $myApiKey . '&part=snippet';

        $youtubeLink = array(
          'https://www.googleapis.com/youtube/v3/videos?id='. $youtubeId[0] . '&key=' . $myApiKey . '&part=snippet' ,
          'https://www.googleapis.com/youtube/v3/videos?id='. $youtubeId[1] . '&key=' . $myApiKey . '&part=snippet' ,
          'https://www.googleapis.com/youtube/v3/videos?id='. $youtubeId[2] . '&key=' . $myApiKey . '&part=snippet' ,
          'https://www.googleapis.com/youtube/v3/videos?id='. $youtubeId[3] . '&key=' . $myApiKey . '&part=snippet' ,
          'https://www.googleapis.com/youtube/v3/videos?id='. $youtubeId[4] . '&key=' . $myApiKey . '&part=snippet' ,
          'https://www.googleapis.com/youtube/v3/videos?id='. $youtubeId[5] . '&key=' . $myApiKey . '&part=snippet' ,
      );
       
        
        

       // $googleApi =   array($youtube_1, $youtube_2, $youtube_3);

        for($i = 0 ; $i < 6 ; $i++){
            /* Create new resource */
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            /* Set the URL and options  */
            curl_setopt($ch, CURLOPT_URL, $youtubeLink[$i] );
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            /* Grab the URL */
            $curlResource = curl_exec($ch);

            /* Close the resource */
            curl_close($ch);



            $youtubeData = json_decode($curlResource);

            $youtubeVals = json_decode(
                json_encode($youtubeData), true);

            
            $urlTitle[$i] = $youtubeVals ['items'][0]['snippet']['title'];
                
            $description[$i] = $youtubeVals['items'][0]['snippet']['description'];
        }
       
              
    ?>


<div class="grid-row reverse video-gallery ">
    
 <input type="radio" value="1" name="video-list" id="video-1" checked="checked" /><label for="video-1">{{$urlTitle[0]}}</label>
 <input type="radio" value="2" name="video-list" id="video-2" /><label for="video-2">{{$urlTitle[1]}}</label>
 <input type="radio" value="3" name="video-list" id="video-3" /><label for="video-3">{{$urlTitle[2]}}</label>
 <input type="radio" value="4" name="video-list" id="video-4" /><label for="video-4">{{$urlTitle[3]}}</label>
 <input type="radio" value="5" name="video-list" id="video-5" /><label for="video-5">{{$urlTitle[4]}}</label>
 <input type="radio" value="6" name="video-list" id="video-6" /><label for="video-6">{{$urlTitle[5]}}</label>
 <!-- videos -->
 <div class="video video-1">
  <iframe width="560" height="320" src='https://www.youtube.com/embed/{{$youtubeId[0]}}' frameborder="0" allowfullscreen></iframe>
 </div>
 <div class="video video-2">
  <iframe width="560" height="320" src='https://www.youtube.com/embed/{{$youtubeId[1]}}' frameborder="0" allowfullscreen></iframe>
 </div>

 <div class="video video-3">
  <iframe width="560" height="320" src='https://www.youtube.com/embed/{{$youtubeId[2]}}' frameborder="0" allowfullscreen></iframe>
 </div>
 <div class="video video-4">
  <iframe width="560" height="320" src='https://www.youtube.com/embed/{{$youtubeId[3]}}' frameborder="0" allowfullscreen></iframe>
 </div>
 <div class="video video-5">
  <iframe width="560" height="320" src='https://www.youtube.com/embed/{{$youtubeId[4]}}' frameborder="0" allowfullscreen></iframe>
 </div>
 <div class="video video-6">
  <iframe width="560" height="320" src='https://www.youtube.com/embed/{{$youtubeId[5]}}' frameborder="0" allowfullscreen></iframe>
 </div>

 <!-- videos -->
</div>
</div>

</section>