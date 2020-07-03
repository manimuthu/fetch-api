<!DOCTYPE html>
<html>
<head>
 <title>Machine Test</title>
 <link rel="stylesheet" href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<br />
<div class="container">

<button type="button" class="btn btn-primary float-right" onclick="fetch_data()">Load Data</button>

<!-- table container to fill API response -->
<table class="table" id="api-records">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>URL</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>

</div>

<script type="text/javascript">

function fetch_data() {
    
    // show loading
    html_data = "<tr><td colspan='3' align='center'><div class='spinner-border text-primary' role='status'><span class='sr-only'>Loading...</span></div></td></tr>";
    $("#api-records tbody").html(html_data)

    //Send AJAX request to fetch API
    $.ajax({
    url: "fetch-api.php",
    type: "GET",
    dataType: 'json',
    success: function(response) {
        fill_data(response)
    }
    })

}

function fill_data(result) {
    //fill api result to table
    
    html_data = ""
    for (let value of Object.entries(result)) {
        html_data+= "<tr><td>"+value[1].id+"</td><td>"+value[1].name+"</td><td>"+value[1].url+"</td></tr>";
    }
    $("#api-records tbody").html(html_data)
}

</script>

</body>
</html>
