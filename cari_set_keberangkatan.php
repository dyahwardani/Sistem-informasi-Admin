<script type='text/javascript'>$(document).ready(function() {
        //$("#search_results").slideUp();
        $("#button_find").click(function(event) {
            event.preventDefault();
            //search_ajax_way();
            ajax_search();
        });
        $("#search_query").keyup(function(event) {
            event.preventDefault();
            //search_ajax_way();
            ajax_search();
        });
    });
    function ajax_search() {

        var nama = $("#search_query").val();
        $.ajax({
            url : "jam_jemput.php",
            data : "nama=" + nama,
            success : function(data) {
                // jika data sukses diambil dari server, tampilkan di <select id=kota>
                $("#display_results").html(data);
            }
        });

    }</script>
    <!-- ############################################################################################################## -->
    <div class="container">
    <div class="row">
    <nav class="navbar navbar-default" role="navigation">
    <div class="col-lg-3">
    <div class="row">
    <ul class="nav navbar-nav">
        <li class="fa fa-search fa-3x"></li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
        <div class="form-group" id="data_1"><div class="col-sm-10">
            <div class="input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="search_query" id="search_query" class="form-control" placeholder="">
            </div>
        </div>  
        
        <button type="submit" class="ladda-button btn btn-primary" data-style="expand-left"  id="button_find">View Keberangkatan</button>
        
    </form>
    </div>  
    </div><!-- /.navbar-collapse -->
 
</nav>
</div></div>
<div class="container">
<div id="display_results"  ></div>

</div>