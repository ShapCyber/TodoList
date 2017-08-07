   <div class="row">
    <div class="col-md-12">
        <div class="fix-width text-center banner-part">

            <div class="min-h">
                <h1 class="banner-title"><?= $SiteDescription ?></h1>
                 
            </div>

            <span class="banner-small-text">
               See everything you need to do today in <b> My Tasks </b> — so you can prioritize and plan your day.
				Include <b>Title</b>, <b>Descriptions</b>, <b>Business Week Number</b>, and due dates with your <b>Tasks</b> so instructions and deadlines are clear.
				<b> <?= $AppName ?></b> Work great on  wordpress site  &amp; many more... 
            </span>

            <div class="btn-box p-b-0">
                <a href="<?php echo base_url(); ?>todobyweek"  title="" class="showtip left-btn">
                Todo By Week
                 <span class="tooltiptext">See task by week</span>
                </a>
                <a href="<?php echo base_url(); ?>alltodo" title="" class="showtip right-btn">
                All Todo List
                 <span class="tooltiptext">See all todo list</span>
                </a>
            </div>

        </div>
    </div>
	   <div class="col-md-12 text-center" id="nowT"><span id="momenT">Time now</span></div>
</div>
