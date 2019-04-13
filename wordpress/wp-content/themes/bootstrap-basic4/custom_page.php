<?php /* Template Name: PhpExercice */ ?>
<?php get_header(); ?>

<main id="main" class="col-md-12">
    <div class="row">
        <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Parameters Form</h5>
                <p class="card-text">
                <form action="./RandomDaysDistributor.php" method="POST" id="basma-form">
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" class="form-control" id="total" name="total" placeholder="Enter total" value="100">
                    </div>
                    <div class="form-group">
                        <label for="baseline">Baseline</label>
                        <input type="text" class="form-control" id="baseline" name="baseline" placeholder="Enter baseline" value="50">
                    </div>
                    <div class="form-group">
                        <label for="startdate">Start date</label>
                        <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Enter start date" value="2016-01-01">
                    </div>
                    <div class="form-group">
                        <label for="startdate">End date</label>
                        <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Enter end date" value="2016-01-07">
                    </div>
                    <button id="submit" type="submit" class="btn btn-primary">Randomize!</button>
                </form>
                </p>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Result</h5>
                    <p class="card-text">
                        <div id="msg">
                            Loading..
                        </div>
                        <table class="table">
                        </table>
                        <p id="info"></p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        $('#startdate').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
        });
        $('#enddate').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });

        $('table').hide();
        $('#msg').hide();
        $('#submit').click(function(event) {
            event.preventDefault();
            $('#msg').show();
            $('table').hide();
            var x = $.post('./RandomDaysDistributor.php', $( "#basma-form" ).serialize(), function(data) {
            var keys = Object.keys(data);
            var vals = Object.values(data);
            var html_final = '<tr><th>Date</th><th>Value</th></tr>';
            for (var index = 0; index < keys.length; index++) {
                const singleKey = keys[index];
                html_final += '<tr><td>' + singleKey + '</td>' + '<td>' + data[singleKey] + '</td></tr>';
            }
            $('table').html(html_final);
            $('table').show();
            $('#msg').hide();

            var sum = vals.reduce(function(a, b) {
                return a+b;
            }, 0);
            $('#info').html('Sum is: ' + sum);
            });     
        });
    });
</script>

<?php get_footer(); ?>
