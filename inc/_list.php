<?php
$url = "http://f2eclass.com/service/?method=getPhotoList";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
$photos = json_decode($data);
curl_close($ch);
?><!-- #list (start) -->
<div id="list">
    <div class="mod-content">
        <div class="bd">
            <ul class="clearfix">
<?php
      foreach ($photos as $photo):
          $img = "http://farm{$photo->farm}.staticflickr.com/{$photo->server}/{$photo->id}_{$photo->secret}_m.jpg";
          $title = $photo->title;
?>
                <li>
                    <div class="photo">
                        <a href="<?php echo $img; ?>" target="_blank" class="photo-link">
                            <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($title); ?>" width="240">
                        </a>
                        <div class="title"><?php echo htmlspecialchars($title); ?></div>
                    </div>
                </li>
<?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- #list (end) -->