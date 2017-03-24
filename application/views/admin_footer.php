<!-- Main page footer -->
<footer class="container">
    <p>Built with love on <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a> by <a href="http://www.walkingpixels.com">Walking Pixels</a>.</p>
    <ul>
        <li><a href="#" class="">Support</a></li>
        <li><a href="#" class="">Documentation</a></li>
        <li><a href="#" class="">API</a></li>
    </ul>
    <a href="#top" class="btn btn-primary btn-flat pull-right">Top &uarr;</a>
</footer>
<!-- /Main page footer -->

<!-- Scripts -->
<script src="/admin/js/navigation.js"></script>
<script src="/admin/js/bootstrap/bootstrap-affix.js"></script>
<script src="/admin/js/bootstrap/bootstrap-tooltip.js"></script>
<script src="/admin/js/bootstrap/bootstrap-collapse.js"></script>
<script src="/admin/js/bootstrap/bootstrap-dropdown.js"></script>

<!-- Block TODO list -->
<script>
    $(document).ready(function() {

        $('.todo-block input[type="checkbox"]').click(function(){
            $(this).closest('tr').toggleClass('done');
        });
        $('.todo-block input[type="checkbox"]:checked').closest('tr').addClass('done');

    });
</script>

<!-- jQuery Visualize -->
<!--[if lte IE 8]>

        var chartWidth = $(('.chart')).parent().width()*0.9;

        $('.chart').hide().visualize({
            type: 'pie',
            width: chartWidth,
            height: chartWidth,
            colors: ['#389abe','#fa9300','#6b9b20','#d43f3f','#8960a7','#33363b','#b29559','#6bd5b1','#66c9ee'],
            lineDots: 'double',
            interaction: false
        });

    });
</script>

<!-- jQuery Flot Charts -->
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="/admin/js/plugins/flot/excanvas.min.js"></script>
<![endif]-->
<script src="/admin/js/plugins/flot/jquery.flot.js"></script>

<script>
    $(document).ready(function() {

        // Demo #1
        // we use an inline data source in the example, usually data would be fetched from a server
        var data = [], totalPoints = 300;
        function getRandomData() {
            if (data.length > 0)
                data = data.slice(1);

            // do a random walk
            while (data.length < totalPoints) {
                var prev = data.length > 0 ? data[data.length - 1] : 50;
                var y = prev + Math.random() * 10 - 5;
                if (y < 0)
                    y = 0;
                if (y > 100)
                    y = 100;
                data.push(y);
            }

            // zip the generated y values with the x values
            var res = [];
            for (var i = 0; i < data.length; ++i)
                res.push([i, data[i]])
            return res;
        }

        // setup control widget
        var updateInterval = 30;
        $("#updateInterval").val(updateInterval).change(function () {
            var v = $(this).val();
            if (v && !isNaN(+v)) {
                updateInterval = +v;
                if (updateInterval < 1)
                    updateInterval = 1;
                if (updateInterval > 2000)
                    updateInterval = 2000;
                $(this).val("" + updateInterval);
            }
        });

        // setup plot
        var options = {
            series: { shadowSize: 0, color: '#389abe' }, // drawing is faster without shadows
            yaxis: { min: 0, max: 100 },
            xaxis: { show: false },
            grid: { backgroundColor: '#ffffff' }
        };
        var plot = $.plot($("#demo-1"), [ getRandomData() ], options);

        function update() {
            plot.setData([ getRandomData() ]);
            // since the axes don't change, we don't need to call plot.setupGrid()
            plot.draw();
            setTimeout(update, updateInterval);
        }

        update();

    });
</script>

<!-- jQuery jGrowl -->
<script type="text/javascript" src="js/plugins/jGrowl/jquery.jgrowl.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        // This value can be true, false or a function to be used as a callback when the closer is clciked
        $.jGrowl.defaults.closer = function() {
            console.log("Closing everything!", this);
        };

        $.jGrowl("Hello stranger!", {
            theme: 'success'
        });

        $.jGrowl("This notification will live a little longer. This is default style.", {
            life: 2500,
            theme: 'danger'
        });
        $.jGrowl("Sticky notification with a header", {
            header: 'Ernest Lawrence',
            sticky: true
        });
        $.jGrowl("Chromatron theme, and a whole bunch of callbacks...", {
            theme: 'primary',
            speed: 'slow',
            beforeOpen: function(e,m,o) {
                console.log("I am going to be opened!", this);
            },
            open: function(e,m,o) {
                console.log("I have been opened!", this);
            },
            beforeClose: function(e,m,o) {
                console.log("I am going to be closed!", this);
            },
            close: function(e,m,o) {
                console.log("I have been closed!", this);
            }
        });

        $.jGrowl("Custom animation test...", {
            speed: 'slow',
            animateOpen: {
                height: "show"
            },
            animateClose: {
                height: "hide"
            }
        });

        $.jGrowl("This message will not close because we have a callback that returns false.", {
            beforeClose: function() {
                return false;
            }
        });

        $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';

    });

</script>

</body>
</html>