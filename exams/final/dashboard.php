<!doctype html>
<html lang="en">

<head>
  <div id = "head">
    <?php
    include 'header.php';?>
    
  </div>
  
  <script>
    $(document).ready(function(){

                $.ajax({
                    type: "GET",
                    url: "api/getEvent.php",
                    dataType: "json",
                    success: function(data, status) {
                        data.forEach(function(key) {
                            $("#event").append("Date: " + key["Date"] + ", Start Time: " + key["Starttime"] + ", End Time: " + key["Endttime"] + ", Booked by: " + key["Bookedby"] + "<br/>");
                        });
                    }
                });
                $("#but4").on("click",function(){
                  $('#purchaseHistoryModal').modal("show");
                });
                $("#submitButton").on("click",function() {
                  $.ajax({
                        type: "GET",
                        url: "api/addEvent.php",
                        dataType: "json",
                        data: {
                            "date" : $("#date").val(),
                            "start" : $("#startTime").val(),
                            "end" : $("#endTime").val(),
                            "booked" : $("#id").val(),
                        },
                        success: function(data, status) {
                            console.log("success");
                        }
                    });
                });
    });
  </script>
<body>
    <div>
        <div id="results"></div>
        <div id="promo"></div>
        <div><h2 id = "eventDate">Time Slots: </h2></div>
        <div id = "event">
          
        </div>
        <div><button style = "padding-top:10px;"type = "button" id = "but4">Add Event</button></div>
    </div>
  <!-- Modal -->
        <div class="modal fade" id="purchaseHistoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add a Time Slot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
              <div class="modal-body">
                Time Slots: <input type="date" id="date"><br>
                Start Time: <input type="time" step = "1" id="startTime"><br>
                End Time: <input type = "time" step = "1" id = "endTime"><br>
                User ID: <input type = "text" id = "id"><br>
                
                
              </div>
              <div class="modal-footer">
                <button type="submit" id = "submitButton"class="btn btn-secondary" data-dismiss="modal">Submit</button>
              </div>
            </div>
          </div>
        </div>  
    
      <table>
    <thead>
    <tr>
    <th style="text-align:left">#</th>
    <th style="text-align:left">Task Description</th>
    <th style="text-align:left">Points</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td style="text-align:left">1</td>
    <td style="text-align:left">You provide a ERD diagram representing the data and its relationships. This may be included in Cloud9 as a picture or from a designer tool</td>
    <td style="text-align:left; background-color:green;">10</td>
    </tr>
    <tr>
    <td style="text-align:left">2</td>
    <td style="text-align:left">Tables in MySQL match the ERD and support the requirements of the application</td>
    <td style="text-align:left; background-color:green;">20</td>
    </tr>
    <tr>
    <td style="text-align:left">3</td>
    <td style="text-align:left">The list of available appointments is pulled from MySQL using the API endpoint and displayed using the specified page design</td>
    <td style="text-align:left; background-color:green;">20</td>
    </tr>
    <tr>
    <td style="text-align:left">4</td>
    <td style="text-align:left">Available times with dates in the past do not show up in the Dashboard list</td>
    <td style="text-align:left; background-color:yellow;">5</td>
    </tr>
    <tr>
    <td style="text-align:left">5</td>
    <td style="text-align:left">A user can add an available time slot to the MySQL using the API endpoint and displayed using the specified modal design</td>
    <td style="text-align:left; background-color:green;">20</td>
    </tr>
    <tr>
    <td style="text-align:left">6</td>
    <td style="text-align:left">A user can remove an available time slot from MySQL using the API endpoint</td>
    <td style="text-align:left; background-color:red;">15</td>
    </tr>
    <tr>
    <td style="text-align:left">7</td>
    <td style="text-align:left">The user confirms the removal using the specified modal design</td>
    <td style="text-align:left; background-color:red;">10</td>
    </tr>
    <tr>
    <td style="text-align:left"></td>
    <td style="text-align:left">TOTAL</td>
    <td style="text-align:left">100</td>
    </tr>
    <tr>
    <td style="text-align:left"></td>
    <td style="text-align:left">This rubric is properly included AND UPDATED (BONUS)</td>
    <td style="text-align:left; background-color:green;">2</td>
    </tr>
    <tr>
    <td style="text-align:left">BD</td>
    <td style="text-align:left">Login works with a User table and BCrypt</td>
    <td style="text-align:left">20</td>
    </tr>
    <tr>
    <td style="text-align:left">BD</td>
    <td style="text-align:left">Add Google Signin for app login</td>
    <td style="text-align:left; background-color:yellow;">10</td>
    </tr>
    <tr>
    <td style="text-align:left">BD</td>
    <td style="text-align:left">The app is deployed to Heroku</td>
    <td style="text-align:left; background-color:yellow;">15</td>
    </tr>
    <tr>
    <td style="text-align:left">BD</td>
    <td style="text-align:left">A banner file can be uploaded and displayed</td>
    <td style="text-align:left; background-color:red;">20</td>
    </tr>
    <tr>
    <td style="text-align:left">BD</td>
    <td style="text-align:left">The user can add multiple available time slots as specified</td>
    <td style="text-align:left; background-color:red;">10</td>
    </tr>
    <tr>
    <td style="text-align:left">BD</td>
    <td style="text-align:left">In a separate page, you show the correct list of available time slots to the user who navigates to the correct invitation URL</td>
    <td style="text-align:left; background-color:red;">10</td>
    </tr>
    <tr>
    <td style="text-align:left">BD</td>
    <td style="text-align:left">You correctly implement booking of the appointement, including all side effects</td>
    <td style="text-align:left; background-color:red;">30</td>
    </tr>
    </tbody>
    </table>
    <!-- FOOTER -->
<footer style = "padding-top:500px;"class="container">
      <?php
    include 'footer.php';?>
</footer>
</main>
</body>

</html>