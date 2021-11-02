<!-- Blog posts -->
<section class="main-content blog-single">
    <div class="container">
        <div class="row">
            <div class="post-wrap">
                <div class="col-md-9">
                    <article class="post">
                        <div class="entry-wrapper">
                            <div class="entry-box">
                                <img class="img-responsive" src="<?php echo base_url();?>uploads/agenda/<?=$images ?>" width="500" height="350px"> 
                            </div>


                            <div class="list-inline item-content">
                                <h4>Menuju ke acara :</h4>
                                <ul class="text-center">
                                    <li>
                                        <a class="btn btn-default"><h4 id="hari" class="text-center"></h4>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-default"><h4 id="jam" class="text-center"></h4>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-default"><h4 id="menit" class="text-center"></h4>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-default"><h4 id="detik" class="text-center"></h4>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="post-content">
                <h2 class="title"></h2>
                <div class="content-dropcap">
                    <p align="justify"><?=$content ?></p>
                </div>
            </div>

        </div><!-- /blog-listing -->
    </article>
</div><!-- /col-md-9 -->
<?php include('sidebar_news.php');?>
</div>
</div>
</div>
</section>

<script>

CountDownTimer("<?php echo $waktu; ?>", 'hari', 'jam', 'menit', 'detik');
function CountDownTimer(dt, id1, id2, id3,id4)
{
    var end = new Date(dt);

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        var distance1 = now - end;
        if(distance1 > 0){
            clearInterval(timer);
            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        document.getElementById(id1).innerHTML = days + ' Hari';
        document.getElementById(id2).innerHTML = hours + ' Jam';
        document.getElementById(id3).innerHTML = minutes + ' Menit';
        document.getElementById(id4).innerHTML = seconds + ' Detik';
    }

    timer = setInterval(showRemaining, 1000);
}

</script>
