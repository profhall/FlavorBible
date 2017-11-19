<?php
$file = file_get_contents("SomeOfTheList.txt");
$lines = explode("\n", $file);
$lines = preg_replace('!\s\s+!', ' <br>', $lines);
$append= array("append1","append2","append3","append4");
foreach ($lines as $key => &$value) {
$value = $value.$append[$key];
}
file_put_contents("file.txt", implode("\n", $lines));
?>
<!DOCTYPE html>
<html lang="en">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<head runat="server">
    <script>
        $(document).ready(function () {
            function loadData() {
                // getData() will return the string of data...
                document.getElementById('data').innerHTML = getData().replace('\n', '<br>');
            }
            //alert("hi")
            lineByLine = {};
            EachWord = {};
            $.get("file.txt", function(txt){
                $('#output').html(txt);
                //$('#div').html(data);
                var text = txt;
                var matches = text.match(/\n/g);
                var new_lines = matches ? matches.length : 0;
                //alert(new_lines);
                var lines = txt.split("\n");
                alert(lines);


            }, "text").done(function() {
                console.log( "second success" );
            }).fail(function(XHR, textStatus, errorThrown) {
                console.log(XHR.responseText, errorThrown, textStatus );
            });
        })

    </script>
</head>
<body>

    <div>
        <h> <u>File Contents</u></h>
        <p class="white-space:pre;" id="output"></p>
    </div>


</body>
</html>